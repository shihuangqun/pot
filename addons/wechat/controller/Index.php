<?php

namespace addons\wechat\controller;

use app\common\model\WechatAutoreply;
use app\common\model\WechatContext;
use app\common\model\WechatResponse;
use app\common\model\WechatConfig;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use addons\wechat\library\Wechat as WechatService;
use addons\wechat\library\Config as ConfigService;
use think\Db;
use think\Log;
use think\Session;

/**
 * 微信接口
 */
class Index extends \think\addons\Controller
{

    public $app = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->app = new Application(ConfigService::load());
    }

    /**
     *
     */
    public function index()
    {
        $this->error("当前插件暂无前台页面");
    }

    /**
     * 微信API对接接口
     */
    public function api()
    {
        $this->app->server->setMessageHandler(function ($message) {

            $WechatService = new WechatService;
            $WechatContext = new WechatContext;
            $WechatResponse = new WechatResponse;

            $openid = $message->FromUserName;
            $to_openid = $message->ToUserName;
            $event = $message->Event;
            $eventkey = $message->EventKey ? $message->EventKey : $message->Event;

            $unknownmessage = WechatConfig::value('default.unknown.message');
            $unknownmessage = $unknownmessage ? $unknownmessage : "未找到对应指令!";

            switch ($message->MsgType) {
                case 'event': //事件消息
                    switch ($event) {
                        case 'subscribe'://添加关注
                            $subscribemessage = WechatConfig::value('default.subscribe.message');
                           $user = Session::get('wechat_user');
                            $info = Db::name('member')->where('openid',$user['original']['openid'])->find();
                            $this->logs($info);
                            $subscribemessage = $subscribemessage ? $subscribemessage : "欢迎关注我们!";
                            return $subscribemessage;
                        case 'unsubscribe'://取消关注
                            $user = Session::get('wechat_user');
                            $info = Db::name('member')->where('openid',$user['original']['openid'])->find();
                            $this->logs($user);
                            return '';
                        case 'LOCATION'://获取地理位置
                            return '';
                        case 'VIEW': //跳转链接,eventkey为链接
                            return '';
                        default:
                            break;
                    }

                    $response = $WechatResponse->where(["eventkey" => $eventkey, 'status' => 'normal'])->find();
                    if ($response) {
                        $content = (array)json_decode($response['content'], TRUE);
                        $context = $WechatContext->where(['openid' => $openid])->find();
                        $data = ['eventkey' => $eventkey, 'command' => '', 'refreshtime' => time(), 'openid' => $openid];
                        if ($context) {
                            $WechatContext->data($data)->where('id', $context['id'])->update();
                            $data['id'] = $context['id'];
                        } else {
                            $id = $WechatContext->data($data)->save();
                            $data['id'] = $id;
                        }
                        $result = $WechatService->response($this, $openid, $content, $data);
                        if ($result) {
                            return $result;
                        }
                    }
                    return $unknownmessage;
                case 'text': //文字消息
                case 'image': //图片消息
                case 'voice': //语音消息
                case 'video': //视频消息
                case 'location': //坐标消息
                case 'link': //链接消息
                default: //其它消息
                    //上下文事件处理
                    $context = $WechatContext->where(['openid' => ['=', $openid], 'refreshtime' => ['>=', time() - 1800]])->find();
                    if ($context && $context['eventkey']) {
                        $response = $WechatResponse->where(['eventkey' => $context['eventkey'], 'status' => 'normal'])->find();
                        if ($response) {
                            $WechatContext->data(array('refreshtime' => time()))->where('id', $context['id'])->update();
                            $content = (array)json_decode($response['content'], TRUE);
                            $result = $WechatService->command($this, $openid, $content, $context);
                            if ($result) {
                                return $result;
                            }
                        }
                    }
                    //自动回复处理
                    if ($message->MsgType == 'text') {
                        $wechat_autoreply = new WechatAutoreply();
                        $autoreply = $wechat_autoreply->where(['text' => $message->Content, 'status' => 'normal'])->find();
                        if ($autoreply) {
                            $response = $WechatResponse->where(["eventkey" => $autoreply['eventkey'], 'status' => 'normal'])->find();
                            if ($response) {
                                $content = (array)json_decode($response['content'], TRUE);
                                $context = $WechatContext->where(['openid' => $openid])->find();
                                $result = $WechatService->response($this, $openid, $content, $context);
                                if ($result) {
                                    return $result;
                                }
                            }
                        }
                    }
                    return $unknownmessage;
            }
            return ""; //SUCCESS
        });
        $response = $this->app->server->serve();
        // 将响应输出
        $response->send();
    }

    //授权页面
    public function oauth(){
        $oauth = $this->app->oauth;

        // 未登录
        if (empty(Session::get('wechat_user'))) {

            $http_top = Session::get('topUrl');
            Session::set('target_url',$http_top);

            $response = $oauth->scopes(['snsapi_userinfo'])
                ->redirect();
            $response->send();
        }
        //如已经授权过则直接进入页面
    }
    /**
     * 登录回调
     */
    public function callback()
    {
        $oauth = $this->app->oauth;
        $user = $oauth->user()->toArray();
        $res['openid'] = $user['original']['openid'];
        //查询是否已经注册过  如果注册过则跳过此步骤
        $users = Db::name('member')->where('openid',$res['openid'])->find();

        if(empty($users)) {
            $res['nickname'] = $user['nickname'];
            $res['avatar'] = $user['avatar'];
            $res['email'] = $user['email'];
            $res['gender'] = $user['original']['sex'];
            $res['jointime'] = time();

            try{
                $info = Db::name('member')->insert($res);
            }catch(\Exception $e){
                return $this->error('添加用户出错');
            }

            if(!$info) return $this->error('数据异常，请稍后再试');
        }

        Session::set('wechat_user',$user);
        $targetUrl = empty(Session::get('target_url')) ? '/' : Session::get('target_url');

        header('location:'. $targetUrl); // 跳转到 user/profile

    }

    /**
     * 支付回调
     */
    public function notify()
    {
        Log::record(file_get_contents('php://input'), "notify");
        $response = $this->app->payment->handleNotify(function ($notify, $successful) {

            $payment = $this->app->payment;
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
//            $orderinfo = Order::findByTransactionId($notify->transaction_id);//找不到这个
            $orderinfo = $payment->query($notify->transaction_id);
//            if ($orderinfo) {
//                //订单已处理
//                return true;
//            }
//            $orderinfo = Order::get($notify->out_trade_no);
            if (!$orderinfo) { // 如果订单不存在
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }
            // 如果订单存在
            // 检查订单是否已经更新过支付状态,已经支付成功了就不再更新了
            if ($orderinfo['paytime']) {
                return true;
            }
            // 用户是否支付成功
            if ($successful) {
                $this->logs('成功');
                // 请在这里编写处理成功的处理逻辑
                $res['status'] = 1;
                try{
                    Db::name('recharge_list')->where('order_num',$notify->out_trade_no)->update($res);
                }catch (\Exception $e){
                    $this->error('update status error');
                }

                return true; // 返回处理完成
            } else { // 用户支付失败
                return true;
            }
        });

        $response->send();
    }

    public function tempMessage($openid,$template,$url,$data){
        $notice = $this->app->notice;
        $messageId = $notice->send([
            'touser' => $openid,
            'template_id' => $template,
            'url' => $url,
            'data' => $data
        ]);
    }
    public function logs($data){
        file_put_contents(ROOT_PATH . '/runtime/log/pay.log', $data);
    }

    //检测用户是否关注
    public function getSubscribe($openid){
        $accessToken = $this->app->access_token; // EasyWeChat\Core\AccessToken 实例
        $token = $accessToken->getToken(); // token 字符串
        $token = $accessToken->getToken(true); // 强制重新从微信服务器获取 token.
//        $openid = Session::get('wechat_user')['original']['openid'];

        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$token.'&openid='.$openid.'&lang=zh_CN';

        $res = json_decode($this->curl($url,''));

        return $res->subscribe;
    }

    function curl($api,  $params, $timeout = 60)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        //以返回的形式接受信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //设置为POST方式
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        //不验证https证书
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json;charset=UTF-8'
        ));
        //发送数据
        $response = curl_exec($ch);
        //释放资源
        curl_close($ch);
        return $response;
    }
}
