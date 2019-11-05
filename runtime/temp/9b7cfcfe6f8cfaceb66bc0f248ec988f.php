<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/guo.yaoget.cn/public/../application/index/view/member/order.html";i:1572607677;}*/ ?>
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
        .tab{display: flex;line-height: 40px;position: fixed;top: 0px;width: 100%;z-index: 10;border-bottom: 1px #ccc solid;}
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
<!--<div class="a">标题</div>-->
<div class="tab">
    <a class="active" href="javascript:;">待付款</a>
    <a href="javascript:;">已付款</a>
</div>
<div class="swiper-container">
    <!--    <div class="refreshtip">下拉可以刷新</div>-->
    <div class="swiper-wrapper w">
        <div class="swiper-slide d">
            <!--            <div class="init-loading list-group-item text-center" style="display: none;">下拉可以刷新</div>-->
            <div class="swiper-container2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide list-group">
                        <?php if(is_array($no) || $no instanceof \think\Collection || $no instanceof \think\Paginator): $i = 0; $__LIST__ = $no;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?>
                        <div class="list-group-item">
                            <div style="width: 95%;margin: auto;height: 150px;background: white;margin-top: 15px">
                                <div style="padding: 10px 20px 10px 20px;line-height: 1.8;">
                                    <div style="font-size: 17px;">【<?php echo $n['category_name']; ?>】<?php echo $n['name']; ?></div>
                                    <div style="color: #666;font-size: 12px">购买数量：<?php echo $n['num']; ?></div>
                                    <div style="color: #666;font-size: 12px">实付款：¥<?php echo $n['price']; ?></div>
                                    <div style="float: right;margin-top: 25px;">
                                        <button style="width: 90px;height: 25px;background: white; color: #777;border: 1px solid #777;border-radius: 5px;">删除订单</button>
                                        <button style="width: 90px;height: 25px;background: #EE0000; color: white;border: 1px solid #EE0000;border-radius: 5px;" id="pay">立即付款</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="price" value="<?php echo $n['price']; ?>">
                            <input type="hidden" id="id" value="<?php echo $n['tid']; ?>">
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <h1 style="text-align: center;font-size: 18px;margin-top: 20px;color: #666;">没有更多啦！</h1>

                    </div>
                    <div class="swiper-slide list-group">
                        <?php if(is_array($yes) || $yes instanceof \think\Collection || $yes instanceof \think\Paginator): $i = 0; $__LIST__ = $yes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$y): $mod = ($i % 2 );++$i;?>
                        <a href="/index/member/orderinfo/id/<?php echo $y['id']; ?>">
                            <div class="list-group-item">
                                <div style="width: 95%;margin: auto;height: 150px;background: white;margin-top: 15px">
                                    <div style="padding: 10px 20px 10px 20px;line-height: 1.8;">
                                        <div style="font-size: 17px;color: black">【<?php echo $y['category_name']; ?>】<?php echo $y['name']; ?></div>
                                        <div style="color: #666;font-size: 12px">购买数量：<?php echo $y['num']; ?></div>
                                        <div style="color: #666;font-size: 12px">实付款：¥<?php echo $y['price']; ?></div>
                                        <div style="float: right;margin-top: 25px;">
<!--                                            <button style="width: 90px;height: 25px;background: white; color: #777;border: 1px solid #777;border-radius: 5px;">删除订单</button>-->
<!--                                            <button style="width: 90px;height: 25px;background: #EE0000; color: white;border: 1px solid #EE0000;border-radius: 5px;">立即付款</button>-->
                                            <button style="width: 90px;height: 25px;background: #f3970d; color: white;border: 1px solid #f3970d;border-radius: 5px;">
                                                <a href="tel:<?php echo $y['phone']; ?>" style="color: white">拨打电话</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <h1 style="text-align: center;font-size: 18px;margin-top: 20px;color: #666;">没有更多啦！</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    <div class="loadtip">上拉加载更多</div>-->
    <div class="swiper-scrollbar"></div>
