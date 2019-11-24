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
				                <div class="form-group col-md-3">
				                  	<label class="control-label"> Party Group Name <label class="text-red">*</label> </label>
									<div>
		                    			<select class="form-control" id="party_group" name="party_group" disabled>
										    <option value="">Select</option>
										    <?php foreach ($datas as $datas) { ?>
										        <option value="<?php echo $datas['id']; ?>" <?php if(isset($party_group_id)){ if($party_group_id == $datas['id']) { echo "selected"; } } ?>> <?php echo $datas['party_name']; ?> </option>
										    <?php } ?>
										</select>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('party_group'); ?> </label>
				                </div>
				                <div class="form-group col-md-3">
				                  	<label class="control-label"> Name <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php if(isset($name)){ echo $name; } ?>" disabled>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('name'); ?> </label>
				                </div>
				                <div class="form-group col-md-3">
				                  	<label class="control-label"> Mobile No.1 <label class="text-red">*</label> </label>
									<div>
		                    			<input type="phone" class="form-control" name="mobile_1" id="mobile_1" placeholder="Enter Mobile No.1" value="<?php if(isset($mobile_1)){ echo $mobile_1; } ?>" min=10 max=10 disabled>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('mobile_1'); ?> </label>
				                </div>
				                <div class="form-group col-md-3">
				                  	<label class="control-label"> Mobile No.2 </label>
									<div style="padding-top: 5px;">
		                    			<input type="phone" class="form-control" name="mobile_2" id="mobile_2" placeholder="Enter Mobile No.2" value="<?php if(isset($mobile_2)){ echo $mobile_2; } ?>" disabled>
		                    		</div>		
				                </div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-12">
				                	<label class="control-label"> Address <label class="text-red">*</label> </label>
									<div>
		                    			<textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter Address" disabled><?php if(isset($address)){ echo $address; } ?></textarea>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('address'); ?> </label>
				                </div>
				            </div> 
				            <div class="row col-md-12">        
				                <div class="form-group col-md-6">
				                	<label class="control-label"> Email </label>
									<div>
		                    			<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php if(isset($email)){ echo $email; } ?>" disabled>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('email'); ?> </label>
				                </div>
				                 <div class="form-group col-md-6">
				                	<label class="control-label"> Website </label>
									<div>
		                    			<input type="text" class="form-control" name="website" id="website" placeholder="Enter Website" value="<?php if(isset($website)){ echo $website; } ?>" disabled>
		                    		</div>		
				                </div>
				            </div> 
				            <div class="row col-md-12">
				            	<div class="form-group col-md-6">
				                	<label class="control-label"> PAN No. </label>
									<div>
		                    			<input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter PAN No." value="<?php if(isset($pan_no)){ echo $pan_no; } ?>" disabled>
		                    		</div>		
				                </div>
				                <div class="form-group col-md-6">
				                	<label class="control-label"> GST No. </label>
									<div>
		                    			<input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter GST No." value="<?php if(isset($gst_no)){ echo $gst_no; } ?>" disabled>
		                    		</div>		
				                </div>
				                <div class="form-group col-md-12">
				                	<label class="text-red"> <?php echo form_error('pan_no'); ?> </label>
				            	</div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-4">
				                  	<label class="control-label"> Old Password <label class="text-red">*</label></label>
									<div>
		                    			<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
		                    		</div>
		                    		<div class="confirm-div text-red"></div><br>	
		                    		<label class="text-red"> <?php echo form_error('old_password'); ?> </label>	
				                </div>
				            	<div class="form-group col-md-4">
				                  	<label class="control-label"> Password <label class="text-red">*</label></label>
									<div>
		                    			<input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password">
		                    		</div>	
		                    		<label class="text-red"> <?php echo form_error('password'); ?> </label>	
				                </div>
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Confirm Password <label class="text-red">*</label></label>
									<div>
		                    			<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" >
		                    		</div>
		                    		<label class="text-red"> <?php echo form_error('confirm_password'); ?> </label>			
				                </div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-6">
				                  	<label class="control-label"> Party Contact Person Name </label>
									<div>
		                    			<input type="text" class="form-control" name="content_person" id="content_person" placeholder="Enter Party contact person name" value="<?php if(isset($content_person)){ echo $content_person; } ?>" disabled>
		                    		</div>		
				                </div>
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Party Contact No.  </label>
									<div>
		                    			<input type="text" class="form-control" name="content_no" id="content_no" placeholder="Enter Party Contact No." value="<?php if(isset($content_no)){ echo $content_no; } ?>" disabled>  
		                    		</div>		
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