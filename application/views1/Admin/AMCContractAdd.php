<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
        	<li><?php echo $this->session->userdata('submenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
     	<div class="row">
     		<div class="col-md-12">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-user-plus"></i> <?php echo $this->session->userdata('submenu'); ?></h3>
            		</div>
			        <form action="" method="POST" accept-charset="utf-8">
			            <div class="box-body">
				            <div class="row col-md-12">    
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> AMC Contract Ref No <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="AMC_Ref_No" id="AMC_Ref_No" placeholder="AMC Contract Ref No" value="<?php if(isset($id)) { echo $AMC_contract_ref_no; } if(isset($GetNo)) { echo 'AMC'.$GetNo; } ?>" readonly>
		                    		</div>		
				                </div>
				                <div class="form-group col-md-6">
				                	<label class="control-label"> AMC Contaract Date <label class="text-red">*</label> </label>	
		                  			<div>
		                    			<input type="tetx" class="form-control" name="contaract_date" id="contaract_date" placeholder="AMC Contaract Date" value="<?php if(isset($id)) { echo $contract_date; } else { echo date('d-m-Y'); } ?>" readonly>
		                  			</div>
				                </div>
				            </div>  
				            <div class="row col-md-12">
				                <div class="form-group col-md-6">
				                	<label class="control-label"> Select Party Group <label class="text-red">*</label> </label>	
		                  			<div>
		                    			<select class="form-control" id="Party_Group" name="Party_Group">
									        <option value="">Select</option>
											<?php if(isset($PartyGroup)) { foreach ($PartyGroup as $PartyGroup) { ?>
											    <option value="<?php echo $PartyGroup['id']; ?>" <?php if(isset($party_id)) { if($party_id == $PartyGroup['id']) { echo "selected"; } } ?> ><?php echo $PartyGroup['party_name']; ?></option>
											<?php } } ?>
									    </select>
		                  			</div>
		                  			<label class="text-red" id="error_Party_Group"> <?php echo form_error('Party_Group'); ?> </label>
				                </div>
				                <div class="form-group col-md-6">
				                	<label class="control-label"> Select AMC Type <label class="text-red">*</label> </label>	
		                  			<div>
		                    			<select class="form-control" id="type" name="type">
									        <option value="">Select</option>
										<?php if(isset($AMCType)) { foreach ($AMCType as $AMCType) { ?>
										    <option value="<?php echo $AMCType['id']; ?>" <?php if(isset($type)) { if($type == $AMCType['id']) { echo "selected"; } } ?> ><?php echo $AMCType['amc_type']; ?></option>
										<?php } } ?>
									    </select>
		                  			</div>
		                  			<label class="text-red" id="error_type"> <?php echo form_error('type'); ?> </label>
				                </div>
				            </div>  
				        </div> 
				        <div class="row col-md-12">
				        	<div class="form-group col-md-4">
				        		<label class="control-label"> AMC Start Date <label class="text-red">*</label> </label>	
		                  		<div>
		                    		<input type="text" class="form-control" name="start_date" id="start_date" value="<?php if(isset($start_date)){ echo $start_date; } ?>">
		                  		</div>
		                  		<label class="text-red" id="error_datepicker"> <?php echo form_error('start_date'); ?> </label>	
				        	</div>
				        	<div class="form-group col-md-4">
				        		<label class="control-label"> AMC End Date <label class="text-red">*</label> </label>	
		                  		<div>
		                    		<input type="text" class="form-control" name="end_date" id="end_date" value="<?php if(isset($end_date)){ echo $end_date; } ?>">
		                  		</div>
		                  		<label class="text-red" id="error_datepicker"> <?php echo form_error('end_date'); ?> </label>
				        	</div>
				        	<div class="form-group col-md-4">
				        		<label class="control-label"> Contract Ref No </label>	
		                  		<div>
		                    		<input type="text" class="form-control" name="Ref_No" id="Ref_No" placeholder="Contract Ref No" value="<?php if(isset($contract_ref_no)){ echo $contract_ref_no; } ?>">
		                  		</div>
				        	</div>
				        </div>
				        <div class="box-footer">
				            <button type="submit" id="submit" class="btn btn-primary pull-right">Submit</button>
				        </div>    
			        </form>			       
          		</div>
     		</div>
     	</div>	
    </section>
</div> 
<script src="<?php echo base_url('files/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript">
	$('#start_date').datepicker({
		format: 'dd-mm-yyyy',
	    autoclose: true
	});
	$('#end_date').datepicker({
		format: 'dd-mm-yyyy',
	    autoclose: true
	});
</script>
