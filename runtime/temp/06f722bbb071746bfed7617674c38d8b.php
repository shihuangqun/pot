<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/guo.yaoget.cn/public/../application/index/view/index/show.html";i:1572861218;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/swiper-3.3.1.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/css/show.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/layui/css/layui.css"/>

</head>
<style>
    table th{
        background: #F0F0F0;
        height: 30px;
    }
    table td{
        height: 40px;
    }
    body{
        background: #f2f2f2;
    }
</style>
<body>
<div class="header" style="background: white;margin-top: 10px;">
   <div style="padding: 20px 20px 30px 20px">
       <div style="font-size: 16px;margin-top: 15px;color: #bfbfbf;height: 30px;">
           <div style="width: 60%;float: left;    ">发布时间：<?php echo date("Y-m-d",$info['createtime']); ?></div>
           <div style="width: 40%;float: left;text-align: right;">咨询人：<span style="color:#3A5FCD"><?php echo $info['contact']; ?></span></div>
       </div>
       <div style="height: 40px;border-bottom: 1px solid #EEEEE0;line-height: 30px;font-size: 17px;">
           【<?php echo $info['buy_num']; ?><?php echo $info['company']; ?>】【<?php echo $info['category_name']; ?>】<?php echo $info['name']; ?>
       </div>
       <div style="line-height: 2;">
           <span>收 货 地：&nbsp;&nbsp;<?php echo $info['city']; ?></span>
           <div>
               <p style="float: left;width:30%;">描 &nbsp;&nbsp;述&nbsp;&nbsp;：&nbsp;&nbsp;</p>
               <div style="float: left;width: 60%;"><?php echo $info['description']; ?></div>
           </div>
       </div>
       <br><br>
       <div style="line-height: 3;">
           联系方式：&nbsp;&nbsp;&nbsp;&nbsp;
           <?php if($buy_status == null): if($info['activity_status'] == 0): ?>
           <a href="/index/index/buy/id/<?php echo $info['id']; ?>" style="color:#FF0000">购买后可见</a>
           <?php else: ?>

           <a href="#" style="color:#FF0000">购买后可见</a>
           <?php endif; else: ?>
           <a href="tel:<?php echo $info['phone']; ?>" style="color:#FF0000"><?php echo $info['phone']; ?></a>
           <?php endif; ?>
       &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $info['price']; ?>/条
       </div>
       <div>
           <div style="margin-top: 15px; width:70%;float: left;margin-left: 10%;">
               <div class="layui-progress">
                   <div class="layui-progress-bar" lay-percent="<?php echo $info['already_num']/$info['task_num']*100; ?>%"></div>
               </div>
           </div>
           <div style="width: 20%;float: left;text-align: center;line-height: 2.3;color: #bfbfbf;"><?php echo $info['already_num']; ?>/<?php echo $info['task_num']; ?></div>
       </div>
       <div style="width:100%;text-align: center;line-height: 2.3;color: #bfbfbf;"><?php echo $info['already_num']; ?>个供应商已购买，剩余<?php echo $info['task_num']-$info['already_num']; ?>次购买机会</div>
       <!--        <div style="width: 100px;height: 30px;background: #666;text-align: center;line-height: 30px;color: white;margin: auto;margin-top: 20px;">-->
       <!--            已经售完-->
       <!--        </div>-->
       <div style="width:80%;margin: auto;margin-bottom: 10px;text-align: center;margin-top: 10px;">
           <?php if($info['activity_status'] == 0): ?>
           <button style="width:47%;height:30px;color:#FF3030;border: 1px solid #FF3030;border-radius: 5px;background: white">
               <a href="/index/index/buyout/id/<?php echo $info['id']; ?>" style="color:#FF3030">买断信息</a>
           </button>
           <button style="width:47%;height:30px;color:white;background: #FF3030;border: 1px solid #FF3030;border-radius: 5px;margin-left:3%">
               <a href="/index/index/buy/id/<?php echo $info['id']; ?>" style="color: white">立即购买</a>
           </button>
           <?php else: ?>
           <button style="width:47%;height:30px;background: #666;border: 1px solid #666;color: white;border-radius: 5px">已经售完</button>
           <?php endif; ?>
       </div>
       <div style="width: 80%;margin: auto;">
           <span>购买记录</span>
           <table border="1" style="color: #666;border: 1px solid #EEE0E5;width: 100%;margin-top: 10px;text-align: center;">
               <tr>
                   <th>联系人</th>
                   <th>购买时间</th>
                   <th>购买条数</th>
               </tr>
               <?php if(is_array($buy_info) || $buy_info instanceof \think\Collection || $buy_info instanceof \think\Paginator): $i = 0; $__LIST__ = $buy_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
               <tr>
                   <td><?php echo $vo['nickname']; ?>
                       <!--                    <img src="<?php echo $vo['avatar']; ?>" alt="" width="40">-->
                   </td>
                   <td><?php echo date("Y-m-d",$vo['createtime']); ?></td>
                   <td><?php echo $vo['num']; ?></td>
               </tr>
               <?php endforeach; endif; else: echo "" ;endif; ?>
           </table>
       </div>
   </div>
