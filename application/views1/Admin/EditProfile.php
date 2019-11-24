<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-briefcase"></i> <?php echo "Edit Profile" ?></h1>
    </section>
    <section class="content">
     	<div class="row">
     		<div class="col-md-12">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-edit"></i> <?php echo "Profile"; ?></h3>
            		</div>
			        <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			            <div class="box-body">
				            <div class="row col-md-12">
				            	 <div class="form-group col-md-6" style="padding-top: 5px;">
				                  	<label class="control-label"> Contact No.  </label>
									<div>
		                    			<input type="text" class="form-control" name="content_no" id="content_no" placeholder="Contact No." value="<?php if(isset($mobile_no)){ echo $mobile_no; } ?>" disabled>  
		                    		</div>		
				                </div>
				            	<div class="form-group col-md-6">
				                  	<label class="control-label"> Old Password <label class="text-red">*</label></label>
									<div>
		                    			<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
		                    		</div>
		                    		<div class="confirm-div text-red"></div><br>	
		                    		<label class="text-red"> <?php echo form_error('old_password'); ?> </label>	
				                </div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-6">
				                  	<label class="control-label"> Password <label class="text-red">*</label></label>
									<div>
		                    			<input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password">
		                    		</div>	
		                    		<label class="text-red"> <?php echo form_error('password'); ?> </label>	
				                </div>
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Confirm Password <label class="text-red">*</label></label>
									<div>
		                    			<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" >
		                    		</div>
		                    		<label class="text-red"> <?php echo form_error('confirm_password'); ?> </label>			
				                </div>
				            </div>
				        </div> 
				        <div class="box-footer">
				            <button type="submit" class="btn btn-primary pull-right">Submit</button>
				        </div>    
			        </form>			       
          		</div>
     		</div>
     	</div>	
    </section>
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