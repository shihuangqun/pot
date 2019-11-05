<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/wx.glcgpt.com/public/../application/index/view/member/index.html";i:1572864721;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>会员中心</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link href="/static/index/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/static/index/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/index/css/chongzhi.css">
    <link rel="stylesheet" type="text/css" href="/static/index/layui/css/layui.css"/>
</head>
<body>

<!--

 * 17素材vip建站专区模块代码
 * 详尽信息请看官网：http://www.17sucai.com/pins/vip
 *
 * Copyright , 温州易站网络科技有限公司版权所有
 *
 * 请尊重原创，未经允许请勿转载。
 * 在保留版权的前提下可应用于个人或商业用途

-->

<section class="aui-flexView">
    <!--            <header class="aui-navBar aui-navBar-fixed">-->
    <!--                <a href="javascript:;" class="aui-navBar-item">设置-->
    <!--                </a>-->
    <!--                <div class="aui-center">-->
    <!--                    <span class="aui-center-title"></span>-->
    <!--                </div>-->
    <!--                <a href="javascript:;" class="aui-navBar-item">-->
    <!--                    <i class="icon icon-sys"></i>-->
    <!--                </a>-->
    <!--            </header>-->
    <section class="aui-scrollView">
        <div class="aui-flex-box">
            <div class="aui-flex-box-hd">
                <img src="<?php echo $info['avatar']; ?>" alt="">
            </div>
            <div class="aui-flex-box-bd" style="font-size: 20px;"><?php echo $info['nickname']; ?>
            </div>
<!--            <div class="aui-flex-box-fr">编辑资料</div>-->
        </div>
        <div class="aui-flex-box">
            <div class="aui-flex-box-bd">
                <h2 style="font-size: 16px;">
                    总资产(元)
<!--                    <i class="icon icon-eye"></i>-->
                </h2>
                <h3 style="font-size: 28px;"><?php echo $info['money']; ?></h3>
                <!--                        <p>-->
                <!--                            最近收益 <em>6.02</em>-->
                <!--                        </p>-->
            </div>
            <div style="text-align: right;line-height: 2">
                <button style="width: 70px;height: 30px;background: #FF3030;border: 1px solid #FF3030;color: white;line-height: 30px;font-size:20px;" class="tbox">
<!--                    <a href="/index/member/chongzhi" style="color: white;">充值</a>-->
                    充值
                </button>
