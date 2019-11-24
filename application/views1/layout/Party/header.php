<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<title> <?php echo $title; ?> </title>
	  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/Ionicons/css/ionicons.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/dist/css/AdminLTE.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/dist/css/skins/_all-skins.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/morris.js/morris.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/datatables.net-bs/css/dataTables.bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('files/dist/css/googleapis.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('files/bower_components/select2/dist/css/select2.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('files/plugins/iCheck/all.css'); ?>">
		<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.js'); ?>"></script>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
			    <a href="<?php echo site_url('Admin/Home'); ?>" class="logo">
				    <span class="logo-mini"><b>AMC</b></span>
				    <span class="logo-lg"><b>Akcent </b> Computer </span>
			    </a>
    			<nav class="navbar navbar-static-top">
		      	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		       		<span class="sr-only">Toggle navigation</span>
		      	</a>

      			<div class="navbar-custom-menu">
        			<ul class="nav navbar-nav">
          				<li class="dropdown user user-menu">
            				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              				<img src="<?php echo base_url('files/dist/img/Party.jpg'); ?>" class="user-image" alt="User Image">
	              				<span class="hidden-xs"><?php echo $this->session->userdata('party_mobile'); ?></span>
            				</a>
            				<ul class="dropdown-menu">
	              				<li class="user-header">
	                				<img src="<?php echo base_url('files/dist/img/Party.jpg'); ?>" class="img-circle" alt="User Image">
	                				<p><?php echo $this->session->userdata('party_mobile'); ?></p>
	              				</li>
	              				<li class="user-footer">
	                				<div class="pull-left">
	                					<a href="<?php echo site_url('Party/Profile'); ?>" class="btn btn-block btn-success">Profile</a>
	                				</div>
	                				<div class="pull-right" style="background-color: #e4e4e4;">
	                					<a href="<?php echo site_url('Party/Login/Logout'); ?>" class="btn btn-block btn-danger">Sign out</a>
	                				</div>
	              				</li>
	            			</ul>
          				</li>
          				<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
       				</ul>
      			</div>
    		</nav>
  		</header>
  		<aside class="main-sidebar">
		    <section class="sidebar">
		    	<div class="user-panel">
		        	<div class="pull-left image">
		          		<img src="<?php echo base_url('files/dist/img/Party.jpg'); ?>" class="img-circle" alt="User Image">
		        	</div>
			        <div class="pull-left info">
			          	<p><?php echo $this->session->userdata('admin_name'); ?></p>
			          	<a><i class="fa fa-circle text-success"></i> Online</a>
			       	</div>
		      	</div>
		      	<ul class="sidebar-menu" data-widget="tree">
		        	<li class="header">MAIN NAVIGATION </li>
		        	<li class="<?php if($this->session->userdata('topmenu') == 'Dashboard') { echo 'active'; } ?>">
		         		<a href="<?php echo site_url('Party/Home'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
		        	</li>
		         	<li class="treeview <?php if($this->session->userdata('topmenu') == 'Transactions') { echo 'active'; } ?>">
		         		<a href=""><i class="fa fa-angle-down"></i> <span> Transactions </span></a>
		         		<ul class="treeview-menu">
				            <li class="<?php if($this->session->userdata('submenu') == 'Ticket Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Party/TicketInfo'); ?>"><i class="fa fa-circle-o"></i> Ticket Info </a>
				            </li>
		         		</ul>
		         	</li>	
		        </ul>
		    </section>
		</aside>  