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
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Party Group <label class="text-red">*</label> </label>
									<div>
										<select class="form-control" id="party_group" name="party_group">
											<option value="">Select</option>
			                    			<?php foreach ($PartyGroup as $key) { ?>
			                    				<option value="<?php echo $key['id']; ?>" <?php if(isset($party_id)) { if($party_id == $key['id']) { echo "selected"; } } ?>><?php echo $key['party_name']; ?></option>
			                    			<?php } ?>
			                    		</select>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('party_group'); ?> </label>
				                </div>
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Party Name  <label class="text-red">*</label> </label>
									<div>
										<select class="form-control" id="party_name" name="party_name">
											<option value="">Select</option>
											<?php if(isset($PartyName)) { foreach ($PartyName as $key) { ?>
												<option value="<?php echo $key['id']; ?>" <?php if($key['id'] == $party_info_id){ echo "selected"; } ?>><?php echo $key['name']; ?></option>
											<?php } } ?>
			                    		</select>
		                    		</div>
		                    		<label class="text-red"> <?php echo form_error('party_name'); ?> </label>		
				                </div>
				            </div>
				            <div class="row col-md-12">    
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Machine Serial No </label><label class="Machine pull-right" style="color: #f39c12 ;"><?php if(isset($model_no)){ echo $group_name."--".$model_no; } ?></label>
									<div>
										<input type="hidden" id="MachineSerialNo" name="MachineSerialNo" value="">
										<select class="form-control select2" id="machine_serial_no" name="machine_serial_no">
											<option value="">Select</option>
											<?php if(isset($MachineSerial)) { foreach ($MachineSerial as $key) { ?>
												<option value="<?php echo $key['amc_machine_id']; ?>" <?php if($key['amc_machine_id'] == $amc_machine_id){ echo "selected"; } ?>><?php echo $key['serial_no']." (".$key['item_company_info_name']."-".$key['model_no'].")"; ?></option>
											<?php } } ?>
			                    		</select>
		                    		</div>		
				                </div>
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Equipment Type </label><label class="pull-right" id="InWarrenty" style="color: green ;"><?php if(isset($in_warrenty)){ if($in_warrenty == 1) { echo "In Warrenty"; } } ?></label>
									<div>
										<input type="hidden" id="item_groups" name="item_groups" value="<?php if(isset($item_info_id)) { echo $item_info_id; } ?>">
										<select class="form-control" id="item_group" name="item_group" <?php if(isset($model_no)){ echo "disabled"; } ?>>
											<option value="">Select</option>
											<?php if(isset($ItemGroup)) { foreach ($ItemGroup as $key) { ?>
												<option value="<?php echo $key['id']; ?>" <?php if(isset($item_info_id)) { if(!empty($item_info_id)) { if($key['id'] == $item_info_id){ echo "selected"; } } } ?>><?php echo $key['group_name']; ?></option>
											<?php } } ?>
			                    		</select>
		                    		</div>		
				                </div>
				            </div>
							<div class="row col-md-12">  
				            	<div class="form-group col-md-12">
				                	<label class="control-label"> Problem Information <label class="text-red">*</label> </label>	
		                  			<div>
		                  				<textarea class="form-control" rows="3" id="problem_information" name="problem_information" placeholder="Enter Problem Information"><?php if(isset($problem_information)) { echo $problem_information; }  ?></textarea>
		                  			</div>
		                  			<label class="text-red"> <?php echo form_error('problem_information'); ?> </label>
				                </div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-3">
				                  	<label class="control-label"> Create Date <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="create_date" id="create_date" value="<?php if(isset($create_date)){ echo $create_date; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('create_date'); ?> </label>
		                    	</div>
		                    	<div class="form-group col-md-3">
				                  	<label class="control-label"> Create Time <label class="text-red">*</label> </label>
									<div>
		                    			<input type="time" class="form-control create_time" name="create_time" id="create_time" value="<?php if(isset($create_time)){ echo $create_time; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('create_time'); ?> </label>
		                    	</div>
		                    	<div class="form-group col-md-3">
				                  	<label class="control-label"> Contact Person Name <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="content_name" id="content_name" value="<?php if(isset($content_name)){ echo $content_name; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('content_name'); ?> </label>
		                    	</div>
		                    	<div class="form-group col-md-3">
				                  	<label class="control-label"> Contact Number <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="content_no" id="content_no" value="<?php if(isset($content_no)){ echo $content_no; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('content_no'); ?> </label>
		                    	</div>
				            </div> 
				            <div class="row col-md-12">  
				            	<div class="form-group col-md-12">
				                	<label class="control-label"> Additional Note </label>	
		                  			<div>
		                  				<textarea class="form-control" rows="3" id="additional_note" name="additional_note" placeholder="Enter Additional Note"><?php if(isset($additional_note)) { echo $additional_note; }  ?></textarea>
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
<script src="<?php echo base_url('files/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('files/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<script type="text/javascript">
	$('#create_date').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    })

	<?php if(!isset($model_no)){ ?>
		$(".Machine").html(""); 
	<?php } ?>

	$("#party_group").change(function(){
    	var partyGroup = $("#party_group").val();
      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/TicketInfo/CheckParty',
	        type: "POST",
	        data: {"partyGroupId":partyGroup},
	        success: function (result) {
	          $("#party_name").html(result);
	          $(".Machine").html("");
	        }
      	});
    });

	$("#party_name").change(function(){
		var partyGroup = $("#party_group").val();
		var partyName = $("#party_name").val();

		$.ajax({
	        url: '<?php echo base_url(); ?>Admin/TicketInfo/CheckMachineSerial',
	        type: "POST",
	        data: {"partyGroupId":partyGroup, "partyName":partyName },
	        success: function (result) {
	        	$("#machine_serial_no").html(result);
	        }
      	});
	});

    $("#machine_serial_no").change(function(){
    	var id = $(this).val();
   
    	var name = $("#machine_serial_no option:selected").text();
    	$("#MachineSerialNo").val(name);

    	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/TicketInfo/CheckMachineDetails',
	        type: "POST",
	        data: {"id":id},
	        success: function (result) {
	        		
	        	if(result == ''){
	        		$(".Machine").html("");
	        		$("#InWarrenty").html("");	
	        		$("#item_group").removeAttr('disabled');
					$("#item_group option:selected").remove();
	        	} else {

		        	var result = $.parseJSON(result);
		        	$(".Machine").html(result.item_name);
		        	$("#item_groups").val(result.input_data);
		        	$("#InWarrenty").html(result.in_warrenty);	

		        	$("#item_group").html(result.select);
	      			$("#item_group").attr('disabled', 'disabled');
	      		}
	        }
      	});     	
    });
      	
</script>