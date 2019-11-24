<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
			            <input type="hidden" id="update" name="update" value="<?php if(isset($company_id)) { echo $company_id; } ?>">
			            <div class="box-body">
				            <div class="row col-md-12">    
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Name <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php if(isset($name)) { echo $name; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('name'); ?> </label>
				                </div>
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Mobile No.1 <label class="text-red">*</label> </label>
									<div>
		                    			<input type="phone" class="form-control" name="mobile_1" id="mobile_1" placeholder="Enter Mobile No.1" value="<?php if(isset($mobile_1)) { echo $mobile_1; } ?>" min=10 max=10>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('mobile_1'); ?> </label>
				                </div>
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Mobile No.2 </label>
									<div style="padding-top: 5px;">
		                    			<input type="phone" class="form-control" name="mobile_2" id="mobile_2" placeholder="Enter Mobile No.2" value="<?php if(isset($mobile_2)) { echo $mobile_2; } ?>">
		                    		</div>		
				                </div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-12">
				                	<label class="control-label"> Address <label class="text-red">*</label> </label>
									<div>
		                    			<textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter Address"><?php if(isset($address)) { echo $address; } ?></textarea>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('address'); ?> </label>
				                </div>
				            </div> 
				            <div class="row col-md-12">        
				                <div class="form-group col-md-6">
				                	<label class="control-label"> Email <label class="text-red">*</label> </label>
									<div>
		                    			<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php if(isset($email)) { echo $email; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('email'); ?> </label>
				                </div>
				                 <div class="form-group col-md-6">
				                	<label class="control-label"> Website </label>
									<div style="padding-top: 5px;">
		                    			<input type="text" class="form-control" name="website" id="website" placeholder="Enter Website" value="<?php if(isset($website)) { echo $website; } ?>">
		                    		</div>		
				                </div>
				            </div> 
				            <div class="row col-md-12">
				            	<div class="form-group col-md-6">
				                	<label class="control-label"> PAN No. </label>
									<div>
		                    			<input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter PAN No." value="<?php if(isset($pan_no)) { echo $pan_no; } ?>">
		                    		</div>		
				                </div>
				                <div class="form-group col-md-6">
				                	<label class="control-label"> GST No. </label>
									<div>
		                    			<input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter GST No." value="<?php if(isset($gst_no)) { echo $gst_no; } ?>">
		                    		</div>		
				                </div>
				                <div class="form-group col-md-12">
				                	<label class="text-red"> <?php echo form_error('pan_no'); ?> </label>
				            	</div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-4">
				                  	<label class="control-label"> Licence No. 1 </label>
									<div>
		                    			<input type="text" class="form-control" name="lic1" id="lic1" placeholder="Enter Licence No. 1" value="<?php if(isset($lic1)) { echo $lic1; } ?>">
		                    		</div>		
				                </div>
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Licence No. 2  </label>
									<div>
		                    			<input type="text" class="form-control" name="lic2" id="lic2" placeholder="Enter Licence No. 2" value="<?php if(isset($lic2)) { echo $lic2; } ?>">
		                    		</div>		
				                </div>
				                <?php if(isset($old_image)) { ?>
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Logo  </label>
										<div align="center">
			                    			<img src="<?php echo base_url('files/images/logo/').$old_image; ?>" width='150'>
			                    		</div>		
					                </div>  
					            <div class="row col-md-12">	
					             	<div class="form-group col-md-4">
					                  	<label class="control-label"> Image </label>
										<div>
			                    			<input type="file" class="form-control" name="new_file" id="new_file" placeholder="Enter Image">
			                    		</div>		
			                    		<label class="text-red"> <?php if(isset($file_error)) { echo $file_error; } ?> </label>
					                </div>
					            </div> 
					            <?php } else { ?> 
					            	<div class="form-group col-md-4">
					                  	<label class="control-label"> Image </label>
										<div>
			                    			<input type="file" class="form-control" name="file" id="file" placeholder="Enter Image">
			                    		</div>		
			                    		<label class="text-red"> <?php if(isset($file_error)) { echo $file_error; } ?> </label>
					                </div> 
					            <?php } ?> 
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