</div>
<script src="/static/index/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/js/swiper.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script>
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;


    });
    $('#pay').click(function () {
        var task_id = $(this).find('#id').val();
        var price = $(this).find('#price').val();
        var num = $(this).find('#num').html();
        console.log(num);
        var r=confirm("是否确认提交订单？")
        if (r==true)
        {
            $.ajax({
                type:'post',
                data:{
                    task_id:task_id,
                    price:price,
                    num:num
                },
                dataType:'json',
                url:'http://guo.yaoget.cn/index/pay/order',
                success:function (res) {
                    console.log(res);
                    if(res.code == 200){
                        layer.msg(res.msg);
                        setTimeout(function () {
                            location.href = res.url
                        },1500)
                    }else if(res.code == 300){
                        layer.msg(res.msg);
                        setTimeout(function () {
                            location.href = res.url
                        },1500)
                    }
                }
            })
        }
        else
        {
            console.log('取消订单');
        }
        // $.ajax({
        //     type:'post',
        //     data:{
        //         task_id:task_id,
        //         price:price,
        //         num:num
        //     },
        //     dataType:'json',
        //     url:'http://guo.yaoget.cn/index/pay/payment',
        //     success: function (res) {
        //         console.log(res)
        //
        //         if(res.code == 200){
        //             //调用微信JS api 支付
        //             function jsApiCall()
        //             {
        //                 WeixinJSBridge.invoke(
        //                     'getBrandWCPayRequest',JSON.parse(res.data),
        //                     function(res){
        //                         if (res.err_msg == "get_brand_wcpay_request:ok") { // 支付成功
        //                             location.href = '/index/index/show/id/'+task_id;
        //                         }
        //                         if(res.err_msg == "get_brand_wcpay_request:fail") { // 支付失败
        //                             location.href = 'fail';
        //                         }
        //                         if (res.err_msg == "get_brand_wcpay_request:cancel") { // 取消支付
        //                             location.href = '/index/member/order';
        //                         }
        //                     }
        //                 );
        //             }
        //
        //             function callpay()
        //             {
        //                 if (typeof WeixinJSBridge == "undefined"){
        //                     if( document.addEventListener ){
        //                         document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
        //                     }else if (document.attachEvent){
        //                         document.attachEvent('WeixinJSBridgeReady', jsApiCall);
        //                         document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
        //                     }
        //                 }else{
        //                     jsApiCall();
        //                 }
        //             }
        //             callpay();
        //         }
        //     }
        // })
    });
</script>
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
    // var mySwiper = new Swiper('.swiper-container',{
    //     direction: 'vertical',
    //     scrollbar: '.swiper-scrollbar',
    //     slidesPerView: 'auto',
    //     mousewheelControl: true,
    //     freeMode: true,
    //     onTouchMove: function(swiper){		//手动滑动中触发
    //         var _viewHeight = document.getElementsByClassName('swiper-wrapper')[0].offsetHeight;
    //         var _contentHeight = document.getElementsByClassName('swiper-slide')[0].offsetHeight;
    //
    //
    //         if(mySwiper.translate < 50 && mySwiper.translate > 0) {
    //             $(".init-loading").html('下拉刷新...').show();
    //         }else if(mySwiper.translate > 50 ){
    //             $(".init-loading").html('释放刷新...').show();
    //         }
    //     },
    //     onTouchEnd: function(swiper) {
    //         var _viewHeight = document.getElementsByClassName('swiper-wrapper')[0].offsetHeight;
    //         var _contentHeight = document.getElementsByClassName('swiper-slide')[0].offsetHeight;
    //         // 上拉加载
    //         if(mySwiper.translate <= _viewHeight - _contentHeight - 50 && mySwiper.translate < 0) {
    //             // console.log("已经到达底部！");
    //
    //             if(loadFlag){
    //                 $(".loadtip").html('正在加载...');
    //             }else{
    //                 $(".loadtip").html('没有更多啦！');
    //             }
    //
    //             setTimeout(function() {
    //                 for(var i = 0; i <5; i++) {
    //                     oi++;
    //                     $(".list-group").eq(mySwiper2.activeIndex).append('<li class="list-group-item">我是加载出来的'+oi+'...</li>');
    //                 }
    //                 $(".loadtip").html('上拉加载更多...');
    //                 mySwiper.update(); // 重新计算高度;
    //             }, 800);
    //         }
    //
    //         // 下拉刷新
    //         if(mySwiper.translate >= 50) {
    //             $(".init-loading").html('正在刷新...').show();
    //             $(".loadtip").html('上拉加载更多');
    //             loadFlag = true;
    //
    //             setTimeout(function() {
    //                 $(".refreshtip").show(0);
    //                 $(".init-loading").html('刷新成功！');
    //                 setTimeout(function(){
    //                     $(".init-loading").html('').hide();
    //                 },800);
    //                 $(".loadtip").show(0);
    //
    //                 //刷新操作
    //                 mySwiper.update(); // 重新计算高度;
    //             }, 1000);
    //         }else if(mySwiper.translate >= 0 && mySwiper.translate < 50){
    //             $(".init-loading").html('').hide();
    //         }
    //         return false;
    //     }
    // });
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
</body>
</html>
