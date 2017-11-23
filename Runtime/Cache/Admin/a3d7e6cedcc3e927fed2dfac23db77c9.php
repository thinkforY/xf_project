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
                <a href="#">配置项管理</a>
            </li>
            <li>
                <a href="<?php echo U('conf/lstconf');?>">配置项列表</a>
            </li>
            <li class="active">添加配置项</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">
                    
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">新增配置项</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="<?php echo U('conf/save');?>" method="post">
                                <div class="form-group">
                                    <label for="cname" class="col-sm-2 control-label no-padding-right">中文名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" required="" id="cname" placeholder="" name="cname" required="" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label for="ename" class="col-sm-2 control-label no-padding-right">英文名称</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" required="" id="ename" placeholder="" name="ename" required="" type="text">
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label for="d_type" class="col-sm-2 control-label no-padding-right">配置类型</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" required="" name="d_type" id="d_type">
                                            <option value="1">输入框</option>
                                            <option value="2">单选框</option>
                                            <option value="3">复选框</option>
                                            <option value="4">下拉菜单</option>
                                            <option value="5">文本域</option>
                                            <option value="6">附件</option>
                                        </select>
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label no-padding-right">配置分类</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" required="" name="c_type" id="c_type">
                                            <option value="1">基本配置</option>
                                            <option value="2">联系方式</option>
                                            <option value="3">SEO配置</option>
                                        </select>
                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label no-padding-right">默认值</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="value" placeholder="" name="value" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label no-padding-right">可选值</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="values" placeholder="" name="values" type="text">
                                    </div>
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
<!-- <div class="select2-sizer" style="position: absolute; left: -10000px; top: -10000px; display: none; font-size: 13px; font-family: sans-serif; font-style: normal; font-weight: normal; letter-spacing: normal; text-transform: none; white-space: nowrap;"></div>
<div class="select2-drop select2-drop-multi select2-display-none select2-drop-active" style="left: 263px; width: 767px; top: 411px; bottom: auto; display: none;">   <ul class="select2-results"></ul></div> -->
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