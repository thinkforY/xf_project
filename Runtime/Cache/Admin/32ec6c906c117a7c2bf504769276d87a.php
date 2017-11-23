<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>XFPHP后台管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Public/Admin/css/layui.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <!--[if lt IE 9]>
    <script src="__JS__/html5shiv.min.js"></script>
    <script src="__JS__/respond.min.js"></script>
    <style>
        .login .login-form input {color: #000;}
    </style>
    <![endif]-->
</head>
<body class="login">
<div class="login-title">XFPHP后台管理系统</div>
<form class="layui-form login-form" id="loginForm" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" id="username" name="username" required lay-verify="required" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" id="password" name="password" required lay-verify="required" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">验证码</label>
        <div class="layui-input-block">
            <input type="text" id="veify" name="verify" required lay-verify="required" class="layui-input layui-input-inline">
            <img src="<?php echo U('login/verify');?>" style="cursor: pointer;" alt="点击更换" title="点击更换" onclick="changeVerify(this)" class="captcha">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" onclick="loginSystem()" lay-submit lay-filter="*">登 录</button>
        </div>
    </div>
</form>
<script src="/Public/Admin/js/jquery-1.10.2.min.js"></script>
<script src="/Public/Admin/js/layui.all.js"></script>
<script src="/Public/Admin/js/admin.js"></script>
<script>
	function changeVerify(o){
		o.src = "<?php echo U('verify');?>?id="+Math.random();
	}

	function loginSystem(){
        var username = $("#username").val(),
            password = $("#password").val(),
            verify = $("#verify").val();
            alert(111);
        $.ajax({
            type: 'POST',
            dataType:'json',
            url:"/admin/login/signout",
            data:$("#loginForm").serialize(),
            success:function(info) {
                if (info.error == '') {
                    window.location.href = "/admin/index/index";
                }else{
                    if (info.error == "验证码不匹配,请重新输入") {
                        $(".captcha").css("src","<?php echo U('verify');?>?id="+Math.random());
                    }
                    alert(info.error);
                }
            },
            error: function(xhr, status, error) {
                alert(456)
                alert(error);
            }
        });
	}
</script>
</body>
</html>