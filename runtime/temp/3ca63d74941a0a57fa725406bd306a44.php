<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/wx.glcgpt.com/public/../application/index/view/index/buy.html";i:1572862329;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/swiper-3.3.1.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/css/show.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/layui/css/layui.css"/>
    <link rel="stylesheet" href="/static/index/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/index/css/chongzhi.css">

</head>
<style>
    body{
        background: #F0F0F0;
    }
</style>
<body>
<div style=" width: 95%;margin: auto;font-size: 17px;background: white;height: 210px;margin-top: 5px;">
    <div style="width: 90%;margin: auto;">
        <div style="height: 50px;border-bottom: 1px solid #EEEED1;line-height: 50px;">【<?php echo $info['category_name']; ?>】<?php echo $info['name']; ?></div>
        <div style="height: 50px;border-bottom: 1px solid #EEEED1;line-height: 50px;">采购数量
            <span style="float: right;" id="num"><?php echo $num; ?></span>
            <span style="display: none" id="task_id"><?php echo $info['id']; ?></span>
            <span style="display: none" id="price"><?php echo $info['price']; ?></span>
        </div>
        <div style="height: 50px;border-bottom: 1px solid #EEEED1;line-height: 50px;">单价（原）
            <span style="float: right;"><?php echo $info['price'] * $num; ?></span>
        </div>
        <div style="height: 50px;line-height: 50px;float: right;">
            实付款：<span style="font-size: 24px;color: #EE0000;"><?php echo $info['price'] * $num; ?></span>
        </div>
    </div>
</div>

<div style="width: 80%;margin: auto;">
    <button style="font-size: 18px;width: 100%;height: 40px; background: #FF3030;border: 1px solid #FF3030;border-radius: 5px;color: white;margin-top: 20px;" id="pay">付款</button>
<!--    <button class="tbox">ceshi</button>-->
<!--    <input type="hidden" id="price" value="<?php echo $info['price']; ?>">-->
<!--    <input type="hidden" class="task_id" value="<?php echo $info['id']; ?>">-->
</div>


<div class="modal fade" id="myModal">
    <div class="modal-dialog" style="    width: 80%;margin: auto;">
        <div class="modal-content" style="margin-top: 70%;">
            <div class="modal-header" style="padding: 5px">
                余额：<span style="color: #f15e15;"><?php echo $user['money']; ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="padding: 0px">
                <div class="container">
                    <!--    <div class="row">-->
                    <!--        <div class="container_logo">-->
                    <!--            <div class="play col-xs-10 col-sm-10 col-md-10 col-lg-10">-->
                    <!--                <img src="./images/timg.jpg" />-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <form action="" method="post">
                        <div class="row">
                            <div class="play col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <div class="form-group">
                                    <input type="hidden" class="getId" name="id">
                                    <h4>充值金额</h4>
                                    <div class="number_amount">
                                        <label>￥</label>
                                        <input type="number" name="amount" value="" id="prices">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="quick_amount col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <div style="font-size: 12px;color: #f7bf5a;" st>
                                    充值
                                    <?php if(is_array($chongzhi) || $chongzhi instanceof \think\Collection || $chongzhi instanceof \think\Paginator): $i = 0; $__LIST__ = $chongzhi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    满<?php echo $vo['money']; ?>送<?php echo $vo['give']; ?>元
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
<!--                                <div style="color: #f11b60;text-align: center;">注意：充值满5000以上请联系客服</div>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="quick_amount col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <p class="col-xs-3 col-sm-3 col-md-3 col-lg-3" data-item='100'>100</p>
                                <p class="col-xs-3 col-sm-3 col-md-3 col-lg-3" data-item='200'>200</p>
                                <p class="col-xs-3 col-sm-3 col-md-3 col-lg-3" data-item='500'>500</p>
                                <p class="col-xs-3 col-sm-3 col-md-3 col-lg-3" data-item='1000'>1000</p>
                                <p class="col-xs-3 col-sm-3 col-md-3 col-lg-3" data-item='2000'>2000</p>
                                <p class="col-xs-3 col-sm-3 col-md-3 col-lg-3" data-item='5000'>5000</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="_submit col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <input type="button" value="充值" class="btn btn-primary submit-amount" id="btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id='exampleModal'>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">提示</h4>
                        </div>
                        <div class="modal-body" style="padding: 0px">
                            <p>输入金额不能超出5000元</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">确定</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mask"></div>
            </div>