<!--                <button class="tbox">测试</button>-->
<!--                <p style="    color: #808080;">充值300送150</p>-->
            </div>
            <div class="aui-flex-box-fr"></div>
        </div>
        <!--                <div class="aui-rankings">-->
        <!--                    <a href="javascript:;" class="aui-rankings-item aui-rankings-item-line clearfix">-->
        <!--                        <span>基金</span>-->
        <!--                        <span class="aui-rankings-title">120.00</span>-->
        <!--                    </a>-->
        <!--                    <a href="javascript:;" class="aui-rankings-item clearfix">-->
        <!--                        <span>理财</span>-->
        <!--                        <span class="aui-rankings-title">8900.00</span>-->
        <!--                    </a>-->
        <!--                </div>-->
        <div class="divHeight"></div>
        <div class="aui-icon-box">
            <!--                    <a class="aui-flex-box" href="javascript:;">-->
            <!--                        <div class="aui-flex-box-hd">-->
            <!--                            <img src="/static/index/images/icon-item-001.png" alt="">-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-bd">养老基金-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-fr"></div>-->
            <!--                    </a>-->
            <!--                    <div class="divHeight"></div>-->
            <!--                    <a class="aui-flex-box" href="javascript:;">-->
            <!--                        <div class="aui-flex-box-hd">-->
            <!--                            <img src="/static/index/images/icon-item-002.png" alt="">-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-bd">银行卡-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-fr">绑定银行卡</div>-->
            <!--                    </a>-->
            <!--                    <div class="divHeight"></div>-->
            <!--                    <a class="aui-flex-box" href="javascript:;">-->
            <!--                        <div class="aui-flex-box-hd">-->
            <!--                            <img src="/static/index/images/icon-item-003.png" alt="">-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-bd">我的借钱-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-fr"></div>-->
            <!--                    </a>-->
            <!--                    <a class="aui-flex-box" href="javascript:;">-->
            <!--                        <div class="aui-flex-box-hd">-->
            <!--                            <img src="/static/index/images/icon-item-004.png" alt="">-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-bd">我的保险-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-fr"></div>-->
            <!--&lt;!&ndash;                    </a>&ndash;&gt;-->
            <!--                    <div class="divHeight"></div>-->
            <!--                    <a class="aui-flex-box" href="javascript:;">-->
            <!--                        <div class="aui-flex-box-hd">-->
            <!--                            <img src="/static/index/images/icon-item-005.png" alt="">-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-bd">股票账户-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-fr"></div>-->
            <!--                    </a>-->
            <!--                    <a class="aui-flex-box" href="javascript:;">-->
            <!--                        <div class="aui-flex-box-hd">-->
            <!--                            <img src="/static/index/images/icon-item-006.png" alt="">-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-bd">理财师服务-->
            <!--                        </div>-->
            <!--                        <div class="aui-flex-box-fr"></div>-->
            <!--                    </a>-->
            <a class="aui-flex-box" href="/index/member/order">
                <div class="aui-flex-box-hd">
                    <img src="/static/index/images/icon-item-007.png" alt="">
                </div>
                <div class="aui-flex-box-bd" style="font-size: 22px;">我的订单
                </div>
                <div class="aui-flex-box-fr" ></div>
            </a>

            <a class="aui-flex-box" href="/index/member/setting">
                <div class="aui-flex-box-hd">
                    <img src="/static/index/images/set.png" alt="">
                </div>
                <div class="aui-flex-box-bd" style="font-size: 22px;">设置
                </div>
                <div class="aui-flex-box-fr"></div>
            </a>
            <!--                    <div class="divHeight"></div>-->
        </div>
    </section>
    <!--            <footer class="aui-footer">-->
    <!--                <a href="javascript:;" class="aui-tabBar-item">-->
    <!--                    <span class="aui-tabBar-item-icon">-->
    <!--                        <i class="icon icon-home"></i>-->
    <!--                    </span>-->
    <!--                    <span class="aui-tabBar-item-text">首页</span>-->
    <!--                </a>-->
    <!--                <a href="javascript:;" class="aui-tabBar-item ">-->
    <!--                    <span class="aui-tabBar-item-icon">-->
    <!--                        <i class="icon icon-loan"></i>-->
    <!--                    </span>-->
    <!--                    <span class="aui-tabBar-item-text">理财</span>-->
    <!--                </a>-->
    <!--                <a href="javascript:;" class="aui-tabBar-item ">-->
    <!--                    <span class="aui-tabBar-item-icon">-->
    <!--                        <i class="icon icon-credit"></i>-->
    <!--                    </span>-->
    <!--                    <span class="aui-tabBar-item-text">服务</span>-->
    <!--                </a>-->
    <!--                <a href="javascript:;" class="aui-tabBar-item aui-tabBar-item-active">-->
    <!--                    <span class="aui-tabBar-item-icon">-->
    <!--                        <i class="icon icon-me"></i>-->
    <!--                    </span>-->
    <!--                    <span class="aui-tabBar-item-text">我的</span>-->
    <!--                </a>-->
    <!--            </footer>-->
</section>

<div class="modal fade" id="myModal">
    <div class="modal-dialog" style="    width: 80%;margin: auto;">
        <div class="modal-content" style="margin-top: 30%;">
            <div class="modal-header" style="padding: 5px">
                余额：<span style="color: #f15e15;"><?php echo $info['money']; ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="padding: 5px">
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
                                        <input type="number" name="amount" value="" id="price">
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
                        <div class="modal-body">
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
</div><!-- /.modal -->
</body>
<script src="/static/index/js/jquery-2.1.4.min.js"></script>
<script src="/static/index/js/bootstrap.min.js"></script>
<script src="/static/index/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script>
    layui.use(['layer', 'form'], function(){
        var layer = layui.layer
            ,form = layui.form;


    });
    $('#btn').click(function () {
        var price = $('#price').val()

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
<script type="text/javascript">
    $(function(){

        $(".tbox").click(function(){
            $('#myModal').modal('show') //显示模态框
        })

    });
</script>
</html>
