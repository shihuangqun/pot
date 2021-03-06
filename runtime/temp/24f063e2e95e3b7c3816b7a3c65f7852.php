<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/wx.glcgpt.com/public/../application/index/view/index/index.html";i:1572854817;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/swiper-3.3.1.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/layui/css/layui.css"/>
    <style type="text/css">
        html, body{height: 100%;font-family: "微软雅黑";}
        *{margin: 0;padding: 0;box-sizing: border-box;}
        a {color: #428bca;text-decoration: none;}
        a:hover,a:focus {color: #2a6496;text-decoration: underline;}
        a:focus {outline: thin dotted;outline: 5px auto -webkit-focus-ring-color;outline-offset: -2px;}

        .padd_40{padding-top: 40px;background: #F5F5F5;overflow-x:hidden;}
        .a{text-align:center;line-height: 40px;position: fixed;top: 0;left: 0;width: 100%;z-index: 10;border-bottom: 1px #ccc solid; background: #f50;color: #fff;}
        .tab{    font-size: 20px;display: flex;line-height: 40px;position: fixed;top: 0px;width: 100%;z-index: 10;border-bottom: 1px #ccc solid;}
        .tab a{width: 50%;background: #fff;text-align: center;}
        .tab .active{border-bottom: 1px #f50 solid; color: #f50;}
        .panel{margin: 0;}

        .refreshtip {position: absolute;left: 0;width: 100%;margin: 10px 0;text-align: center;color: #999;}
        .swiper-container{overflow: visible;}
        .loadtip { display: block;width: 100%;line-height: 40px; height: 40px;text-align: center;color: #999;border-top: 1px solid #ddd;}
        .swiper-container, .w{height: calc(100vh - 120px);}
        .swiper-slide{height: auto;}

        .text-center{text-align: center;}
        .list-group{padding-left: 0;margin-bottom: 20px;}
        .list-group-item{    position: relative; display: block;margin-bottom: -1px;margin-bottom: 15px;}
        .list-group-item:first-child {border-top-left-radius: 4px;border-top-right-radius: 4px;}
    </style>
</head>
<body class="padd_40">
<!--	<div class="a">标题</div>-->
<div class="tab">
    <a class="active" href="javascript:;">今天</a>
    <a href="javascript:;">近期商机</a>
</div>
<div class="swiper-container">
<!--    <div class="refreshtip">下拉可以刷新</div>-->
    <div class="swiper-wrapper w">
        <div class="swiper-slide d">
<!--            <div class="init-loading list-group-item text-center" style="display: none;">下拉可以刷新</div>-->
            <div class="swiper-container2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide list-group">
                        <?php if(is_array($today) || $today instanceof \think\Collection || $today instanceof \think\Paginator): $i = 0; $__LIST__ = $today;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;if($t['activity_status'] == 0): ?>
                        <a href="/index/index/show/id/<?php echo $t['id']; ?>">
                            <div class="list-group-item">
                                <div class="con">
                                    <div class="ro">
                                        <div class="buy"><?php echo $t['category_name']; ?></div>
                                        <div class="title">
                                            <span>【<?php echo $t['category_name']; ?>】<?php echo $t['name']; ?></span>
                                        </div>
                                        <div class="time"><span><?php echo date("Y-m-d",$t['createtime']); ?></span></div>
                                    </div>
                                    <div class="adds">
                                        <p>收货地：<?php echo $t['city']; ?></p>
                                    </div>
                                    <div class="descTop">
                                        <div class="desc">
                                            <p>描述：<?php echo $t['description']; ?></p>
                                        </div>
                                        <div class="details">查看详情</div>
                                    </div>
                                    <div>
                                        <div style="margin-top: 15px; width:80%;float: left">
                                            <div class="layui-progress">
                                                <div class="layui-progress-bar" lay-percent="<?php echo $t['already_num']/$t['task_num']*100; ?>%"></div>
                                            </div>
                                        </div>
                                        <div class="jindu"><?php echo $t['already_num']; ?>/<?php echo $t['task_num']; ?></div>
                                    </div>

                                    <div>
                                        <div class="miaoshu"><?php echo $t['already_num']; ?>个供应商已购买,剩余<?php echo $t['task_num']-$t['already_num']; ?>次购买机会</div>
                                        <div class="show">
                                            <img src="/static/index/images/show.png" alt="" width="25">
                                            <div class="showNum"><?php echo $t['read']; ?></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <?php else: ?>
                        <a href="/index/index/show/id/<?php echo $t['id']; ?>">
                        <div class="list-group-item">
                            <div class="con">
                                <div class="ro">
                                    <div class="buy"><?php echo $t['category_name']; ?></div>
                                    <div class="title">
                                        <span>【<?php echo $t['category_name']; ?>】<?php echo $t['name']; ?></span>
                                    </div>
                                    <div class="time"><span><?php echo date("Y-m-d",$t['createtime']); ?></span></div>
                                </div>
                                <div class="adds">
                                    <p>收货地：<?php echo $t['city']; ?></p>
                                </div>
                                <div class="descTop">
                                    <div class="desc">
                                        <p>描述：<?php echo $t['description']; ?></p>
                                    </div>
                                    <!--									<div class="details">查看详情</div>-->
                                    <div class="shangxian">
                                        <img src="/static/index/images/20191101095139.jpg" alt="" width="80" style="position: relative;margin-top: -25px;">
                                    </div>
                                </div>
                                <div>
                                    <div style="margin-top: 15px; width:80%;float: left">
                                        <div class="layui-progress">
                                            <div class="layui-progress-bar" lay-percent="<?php echo $t['already_num']/$t['task_num']*100; ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="jindu"><?php echo $t['already_num']; ?>/<?php echo $t['task_num']; ?></div>
                                </div>
                                <div>
                                    <div class="miaoshu"><?php echo $t['already_num']; ?>个供应商已购买,剩余<?php echo $t['task_num']-$t['already_num']; ?>次购买机会</div>
                                    <div class="show">
                                        <img src="/static/index/images/show.png" alt="" width="25">
                                        <div class="showNum"><?php echo $t['read']; ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </a>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <h1 style="text-align: center;font-size: 18px;margin-top: 20px;color: #666;">没有更多啦！</h1>

                    </div>
                    <div class="swiper-slide list-group">
                        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['activity_status'] == 0): ?>
                        <a href="/index/index/show/id/<?php echo $vo['id']; ?>">
                        <div class="list-group-item">
                            <div class="con">
                                <div class="ro">
                                    <div class="buy"><?php echo $vo['category_name']; ?></div>
                                    <div class="title">
                                        <span>【<?php echo $vo['category_name']; ?>】<?php echo $vo['name']; ?></span>
                                    </div>
                                    <div class="time"><span><?php echo date("Y-m-d",$vo['createtime']); ?></span></div>
                                </div>
                                <div class="adds">
                                    <p>收货地：<?php echo $vo['city']; ?></p>
                                </div>
                                <div class="descTop">
                                    <div class="desc">
                                        <p>描述：<?php echo $vo['description']; ?></p>
                                    </div>
                                    <div class="details">查看详情</div>
                                </div>
                                <div>
                                    <div style="margin-top: 15px; width:80%;float: left">
                                        <div class="layui-progress">
                                            <div class="layui-progress-bar" lay-percent="<?php echo $vo['already_num']/$vo['task_num']*100; ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="jindu"><?php echo $vo['already_num']; ?>/<?php echo $vo['task_num']; ?></div>
                                </div>
                                <div>
                                    <div class="miaoshu"><?php echo $vo['already_num']; ?>个供应商已购买,剩余<?php echo $vo['task_num']-$vo['already_num']; ?>次购买机会</div>
                                    <div class="show">
                                        <img src="/static/index/images/show.png" alt="" width="25">
                                        <div class="showNum"><?php echo $vo['read']; ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </a>
                        <?php else: ?>
                        <a href="/index/index/show/id/<?php echo $vo['id']; ?>">
                        <div class="list-group-item">
                            <div class="con">
                                <div class="ro">
                                    <div class="buy"><?php echo $vo['category_name']; ?></div>
                                    <div class="title">
                                        <span>【<?php echo $vo['category_name']; ?>】<?php echo $vo['name']; ?></span>
                                    </div>
                                    <div class="time"><span><?php echo date("Y-m-d",$vo['createtime']); ?></span></div>
                                </div>
                                <div class="adds">
                                    <p>收货地：<?php echo $vo['city']; ?></p>
                                </div>
                                <div class="descTop">
                                    <div class="desc">
                                        <p>描述：<?php echo $vo['description']; ?></p>
                                    </div>
                                    <!--									<div class="details">查看详情</div>-->
                                    <div class="shangxian">
                                        <img src="/static/index/images/20191101095139.jpg" alt="" width="80" style="position: relative;margin-top: -25px;">
                                    </div>
                                </div>
                                <div>
                                    <div style="margin-top: 15px; width:80%;float: left">
                                        <div class="layui-progress">
                                            <div class="layui-progress-bar" lay-percent="<?php echo $vo['already_num']/$vo['task_num']*100; ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="jindu"><?php echo $vo['already_num']; ?>/<?php echo $vo['task_num']; ?></div>
                                </div>
                                <div>
                                    <div class="miaoshu"><?php echo $vo['already_num']; ?>个供应商已购买,剩余<?php echo $vo['task_num']-$vo['already_num']; ?>次购买机会</div>
                                    <div class="show">
                                        <img src="/static/index/images/show.png" alt="" width="25">
                                        <div class="showNum"><?php echo $vo['read']; ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </a>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <h1 style="text-align: center;font-size: 18px;margin-top: 20px;color: #666;">没有更多啦！</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    <div class="loadtip">上拉加载更多</div>-->
    <div class="swiper-scrollbar"></div>
</div>
<input type="hidden" id="share_title" value="<?php echo $site['share_title']; ?>">
<input type="hidden" id="share_desc" value="<?php echo $site['share_description']; ?>">
<input type="hidden" id="share_image" value="<?php echo $site['share_image']; ?>">
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
<script type="text/javascript">
    var loadFlag = true;
    var oi = 0;
    var mySwiper = new Swiper('.swiper-container',{
        direction: 'vertical',
        scrollbar: '.swiper-scrollbar',
        slidesPerView: 'auto',
        mousewheelControl: true,
        freeMode: true,
        onTouchMove: function(swiper){		//手动滑动中触发
            var _viewHeight = document.getElementsByClassName('swiper-wrapper')[0].offsetHeight;
            var _contentHeight = document.getElementsByClassName('swiper-slide')[0].offsetHeight;


            if(mySwiper.translate < 50 && mySwiper.translate > 0) {
                $(".init-loading").html('下拉刷新...').show();
            }else if(mySwiper.translate > 50 ){
                $(".init-loading").html('释放刷新...').show();
            }
        },
        onTouchEnd: function(swiper) {
            var _viewHeight = document.getElementsByClassName('swiper-wrapper')[0].offsetHeight;
            var _contentHeight = document.getElementsByClassName('swiper-slide')[0].offsetHeight;
            // 上拉加载
            if(mySwiper.translate <= _viewHeight - _contentHeight - 50 && mySwiper.translate < 0) {
                // console.log("已经到达底部！");

                if(loadFlag){
                    $(".loadtip").html('正在加载...');
                }else{
                    $(".loadtip").html('没有更多啦！');
                }

                // setTimeout(function() {
                //     for(var i = 0; i <5; i++) {
                //         oi++;
                //         $(".list-group").eq(mySwiper2.activeIndex).append('<li class="list-group-item">我是加载出来的'+oi+'...</li>');
                //     }
                //     $(".loadtip").html('上拉加载更多...');
                //     mySwiper.update(); // 重新计算高度;
                // }, 800);
            }

            // 下拉刷新
            if(mySwiper.translate >= 50) {
                $(".init-loading").html('正在刷新...').show();
                $(".loadtip").html('上拉加载更多');
                loadFlag = true;

                setTimeout(function() {
                    $(".refreshtip").show(0);
                    $(".init-loading").html('刷新成功！');
                    setTimeout(function(){
                        $(".init-loading").html('').hide();
                    },800);
                    $(".loadtip").show(0);

                    //刷新操作
                    mySwiper.update(); // 重新计算高度;
                }, 1000);
            }else if(mySwiper.translate >= 0 && mySwiper.translate < 50){
                $(".init-loading").html('').hide();
            }
            return false;
        }
    });
    var mySwiper2 = new Swiper('.swiper-container2',{
        onTransitionEnd: function(swiper){

            $('.w').css('transform', 'translate3d(0px, 0px, 0px)')
            $('.swiper-container2 .swiper-slide-active').css('height','auto').siblings('.swiper-slide').css('height','0px');
            mySwiper.update();

            $('.tab a').eq(mySwiper2.activeIndex).addClass('active').siblings('a').removeClass('active');
        }

    });
    $('.tab a').click(function(){

        $(this).addClass('active').siblings('a').removeClass('active');
        mySwiper2.slideTo($(this).index(), 500, false)

        $('.w').css('transform', 'translate3d(0px, 0px, 0px)')
        $('.swiper-container2 .swiper-slide-active').css('height','auto').siblings('.swiper-slide').css('height','0px');
        mySwiper.update();
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
