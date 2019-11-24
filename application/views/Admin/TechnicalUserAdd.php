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
			            <div class="box-body">
				            <div class="row col-md-12">    
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Party Group <label class="text-red">*</label> </label>
									<div>
										<select class="form-control" id="party_group" name="party_group">
											<option value="">Select</option>
			                    			<?php foreach ($partyGroup as $key) { ?>
			                    				<option value="<?php echo $key['id']; ?>" <?php if(isset($party_id)) { if($party_id == $key['id']) { echo "selected"; } } ?>><?php echo $key['party_name']; ?></option>
			                    			<?php } ?>
			                    		</select>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('party_group'); ?> </label>
				                </div>
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Party Name <label class="text-red">*</label> </label>
									<div>
										<select class="form-control" id="party_name" name="party_name">
											<option value="">Select</option>
											<?php if(isset($PartyInfo)) { foreach ($PartyInfo as $key) { ?>
												<option value="<?php echo $key['id']; ?>" <?php if($key['id'] == $party_info_id){ echo "selected"; } ?>><?php echo $key['name']; ?></option>
											<?php } } ?>
			                    		</select>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('party_name'); ?> </label>
				                </div>
				                <div class="form-group col-md-4">
				                  	<label class="control-label"> Name </label>
									<div style="padding-top: 5px">
		                    			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php if(isset($name)){ echo $name; } ?>">
		                    		</div>		
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
				            	<div class="form-group col-md-4">
				                  	<label class="control-label"> Mobile No <label class="text-red">*</label> </label>
									<div>
		                    			<input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No" value="<?php if(isset($mobile_no)){ echo $mobile_no; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('mobile_no'); ?> </label>
				                </div>
				            	<div class="form-group col-md-4">
				            	 	<?php if(isset($id)){ ?>
				            	 		<label class="control-label"> New Password <label class="text-red">*</label> </label>
										<div>
			                    			<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
			                    		</div>
				            	 	<?php } else { ?>
					            	 	<label class="control-label"> Password <label class="text-red">*</label> </label>
										<div>
			                    			<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
			                    		</div>		
			                    		<label class="text-red"> <?php echo form_error('password'); ?> </label>
			                    	<?php } ?>
		                    	</div>
								<div class="form-group col-md-4">
				                	<label class="control-label"> Status <label class="text-red">*</label> </label>
									<select class="form-control" id="status" name="status">
									 	<option value="">Select</option>
										    <option value="1" <?php if(isset($status)) { if($status == 1) { echo "selected"; } } ?>> Active </option>
										    <option value="0" <?php if(isset($status)) { if($status == 0) { echo "selected"; } } ?>> Deactive </option>
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
<script type="text/javascript">
	$("#party_group").change(function(){
    	var partyGroup = $("#party_group").val();
      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/MachineDetails/CheckParty',
	        type: "POST",
	        data: {"partyGroupId":partyGroup},
	        success: function (result) {
	          //
	          $("#party_name").html(result);
	        }
      	});
    });

    
</script>