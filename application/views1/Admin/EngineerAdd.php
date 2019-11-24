<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-briefcase"></i> <?php echo $this->session->userdata('submenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-briefcase"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
        	<li><?php echo $this->session->userdata('submenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
     	<div class="row">
     		<div class="col-md-12">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-plus"></i> <?php echo $this->session->userdata('submenu'); ?></h3>
            		</div>
			        <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			            <div class="box-body">
				            <div class="row col-md-12">    
				                <div class="form-group col-md-7">
				                  	<label class="control-label"> Name <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php if(isset($name)){ echo $name; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('name'); ?> </label>
				                </div>
				                <div class="form-group col-md-5">
				                  	<label class="control-label"> Mobile No <label class="text-red">*</label> </label>
									<div>
		                    			<input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No" value="<?php if(isset($mobile_no)){ echo $mobile_no; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('mobile_no'); ?> </label>
				                </div>
				            </div>
							<div class="row col-md-12">  
				            	<div class="form-group col-md-12">
				                	<label class="control-label"> Address <label class="text-red"></label> </label>	
		                  			<div>
		                  				<textarea class="form-control" rows="3" id="address" onkeyup="home()" name="address" placeholder="Enter Address"><?php if(isset($address)) { echo $address; }  ?></textarea>
		                  			</div>
				                </div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-3">
				            	 	<?php if(isset($id)){ ?>
				            	 		<label class="control-label"> New Password <label class="text-red">*</label> </label>
										<div>
			                    			<input type="text" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
			                    		</div>
				            	 	<?php } else { ?>
					            	 	<label class="control-label"> Password <label class="text-red">*</label> </label>
										<div>
			                    			<input type="text" class="form-control" name="password" id="password" placeholder="Enter Password">
			                    		</div>		
			                    		<label class="text-red"> <?php echo form_error('password'); ?> </label>
			                    	<?php } ?>
		                    	</div>
		                    	<div class="form-group col-md-3">
				                	<label class="control-label"> Salary Type <label class="text-red">*</label> </label>
									<select class="form-control" id="salary_type" name="salary_type">
									 	<option value="">Select</option>
										    <option value="Monthly basis" <?php if($salary_type == 'Monthly basis') { echo "selected"; } ?>> Monthly basis </option>
										    <option value="Daily basis" <?php if($salary_type == 'Daily basis') { echo "selected"; } ?>> Daily basis </option>
									</select>
		                    		<label class="text-red"> <?php echo form_error('salary_type'); ?> </label>
				                </div>
				                <div class="form-group col-md-3">
				                  	<label class="control-label"> Salary <label class="text-red">*</label> </label>
									<div>
		                    			<input type="number" class="form-control" name="salary" id="salary" placeholder="Enter Salary" value="<?php if(isset($salary)){ echo $salary; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('salary'); ?> </label>
				                </div>
								<div class="form-group col-md-3">
				                	<label class="control-label"> Status <label class="text-red">*</label> </label>
									<select class="form-control" id="status" name="status">
									 	<option value="">Select</option>
										    <option value="1" <?php if($status == 1) { echo "selected"; } ?>> Active </option>
										    <option value="0" <?php if($status == 0) { echo "selected"; } ?>> Deactive </option>
									</select>
		                    		<label class="text-red"> <?php echo form_error('status'); ?> </label>
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