</div>
<input type="hidden" id="share_title" value="<?php echo $site['share_title']; ?>">
<input type="hidden" id="share_desc" value="<?php echo $site['share_description']; ?>">
<input type="hidden" id="share_image" value="<?php echo $site['share_image']; ?>">
</body>
<script src="/static/index/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/js/swiper.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/layui/layui.js" type="text/javascript" charset="utf-8"></script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script>
    layui.use('element', function(){
        var $ = layui.jquery
            ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块

        //触发事件
        var active = {
            setPercent: function(){
                //设置50%进度
                element.progress('demo', '50%')
            }
            ,loading: function(othis){
                var DISABLED = 'layui-btn-disabled';
                if(othis.hasClass(DISABLED)) return;

                //模拟loading
                var n = 0, timer = setInterval(function(){
                    n = n + Math.random()*10|0;
                    if(n>100){
                        n = 100;
                        clearInterval(timer);
                        othis.removeClass(DISABLED);
                    }
                    element.progress('demo', n+'%');
                }, 300+Math.random()*1000);

                othis.addClass(DISABLED);
            }
        };

        $('.site-demo-active').on('click', function(){
            var othis = $(this), type = $(this).data('type');
            active[type] ? active[type].call(this, othis) : '';
        });
    });
</script>
<script>
    var url = location.href.split('#')[0];

    var share_title = $('#share_title').val();
    var share_desc = $('#share_desc').val();
    var share_image = $('#share_image').val();
    var imgurl = 'http://'+window.location.host+share_image;
    $.ajax({
        type:'post',
        data:{urls:url},
        dataType:'json',
        url:'/index/index/share',
        success:function (data) {

            var data = JSON.parse(data);
            wx.config({
                appId: data.appId,
                timestamp: data.timestamp,
                nonceStr: data.nonceStr,
                signature: data.signature,
                jsApiList: [
                    "onMenuShareAppMessage", //分享给好友
                    "onMenuShareTimeline", //分享到朋友圈
                    "onMenuShareQQ", //分享到QQ
                    "onMenuShareWeibo" //分享到微博
                ]
            });
            var shareData = {
                title: share_title,
                desc: share_desc,
                link: url,
                imgUrl: imgurl,
                success: function () {
                    layer.closeAll();
                },
                cancel: function () {
                    layer.closeAll();
                }
            };

            wx.onMenuShareTimeline(shareData);
            wx.onMenuShareAppMessage(shareData);
            wx.onMenuShareQQ(shareData);
            wx.onMenuShareWeibo(shareData);
        }
    })
</script>
</body>
</html>
