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
	              				<img src="<?php echo base_url('files/dist/img/admin.png'); ?>" class="user-image" alt="User Image">
	              				<span class="hidden-xs"><?php echo $this->session->userdata('admin_mobile'); ?></span>
            				</a>
            				<ul class="dropdown-menu">
	              				<li class="user-header">
	                				<img src="<?php echo base_url('files/dist/img/admin.png'); ?>" class="img-circle" alt="User Image">
	                				<p><?php echo $this->session->userdata('admin_mobile'); ?></p>
	              				</li>
	              				<li class="user-footer" style="background-color: #e4e4e4;">
	              					<div class="pull-left">
	                					<a href="<?php echo site_url('Admin/Profile'); ?>" class="btn btn-block btn-success">Profile</a>
	                				</div>
	                				<div class="pull-right">
	                					<a href="<?php echo site_url('Admin/Login/Logout'); ?>" class="btn btn-block btn-danger">Sign out</a>
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
		          		<img src="<?php echo base_url('files/dist/img/admin.png'); ?>" class="img-circle" alt="User Image">
		        	</div>
			        <div class="pull-left info">
			          	<p><?php echo $this->session->userdata('admin_name'); ?></p>
			          	<a><i class="fa fa-circle text-success"></i> Online</a>
			       	</div>
		      	</div>
		      	<ul class="sidebar-menu" data-widget="tree">
		        	<li class="header">MAIN NAVIGATION </li>
		        	<li class="<?php if($this->session->userdata('topmenu') == 'Dashboard') { echo 'active'; } ?>">
		         		<a href="<?php echo site_url('Admin/Home'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
		        	</li>
		        	
		        	<li class="treeview <?php if($this->session->userdata('topmenu') == 'General') { echo 'active'; } ?>">
		         		<a href=""><i class="fa fa-angle-down"></i> <span> General </span></a>
		         		<ul class="treeview-menu">
		         			<li class="<?php if($this->session->userdata('submenu') == 'Add-Company-Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Company_information/add'); ?>"><i class="fa fa-circle-o"></i> Company Information </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Engineer') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Engineer'); ?>"><i class="fa fa-circle-o"></i> Engineer Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Party Group') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/Party/AddGroup'); ?>"> <i class="fa fa-circle-o"></i> <span> Party Group </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Party Information') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/Party/PartyInfo'); ?>"> <i class="fa fa-circle-o"></i> <span> Party Information </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Technical User') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/TechnicalUser'); ?>"><i class="fa fa-circle-o"></i> Technical User Info </a>
				            </li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Item Company') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/ItemCom'); ?>"> <i class="fa fa-circle-o"></i> <span> Item Company </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Item Group') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/ItemGroup'); ?>"> <i class="fa fa-circle-o"></i> <span> Equipment Type </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Item Info') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/ItemInfo'); ?>"> <i class="fa fa-circle-o"></i> <span> Item Info </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Tax Slab Info') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/TaxSlab'); ?>"> <i class="fa fa-circle-o"></i> <span> Tax Slab Info </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Unit Info') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/Unit'); ?>"> <i class="fa fa-circle-o"></i> <span> Unit Info </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'AMC Type Info') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/AMCType'); ?>"> <i class="fa fa-circle-o"></i> <span> AMC Type Info </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Problem Info') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/ProblemInfo'); ?>"> <i class="fa fa-circle-o"></i> <span> Problem Info </span></a>
				        	</li>
				        	<li class="<?php if($this->session->userdata('submenu') == 'Problem Rectification Info') { echo 'active'; } ?>">
				         		<a href="<?php echo site_url('Admin/ProblemRectificationInfo'); ?>"> <i class="fa fa-circle-o"></i> <span> Problem Rectification Info </span></a>
				        	</li>
		         		</ul>
		         	</li>
		         	<li class="treeview <?php if($this->session->userdata('topmenu') == 'Transactions') { echo 'active'; } ?>">
		         		<a href=""><i class="fa fa-angle-down"></i> <span> Transactions </span></a>
		         		<ul class="treeview-menu">
		         			<li class="<?php if($this->session->userdata('submenu') == 'AMC Contract Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/AMCContract'); ?>"><i class="fa fa-circle-o"></i> AMC Contract Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Machine Details') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/MachineDetails'); ?>"><i class="fa fa-circle-o"></i> Machine Details </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Party Wise Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/PartyWiseInfo'); ?>"><i class="fa fa-circle-o"></i> Party Wise Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Ticket Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/TicketInfo'); ?>"><i class="fa fa-circle-o"></i> Ticket Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Call Visit Report') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/CallVisitReport'); ?>"><i class="fa fa-circle-o"></i> Call Visit Report </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Sale Invoice') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/SaleInvoice'); ?>"><i class="fa fa-circle-o"></i> Sale Invoice </a>
				            </li>	
				             <li class="<?php if($this->session->userdata('submenu') == 'Receipt Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/ReceiptInfo'); ?>"><i class="fa fa-circle-o"></i> Receipt Info </a>
				            </li>	
		         		</ul>
		         	</li>
		         	<li class="treeview <?php if($this->session->userdata('topmenu') == 'Report') { echo 'active'; } ?>">
		         		<a href=""><i class="fa fa-angle-down"></i> <span> Report </span></a>
		         		<ul class="treeview-menu">
		         			<li class="<?php if($this->session->userdata('submenu') == 'Call Visit Report') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Report/CallVisitReport'); ?>"><i class="fa fa-circle-o"></i> Call Visit Report </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Invoice Report') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Report/InvoiceReport'); ?>"><i class="fa fa-circle-o"></i> Invoice Report </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Receipt Report') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Report/ReceiptReport'); ?>"><i class="fa fa-circle-o"></i> Receipt Report </a>
				            </li>
				        </ul>
				    </li>
				    <li class="treeview <?php if($this->session->userdata('topmenu') == 'Export') { echo 'active'; } ?>">
				    	<a href=""><i class="fa fa-angle-down"></i> <span> Export </span></a>
				    	<ul class="treeview-menu">
				    		<li class="<?php if($this->session->userdata('submenu') == 'Party info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/PartyInfo'); ?>"><i class="fa fa-circle-o"></i> Party information </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Item Company') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/ItemCompany'); ?>"><i class="fa fa-circle-o"></i> Item Company </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Equipment Type') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/EquipmentType'); ?>"><i class="fa fa-circle-o"></i> Equipment Type </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Item Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/ItemInfo'); ?>"><i class="fa fa-circle-o"></i> Item Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Problem Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/ProblemInfo'); ?>"><i class="fa fa-circle-o"></i> Problem Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Problem Rectification Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/ProblemRectificationInfo'); ?>"><i class="fa fa-circle-o"></i> Problem Rectification Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'AMC Contract Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/AMCContractInfo'); ?>"><i class="fa fa-circle-o"></i> AMC contract info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Machine Details') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/MachineDetails'); ?>"><i class="fa fa-circle-o"></i> Machine Details </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Party Wise Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/PartyWiseInfo'); ?>"><i class="fa fa-circle-o"></i> Party Wise Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Ticket Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/TicketInfo'); ?>"><i class="fa fa-circle-o"></i> Ticket Info </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Call Visit Report') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/CallVisitReport'); ?>"><i class="fa fa-circle-o"></i> Call Visit Report </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Sale Invoice') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/SaleInvoice'); ?>"><i class="fa fa-circle-o"></i> Sale Invoice </a>
				            </li>
				            <li class="<?php if($this->session->userdata('submenu') == 'Receipt Info') { echo 'active'; } ?>">
				            	<a href="<?php echo site_url('Admin/Export/ReceiptInfo'); ?>"><i class="fa fa-circle-o"></i> Receipt Info </a>
				            </li>
				    	</ul>
				    </li>	
		        </ul>
		    </section>
		</aside>  