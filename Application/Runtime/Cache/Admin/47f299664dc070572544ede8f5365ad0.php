<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>XF后台管理系统</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/Public/Admin/css/bootstrap.css" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="/Public/Admin/css/beyond.css" rel="stylesheet">
    <link href="/Public/Admin/css/demo.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">
        <form action="<?php echo U('login/signout');?>" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">管理员登录</div>
                <div class="loginbox-textbox">
                    <input value="admin" required="" class="form-control" placeholder="" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" required="" placeholder="" name="password" type="password">
                </div>
                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="登录" type="submit">
                </div>
            </div>
            <div class="logobox">
                <p class="text-center">ThinkPHP3.2.3</p>
            </div>
        </form>
    </div>
    <!--Basic Scripts-->
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/bootstrap.js"></script>
    <script src="/Public/Admin/js/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="/Public/Admin/js/beyond.js"></script>
</body><!--Body Ends--></html>