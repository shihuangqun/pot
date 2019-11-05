<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use app\common\controller\Frontend;
use EasyWeChat\Foundation\Application;
use think\Config;
use think\Db;
use think\Exception;
use think\exception\PDOException;
use think\exception\ValidateException;

/**
 * 任务管理
 *
 * @icon fa fa-circle-o
 */
class Task extends Backend
{
    
    /**
     * Task模型对象
     * @var \app\admin\model\Task
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Task;
        $this->view->assign("buyoutList", $this->model->getBuyoutList());
        $this->view->assign("statusList", $this->model->getStatusList());
    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

    /**
     * 查看
     */
    public function index()
    {
        //当前是否为关联查询
        $this->relationSearch = true;
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField'))
            {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->with(['category'])
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->with(['category'])
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                
                $row->getRelation('category')->visible(['name']);
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }


    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);

                if ($this->dataLimit && $this->dataLimitFieldAutoFill) {
                    $params[$this->dataLimitField] = $this->auth->id;
                }
                $result = false;
                Db::startTrans();
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = str_replace("\\model\\", "\\validate\\", get_class($this->model));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.add' : $name) : $this->modelValidate;
                        $this->model->validateFailException(true)->validate($validate);
                    }
                    $result = $this->model->allowField(true)->save($params);

                    $category_name = Db::name('category')->where('id',$params['category_id'])->value('name');
					// dump($category_name);
                    if($result){
                        $user = Db::name('member')->where('notice_status','1')->select();//获取所有开启通知的用户
                        $city = explode('/',$params['city']);
                        $city = $city[0];
//                       dump($city);
                        $arr = $this->city($city,$user);
//						 dump($arr);
                        foreach ($arr as $k => $v){
//                        	 dump($v);
                            $data = array(
                                "first"    => "询价采纳通知",
                                "keyword1" => array($category_name. $params['name'], "#00B7B1"),
                                "keyword2" => array($params['description'], "#00B7B1"),
                                "remark"   => array("查看更多锅炉信息，请点击下方\"询价信息\"按钮", "#FF3030"),
                            );
                           
                            $openid = $v;
                            $thisUrl = 'http://'.$_SERVER['HTTP_HOST'];
                            $url = $thisUrl.'/index/index/show/id/'.$this->model->id;
                            $site = Config::get('site');
                            $template = $site['wx_template'];
							
                            $wechat = new \addons\wechat\controller\Index();
                            $wechat->tempMessage($openid,$template,$url,$data);
                            // dump($wechat);
                        }

                    }
                    Db::commit();
                } catch (ValidateException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (PDOException $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                } catch (Exception $e) {
                    Db::rollback();
                    $this->error($e->getMessage());
                }
                if ($result !== false) {
                    $this->success();
                } else {
                    $this->error(__('No rows were inserted'));
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        return $this->view->fetch();
    }

	//
    public function city($city,$user){

        $arr = [];

        $city_id = Db::name('city')->where('name',$city)->value('id');

        foreach ($user as $key => $val){
            $index = new \addons\wechat\controller\Index();
            $subscribe = $index->getSubscribe($val['openid']);
//            dump($subscribe);
//            dump($val);
            $array = explode(',',$val['notice_city']);
            $is_true = in_array($city_id,$array);
//            dump($is_true);
            if($subscribe == 1){ //0为未关注
                if($is_true == true || $val['notice_city'] == 0){
                    array_push($arr,$val['openid']);
                }
            }

        }
//        dump($arr);
        return $arr;
    }

    //增加购买次数
    public function buy_num(){
        if(!IS_AJAX) return $this->error('非法访问');
        $ret = input('');

        $where = [];
        if($ret['task_num'] == $ret['already_num']){
            $this->success('已售完，请增加任务库存！');
        }else{
            $activity_status = 0;
            if($ret['already_num'] +1 == $ret['task_num']) $activity_status = 1;
            $where= [
                'activity_status' => $activity_status,
                'already_num' => $ret['already_num'] +1
            ];
        }
        $data = $this->model
            ->where('id',$ret['ids'])
            ->update($where);
        $res = [
            'createtime' => time(),
            'order_num' => date('Ymd').time(),
            'task_id' => $ret['ids'],
            'price' => $ret['price'],
            'member_id' => 20,
            'status' => 1,
            'num' => 1
        ];

        try{
            Db::name('order')->insert($res);
        }catch (\Exception $e){
            $this->error('buy_num insert error');
        }
//
        if($data !== false) $this->success('更新成功','',$ret);

    }

    //增加任务数量
    public function task_num(){
        if(!IS_AJAX) return $this->error('非法访问');
        $ret = input('');

        $where = [];
        $activity_status = $ret['activity_status'];
        if($ret['activity_status'] == 1) $activity_status = 0;

        $where = [
            'activity_status' => $activity_status,
            'task_num' => $ret['task_num'] + 1
        ];
//        dump($where);
        $data = $this->model
            ->where('id',$ret['ids'])
            ->update($where);
//
        if($data !== false) $this->success('更新成功','',$ret);
    }

    //重发模版消息
    public function sendTemp(){
        if(!IS_AJAX) return $this->error('非法访问');
        $params = input('');
        $category_name = Db::name('category')->where('id',$params['category_id'])->value('name');

        $user = Db::name('member')->where('notice_status','1')->select();//获取所有开启通知的用户
        $city = explode('/',$params['city']);
        $city = $city[0];
//                       dump($city);
        $arr = $this->city($city,$user);
//						 dump($arr);
        foreach ($arr as $k => $v){
//                        	 dump($v);
            $data = array(
                "first"    => "询价采纳通知",
                "keyword1" => array($category_name. $params['name'], "#00B7B1"),
                "keyword2" => array($params['description'], "#00B7B1"),
                "remark"   => array("查看更多锅炉信息，请点击下方\"询价信息\"按钮", "#FF3030"),
            );

            $openid = $v;
            $thisUrl = 'http://'.$_SERVER['HTTP_HOST'];
            $url = $thisUrl.'/index/index/show/id/'.$params['id'];
            $site = Config::get('site');
            $template = $site['wx_template'];

            $wechat = new \addons\wechat\controller\Index();
            $aa = $wechat->tempMessage($openid,$template,$url,$data);

            if($aa) $this->success('发送成功','',$params);
            // dump($wechat);
        }
    }
}
