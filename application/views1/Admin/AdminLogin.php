<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  		<title>Admin | Log in</title>

	  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/bower_components/Ionicons/css/ionicons.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/dist/css/AdminLTE.min.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/plugins/iCheck/square/blue.css'); ?>">
	  	<link rel="stylesheet" href="<?php echo base_url('files/dist/css/googleapis.css'); ?>">
	  	<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
		    	<a href="<?php site_url(''); ?>"><b>Admin Login</b></a>
		  	</div>
		  	<div class="login-box-body">
		  		<p class="login-box-msg">Sign in to start your session</p>

			    <form action="" method="post">
			    	<div class="form-group has-feedback">
				        <input type="phone" id="mobile" name="mobile" class="form-control" placeholder="Mobile" max="10" min="10">
				        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				        <span class="text-red"> <?php echo form_error('mobile'); ?> </span>
				    </div>
			     	<div class="form-group has-feedback">
				        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
				        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
				        <span class="text-red"> <?php echo form_error('password'); ?> </span>
			      	</div>
			      	<div class="confirm-div text-red"></div><br>
			      	<div class="row">
				        <div class="col-xs-4">
				          <button type="submit" id="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				        </div>
			      	</div>
			    </form>
			</div>
		</div>	
		<script>
			$(document).ready(function() {
				$('.confirm-div').hide();
				
				<?php if($this->session->flashdata('msg')){ ?>
					$('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show(); 
				<?php } ?>

				setTimeout(function() { 
					$('.confirm-div').fadeOut('fast');
				}, 5000);
			});
		</script>
	</body>
</html>