<!--            <div class="modal-footer">-->
<!--            </div>-->
        </div>
        <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</body>
<script src="/static/index/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/js/swiper.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/js/bootstrap.min.js"></script>
<script>
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;


    });
    $('#pay').click(function () {
        var task_id = $('#task_id').html()
        var price = $('#price').html();
        // console.log(price);
        var num = $('#num').html();
        // console.log(num);
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
                url:'http://wx.glcgpt.com/index/pay/order',
                success:function (res) {
                    console.log(res);
                    if(res.code == 200){
                        layer.msg(res.msg);
                        setTimeout(function () {
                            location.href = res.url
                        },1500)
                    }else if(res.code == 300){
                        // layer.msg(res.msg);
                        // setTimeout(function () {
                            $('#myModal').modal('show') //显示模态框
                            // location.href = res.url
                        // },1500)
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
        //     url:'http://wx.glcgpt.com/index/pay/payment',
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
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;


    });

    $('#btn').click(function () {

        var price = $('#prices').val()
        console.log(price)
        $.ajax({
            type:'post',
            data:{
                money:price,
            },
            dataType:'json',
            url:'http://wx.glcgpt.com/index/pay/payment',
            success: function (res) {
                console.log(res)
                if(res.code == 200){
                    //调用微信JS api 支付
                    function jsApiCall()
                    {
                        WeixinJSBridge.invoke(
                            'getBrandWCPayRequest',JSON.parse(res.data),
                            function(res){
                                if (res.err_msg == "get_brand_wcpay_request:ok") { // 支付成功
                                    $.ajax({
                                        type:'post',
                                        data:{price:price},
                                        dataType:'json',
                                        url:'http://wx.glcgpt.com/index/member/chongzhi',
                                        success: function (res) {
                                            console.log(res)
                                            if(res.code == 400){
                                                alert(res.msg);
                                            }else{
                                                layer.msg(res.msg);
                                                setTimeout(function () {
                                                    // history.go(-1);//
                                                    location.reload();
                                                },1500)
                                            }
                                        }
                                    })

                                }
                                if(res.err_msg == "get_brand_wcpay_request:fail") { // 支付失败
                                    location.href = 'fail';
                                }
                                if (res.err_msg == "get_brand_wcpay_request:cancel") { // 取消支付
                                    location.href = '/index/member/order';
                                }
                            }
                        );
                    }

                    function callpay()
                    {
                        if (typeof WeixinJSBridge == "undefined"){
                            if( document.addEventListener ){
                                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                            }else if (document.attachEvent){
                                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                            }
                        }else{
                            jsApiCall();
                        }
                    }
                    callpay();
                }
            }
        })
    });

    function recharge(){
        $.ajax({
            type:'post',
            data:{price:price},
            dataType:'json',
            url:'http://wx.glcgpt.com/index/member/chongzhi',
            success: function (res) {
                console.log(res)
                // if(res.code == 400){
                //     alert(res.msg);
                // }
            }
        })
    }
</script>
<script>
    var $amountInput = $('[type="number"]');
    var amount = '';
    var $getId = $('[type="hidden"]');
    var getparse=ParaMeter();
    $getId.val(getparse.id);
    $(".quick_amount p").off("click").on("click", function () {
        amount = $(this).text();
        console.log(amount)
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings().removeClass('active');
            $amountInput.val(amount);
        } else {
            $(this).removeClass('active');
            $amountInput.val('');
        }
    })
    $amountInput.on('input propertychange', function () {
        if ($(this).val() > 5000) {
            $('#exampleModal').modal('show')
        }
        if($(this).val()!==$('.quick_amount p.active').text()){
            $('.quick_amount p').removeClass('active');
        }
    })
    $('#exampleModal').on('hidden.bs.modal', function (e) {
        $amountInput.val(5000);
    })
    function ParaMeter()
    {
        var obj={};
        var arr=location.href.substring(location.href.lastIndexOf('?')+1).split("&");
        for(var i=0;i < arr.length;i++){
            var aa=arr[i].split("=");
            obj[aa[0]]=aa[1];
        }
        return obj;
    }
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
    $(function(){

        $(".tbox").click(function(){
            $('#myModal').modal('show') //显示模态框
        })

    });
</script>

</html>
