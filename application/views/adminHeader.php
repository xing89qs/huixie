<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<title>府学教育</title>
	<base href="<?php echo base_url();?>"/>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <link href="http://www.html5tricks.com/demo/jiaoben2448/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://www.html5tricks.com/demo/jiaoben2448/js/star-rating.js" type="text/javascript"></script>


    	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #F8F7F0;
		/*margin: 0 10% 0 10%;*/
		/*font: 13px/20px normal Helvetica, Arial, sans-serif;*/
		color: #4F5155;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		/*margin: 10px;*/
		margin: 0 10% 0 10%;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<header>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">府学教育</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown" class="active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户管理 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("user/registerPage");?>">添加用户</a></li>
            <li><a href="<?php echo site_url("user/userList");?>">查看用户列表</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TA管理 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("ta/addTaPage");?>">添加TA</a></li>
            <li><a href="<?php echo site_url("ta/taList");?>">查看TA列表</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">订单管理 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("order/unpaidOrderList");?>">所有未付款订单</a></li>
            <li><a href="<?php echo site_url("order/untakenOrderList");?>">所有未接单订单</a></li>
            <li><a href="<?php echo site_url("order/unfinishedOrderList");?>">所有未完成订单</a></li>
            <li><a href="<?php echo site_url("order/finishedOrderList");?>">所有已完成订单</a></li>
            <li><a href="<?php echo site_url("order/orderList");?>">所有订单（未分类）</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin管理 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("admin/adminList");?>">查看Admin列表</a></li>
            <li><a href="<?php echo site_url("admin/modifyPage");?>">修改密码</a></li>
            <li><a href="<?php echo site_url("admin/logout");?>">注销登陆</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      <?php if(isset($admin)): ?>
        <li class="active"><a><?php echo $admin->name;?>，欢迎您登陆</a></li>
      <?php else: ?>
        <li class="active"><a href="<?php echo site_url("admin/loginPage");?>">登陆</a></li>
      <?php endif ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</header>
