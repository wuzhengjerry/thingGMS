<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>用户中心 - <?php echo C('WEB_SITE_TITLE');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="/Public/User/images/favicon.png">
<link rel="apple-touch-icon-precomposed" href="/Public/User/images/app-icon72x72@2x.png">
<link rel="stylesheet" href="/Public/User/css/amazeui.min.css"/>
<link rel="stylesheet" href="/Public/User/css/admin.css">
</head>
<body>

<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand"> <strong><?php echo C('WEB_SITE_TITLE');?></strong> <small>用户中心</small> </div>
  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"> <span class="am-icon-users"></span> <?php echo ($UserInfo['nickname']); ?> [<?php echo ($UserInfo['username']); ?>] <span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
          <li><a href="<?php echo U('User/Userinfo/index');?>"><span class="am-icon-user"></span> 资料修改 </a></li>
          <li><a href="<?php echo U('User/Userinfo/password');?>"><span class="am-icon-user"></span> 密码修改 </a></li>
          <li><a href="<?php echo U('User/Public/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>
<div class="am-cf admin-main"> 
  <!-- sidebar start -->
    
<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
  <div class="am-offcanvas-bar admin-offcanvas-bar">
    <ul class="am-list admin-sidebar-list">
      <li><a href="<?php echo U('User/Index/index');?>"><span class="am-icon-home"></span> 用户中心</a></li>
      <li class="admin-parent"> <a class="am-cf" data-am-collapse="{target:'#collapse-nav'}"><span class="am-icon-file"></span> 资料设置 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub <?php if(in_array(CONTROLLER_NAME,array('Userinfo'))): ?>am-in<?php endif; ?>
          " id="collapse-nav">
          <li><a href="<?php echo U('User/Userinfo/index');?>" class="am-cf"><span class="am-icon-user"></span> 基本资料<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
          <li><a href="<?php echo U('User/Userinfo/password');?>"><span class="am-icon-puzzle-piece"></span> 修改密码</a></li>
          <li><a href="<?php echo U('User/Userinfo/avatar');?>"><span class="am-icon-th"></span> 头像修改</a></li>
        </ul>
      </li>
    </ul>
    <div class="am-panel am-panel-default admin-sidebar-panel">
      <div class="am-panel-bd">
        <p><span class="am-icon-bookmark"></span> 公告</p>
        <p>时光静好，与君语；细水流年，与君同。—— ThinkGms</p>
      </div>
    </div>
  </div>
</div>

  <!-- sidebar end -->
  
  <!-- content start -->
  <div class="admin-content">
    
  <!-- 顶部提示 starp -->
  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户中心</strong> / <small>Personal Center</small></div>
  </div>
  <!-- 顶部提示 end --> 
  <!-- 主体区域 starp -->
  <div class="am-margin">
    <div class="am-tab-panel am-fade am-in am-active">
      <div class="am-g am-margin-top">
        <div class="am-u-sm-4 am-u-md-2 am-text-right">昵称[用户名]</div>
        <div class="am-u-sm-8 am-u-md-4 am-u-end">
          <?php echo ($UserInfo['nickname']); ?> [<?php echo ($UserInfo['username']); ?>]
        </div>
      </div>
      <div class="am-g am-margin-top">
        <div class="am-u-sm-4 am-u-md-2 am-text-right">积分</div>
        <div class="am-u-sm-8 am-u-md-4 am-u-end">
          <?php echo ($UserInfo['point']); ?>
        </div>
      </div>
      <div class="am-g am-margin-top">
        <div class="am-u-sm-4 am-u-md-2 am-text-right">余额</div>
        <div class="am-u-sm-8 am-u-md-4 am-u-end">
          ￥ <?php echo ($UserInfo['amount']); ?> 元
        </div>
      </div>
      <div class="am-g am-margin-top">
        <div class="am-u-sm-4 am-u-md-2 am-text-right">邮箱</div>
        <div class="am-u-sm-8 am-u-md-4 am-u-end">
          <?php echo ($UserInfo['email']); ?>
        </div>
      </div>
      <div class="am-g am-margin-top">
        <div class="am-u-sm-4 am-u-md-2 am-text-right">上次登录IP / 时间</div>
        <div class="am-u-sm-8 am-u-md-4 am-u-end">
          <?php if($UserInfo['last_login_time'] != 0): echo ($UserInfo['last_login_ip']); ?> / <?php echo (date('Y-m-d H:i:s',$UserInfo['last_login_time'])); ?>
          <?php else: ?>
          	第一次登录<?php endif; ?>
        </div>
      </div>
      <div class="am-g am-margin-top">
        <div class="am-u-sm-4 am-u-md-2 am-text-right">备注</div>
        <div class="am-u-sm-8 am-u-md-6 am-u-end">
          <?php echo ($UserInfo['remark']); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- 主体区域 end --> 

    <footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

  </div>
  <!-- content end --> 
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a> 

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Public/User/js/amazeui.ie8polyfill.min.js"></script>
<![endif]--> 
<!--[if (gte IE 9)|!(IE)]><!--> 
<script src="/Public/User/js/jquery.min.js"></script> 
<!--<![endif]--> 
<script src="/Public/User/js/amazeui.min.js"></script> 
<script src="/Public/User/js/app.js"></script>
</body>
</html>