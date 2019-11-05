<?php

namespace app\common\controller;

use app\common\library\Auth;
use think\Config;
use think\Controller;
use think\Db;
use think\Hook;
use think\Lang;
use think\Loader;
use think\Session;
use think\Validate;

/**
 * 前台控制器基类
 */
class Frontend extends Controller
{

    /**
     * 布局模板
     * @var string
     */
    protected $layout = '';

    /**
     * 无需登录的方法,同时也就不需要鉴权了
     * @var array
     */
    protected $noNeedLogin = [];

    /**
     * 无需鉴权的方法,但需要登录
     * @var array
     */
    protected $noNeedRight = [];

    /**
     * 权限Auth
     * @var Auth
     */
    protected $auth = null;

    protected $user = null;

    public function _initialize()
    {
        if(empty(Session::get('wechat_user'))){

            Session::set('topUrl',$_SERVER['REQUEST_URI']);

            header('location:'.'/addons/wechat/index/oauth');
        }
        $this->user = Session::get('wechat_user');
//        var_dump($this->user);
        $this->userStatus();//查看当前用户是否被拉黑
//        $this->userStatus();//查看当前用户是否被拉黑
        //移除HTML标签
        $this->request->filter('trim,strip_tags,htmlspecialchars');
        $modulename = $this->request->module();
        $controllername = Loader::parseName($this->request->controller());
        $actionname = strtolower($this->request->action());

        // 如果有使用模板布局
        if ($this->layout) {
            $this->view->engine->layout('layout/' . $this->layout);
        }
        $this->auth = Auth::instance();

        // token
        $token = $this->request->server('HTTP_TOKEN', $this->request->request('token', \think\Cookie::get('token')));

        $path = str_replace('.', '/', $controllername) . '/' . $actionname;
        // 设置当前请求的URI
        $this->auth->setRequestUri($path);
        // 检测是否需要验证登录
        if (!$this->auth->match($this->noNeedLogin)) {
            //初始化
            $this->auth->init($token);
            //检测是否登录
            if (!$this->auth->isLogin()) {
                $this->error(__('Please login first'), 'index/user/login');
            }
            // 判断是否需要验证权限
            if (!$this->auth->match($this->noNeedRight)) {
                // 判断控制器和方法判断是否有对应权限
                if (!$this->auth->check($path)) {
                    $this->error(__('You have no permission'));
                }
            }
        } else {
            // 如果有传递token才验证是否登录状态
            if ($token) {
                $this->auth->init($token);
            }
        }

        $this->view->assign('user', $this->auth->getUser());

        // 语言检测
        $lang = strip_tags($this->request->langset());

        $site = Config::get("site");

        $upload = \app\common\model\Config::upload();

        // 上传信息配置后
        Hook::listen("upload_config_init", $upload);

        // 配置信息
        $config = [
            'site'           => array_intersect_key($site, array_flip(['name', 'cdnurl', 'version', 'timezone', 'languages'])),
            'upload'         => $upload,
            'modulename'     => $modulename,
            'controllername' => $controllername,
            'actionname'     => $actionname,
            'jsname'         => 'frontend/' . str_replace('.', '/', $controllername),
            'moduleurl'      => rtrim(url("/{$modulename}", '', false), '/'),
            'language'       => $lang
        ];
        $config = array_merge($config, Config::get("view_replace_str"));

        Config::set('upload', array_merge(Config::get('upload'), $upload));

        // 配置信息后
        Hook::listen("config_init", $config);
        // 加载当前控制器语言包
        $this->loadlang($controllername);
        $this->assign('site', $site);
        $this->assign('config', $config);
    }

    /**
     * 加载语言文件
     * @param string $name
     */
    protected function loadlang($name)
    {
        Lang::load(APP_PATH . $this->request->module() . '/lang/' . $this->request->langset() . '/' . str_replace('.', '/', $name) . '.php');
    }

    /**
     * 渲染配置信息
     * @param mixed $name  键名或数组
     * @param mixed $value 值
     */
    protected function assignconfig($name, $value = '')
    {
        $this->view->config = array_merge($this->view->config ? $this->view->config : [], is_array($name) ? $name : [$name => $value]);
    }

    /**
     * 刷新Token
     */
    protected function token()
    {
        $token = $this->request->post('__token__');

        //验证Token
        if (!Validate::is($token, "token", ['__token__' => $token])) {
            $this->error(__('Token verification error'), '', ['__token__' => $this->request->token()]);
        }

        //刷新Token
        $this->request->token();
    }

    /**
     * 获取当前用户信息
     */
    public function getUserInfo(){
        $user = $this->user;
        $info = Db::name('member')->where('openid',$user['original']['openid'])->find();
        return $info;
    }

    public function return_msg($code,$msg='',$datas='',$url=''){

        $data['code'] = $code;
        $data['msg'] = $msg;
        $data['data'] = $datas;
        $data['url'] = $url;

        echo json_encode($data);
        die;
    }
    //更新任务数量
    public function SaveTask($task_id){

        $info = Db::name('task')->where('id',$task_id)->field('already_num,task_num')->find();
        if($info['task_num'] > $info['already_num']){
            $activity = '';
            if($info['already_num'] +1 == $info['task_num']){
                $activity = 1;
            }
            $where = [
                'id' => $task_id,
                'already_num' => $info['already_num'] +1,
                'activity_status' => $activity ? $activity : 0
            ];

            $data = Db::name('task')->update($where);
        }


        if($data) return;
    }

    //更新文章浏览量
    public function SaveRead($task_id){
        $read = Db::name('task')->where('id',$task_id)->value('read');

        $where = [
            'id' => $task_id,
            'read' => $read +1
        ];

        $data = Db::name('task')->update($where);

        if($data) return;
    }
    //当前用户是否被拉黑
    public function userStatus(){
        $info = $this->getUserInfo();

        if(!empty($info)) if($info['status'] == 0) $this->redirect('index/error/black');

    }
}
