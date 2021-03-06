<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>ThinkPHP3.2.3</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="/Public/Admin/images/favicon.png" type="image/x-icon">
    <!--Basic Styles-->
    <link href="/Public/Admin/css/bootstrap.css" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.css" rel="stylesheet">
    <link href="/Public/Admin/css/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="/Public/Admin/css/beyond.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/css/demo.css" rel="stylesheet">
    <link href="/Public/Admin/css/typicons.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.css" rel="stylesheet">
    
</head>
<body>
  <!-- 头部 -->
  <div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            XF后台管理系统
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>admin</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo U('index/signout');?>">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/changePwd.html">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

  <!-- /头部 -->
  
  <div class="main-container container-fluid">
    <div class="page-container">
                  <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input class="searchinput" type="text">
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <?php if(is_array($menu)): foreach($menu as $key=>$vo): if(empty($vo['_data'])): ?><li <?php if($vo['id'] == $data['id']): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo U($vo['mca'],array('activeId'=>$vo['id']));?>" class="menu-dropdown">
                                    <i class="menu-icon fa <?php echo ($vo['icon']); ?>"></i>
                                    <span class="menu-text"><?php echo ($vo['name']); ?></span>
                                </a>
                            </li>
                            <?php else: ?>
                            <li <?php if($vo['id'] == $data['pid']): ?>class="active open"<?php endif; ?>>
                                <a href="#" class="menu-dropdown">
                                    <i class="menu-icon fa <?php echo ($vo['icon']); ?>"></i>
                                    <span class="menu-text"><?php echo ($vo['name']); ?></span>
                                    <i class="menu-expand"></i>
                                </a>
                                <ul class="submenu">
                                    <?php if(is_array($vo['_data'])): foreach($vo['_data'] as $key=>$vo1): ?><li <?php if($vo1['id'] == $data['id']): ?>class="active"<?php endif; ?>>
                                            <a href="<?php echo U($vo1['mca'],array('activeId'=>$vo1['id']));?>">
                                                <span class="menu-text"><?php echo ($vo1['name']); ?></span>
                                                <i class="menu-expand"></i>
                                            </a>
                                        </li><?php endforeach; endif; ?>
                                </ul>                            
                            </li><?php endif; endforeach; endif; ?>
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
                <div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="#">权限管理</a>
            </li>
            <li>
                <a href="<?php echo U('menu/lst');?>">权限列表</a>
            </li>
            <li class="active">添加权限</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">
                    
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增权限</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="<?php echo U('rule/save');?>" method="post">
                                <input type="hidden" name="pid" value="<?php echo ($pid); ?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right">权限名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="title" placeholder="" name="title" required="" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right">权限</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="name" placeholder="Admin/Index/index" name="name" required="" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">保存信息</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Body -->
</div>
            <!-- /Page Content -->
    </div>  
  </div>
      <!--Basic Scripts-->
    <script src="/Public/Admin/js/jquery_002.js"></script>
    <script src="/Public/Admin/js/bootstrap.js"></script>
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/select2.js"></script>
    <!--Beyond Scripts-->
    <script src="/Public/Admin/js/beyond.js"></script>
    


</body></html>