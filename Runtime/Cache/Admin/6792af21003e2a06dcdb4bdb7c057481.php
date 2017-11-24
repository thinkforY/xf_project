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
                <a href="<?php echo U('conf/lstconf');?>">配置</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Body -->
    <div class="page-body">
                    
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">系统配置</span>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                            <?php foreach($configres as $k=>$v):?>
                                <?php if($v['d_type']==1):?>
                                    <div class="form-group">
                                        <label for="cname" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname'];?></label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="cname" placeholder="" value="<?php echo $v['value'];?>" name="<?php echo $v['ename'];?>"  type="text">
                                        </div>
                                        
                                    </div>
                                <?php endif;?>
                                <?php if($v['d_type']==2):?>
                                    <div class="form-group">
                                        <label for="cname" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname'];?></label>
                                        <div class="col-sm-6">
                                            <?php $v_arr=explode(',',$v['values']); foreach($v_arr as $k1=>$v1): ?>
                                                <label>
                                                    <input <?php if($v1==$v['value']){echo 'checked="checked"';}?> class="inverted" name="<?php echo $v['ename'];?>" value="<?php echo $v1;?>" type="radio">
                                                    <span class="text"><?php echo $v1;?></span>
                                                </label>
                                            <?php endforeach;?>
                                        </div>
                                        
                                    </div>
                                <?php endif;?>
                                <?php if($v['d_type']==3):?>
                                    <div class="form-group">
                                        <label for="cname" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname'];?></label>
                                        <div class="col-sm-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input <?php if($v['value']==$v['values']){echo 'checked="checked"';}?> name="<?php echo $v['ename'];?>" value="<?php echo $v['values'];?>" class="colored-success" type="checkbox">
                                                    <span class="text"></span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                <?php endif;?>
                                <?php if($v['d_type']==4):?>
                                    <div class="form-group">
                                        <label for="type" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname'];?></label>
                                        <div class="col-sm-6">
                                            <select name="<?php echo $v['ename'];?>" id="">
                                                <option value="">请选择</option>
                                                <?php $v_arr=explode(',',$v['values']); foreach($v_arr as $k1=>$v1): ?>
                                                    <option <?php if($v1==$v['value']){echo 'selected="selected"';}?> value="<?php echo $v1;?>"><?php echo $v1;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        
                                    </div>
                                <?php endif;?>
                                <?php if($v['d_type']==5):?>
                                    <div class="form-group">
                                        <label for="values" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname'];?></label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="<?php echo $v['ename'];?>" ><?php echo $v['value'];?></textarea>
                                        </div>
                                        
                                    </div>
                                <?php endif;?>
                                <?php if($v['d_type']==6):?>
                                    <div class="form-group">
                                        <label for="type" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname'];?></label>
                                        <div class="col-sm-6">
                                            <input type="file" name="<?php echo $v['ename'];?>">
                                            <?php if(!empty($v['value'])){echo "<img src='/Public/Upload/".$v["value"]."' alt=''>";}else{echo "暂无logo";}?>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <?php endforeach;?>
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