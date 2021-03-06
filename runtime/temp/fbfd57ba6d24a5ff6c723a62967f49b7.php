<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/guo.yaoget.cn/public/../application/index/view/member/order_info.html";i:1572607032;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/swiper-3.3.1.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/static/index/layui/css/layui.css"/>
</head>
<body>
<div style="width: 90%;margin: auto;line-height: 2.5;">
    <div style="margin-top: 10px;text-align: center;">
        【<?php echo $info['category_name']; ?>】<?php echo $info['name']; ?>
    </div>
    <div>采购数量：<?php echo $info['buynum']; ?></div>
    <div>收货地址：<?php echo $info['city']; ?></div>
    <div style="line-height: 2;">
        <div style="float: left;width: 20%">描述：</div>
        <div style="float: left;width: 80%;"><?php echo $info['description']; ?></div>
    </div>
    <div>联系人&nbsp;&nbsp;&nbsp;：<span style="color:#FF3030"><?php echo $info['contact']; ?></span></div>
    <div>联系方式：<span style="color:#FF3030"><?php echo $info['phone']; ?></span></div>
    <div>发布时间：<?php echo date("Y-m-d H:i:s",$info['createtime']); ?></div>
    <div style="text-align: center;margin-top: 20px;">
        <button style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid #f5c412;background: #f5c412;color: white;">
            <a href="tel:<?php echo $info['phone']; ?>" style="color: white">拨打电话</a>
        </button>
    </div>
</div>
</body>
<script src="/static/index/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/js/swiper.jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/index/layui/layui.js" type="text/javascript" charset="utf-8"></script>
</html>