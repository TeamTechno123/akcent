<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
    	<div class="row">
    		<div class="col-md-12">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-plus"></i> Add Machine Details </h3>
            		</div>
			        <div class="box-body table-responsive">
						<form action="" id="form_sub" method="POST" accept-charset="utf-8">
				            <div class="box-body">
					            <div class="row col-md-12">    
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Select Party Group <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<select class="form-control" id="party_group" name="party_group">
										        <option value="">Select</option>
										        <?php foreach ($PartyGroup as $datas) { ?>
										        	<option value="<?php echo $datas['id']; ?>" <?php if(isset($party_id)) { if($party_id == $datas['id']) { echo "selected"; } } ?>> <?php echo $datas['party_name']; ?> </option>
										        <?php } ?>
										    </select>
			                  			</div>
			                  			<span id="error_Party_Group" class="text-danger"><?php echo form_error('party_group'); ?></span>
					                </div>
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Party Name <label class="text-red">*</label> </label>	
			                  			<div id="update_AMC">
			                    			<select class="form-control" id="party_names" name="party_names">
												<option value="">Select</option>
												<?php if(isset($CheckParty)) {  foreach ($CheckParty as $k) { ?>
													<option value="<?php echo $k['id'] ?>" <?php if($k['id'] == $party_info_id){ echo "selected"; } ?>><?php echo $k['name']; ?></option>
												<?php } } ?>
										    </select>
			                  			</div>
			                  			<span id="error_party_names" class="text-danger"><?php echo form_error('party_names'); ?></span>
					                </div>
									<div class="form-group col-md-4">
					                  	<label class="control-label"> Select AMC Contract Ref No <label class="text-red">*</label> </label>	
			                  			<div id="update_AMC">
			                    			<select class="form-control" id="AMC_Ref_No" name="AMC_Ref_No">
												<option value="">Select</option>
												<?php if(isset($CheckAmcContract)) {  foreach ($CheckAmcContract as $v) { ?>
													<option value="<?php echo $v['contract_id']; ?>" <?php if($v['contract_id'] == $amc_contract_information_id){ echo "selected"; } ?>><?php echo $v['contract_ref_no']; ?></option>
												<?php } } ?>
										    </select>

			                  			</div>
			                  			<span id="error_AMC_Ref_No" class="text-danger"><?php echo form_error('AMC_Ref_No'); ?></span>
					                </div>  
					            </div>
					            <?php $j=1; ?>
					            <div id="app"> 
						            <?php if(isset($GetMachines)) { foreach($GetMachines as $Get) { if($j == 1) { ?>
						            	<div class="row col-md-12" id="row<?php echo $j; ?>">    
							                <input type="hidden" id="ID_<?php echo $j; ?>" name="ID_<?php echo $j; ?>" value="<?php echo $Get['amc_machine_id']; ?>">
							                <div class="form-group col-md-3">
							                	<label class="control-label"> Select Equipment Type <label class="text-red">*</label> </label>	
							                	<select class="form-control" id="equipment_type_1" name="equipment_type_1">
												   	<option value="">Select</option>
												    <?php foreach ($ItemGroup as $Equipment1) { ?>
												       	<option value="<?php echo $Equipment1['id']; ?>" <?php if($Get['item_group_id'] == $Equipment1['id']) { echo "selected"; } ?>> <?php echo $Equipment1['group_name']; ?> </option>
												    <?php } ?>
												</select>
												<span id="error_equipment_type_1" class="text-danger"><?php echo form_error('Equipment_type_1'); ?></span>
							                </div>
							                <div class="form-group col-md-3">
							                	<label class="control-label"> Select Company Name <label class="text-red">*</label> </label>	
							                	<div id="Update_com">
							                		<select class="form-control" id="company_name_1" name="company_name_1">
												   		<option value="">Select</option>
												   		<?php foreach ($ItemCompany as $ItemCompany1) { ?>
												       	<option value="<?php echo $ItemCompany1['id']; ?>" <?php if($Get['item_company_id'] == $ItemCompany1['id']) { echo "selected"; } ?>> <?php echo $ItemCompany1['item_company_info_name']; ?> </option>
												    <?php } ?>
													</select> 
							                	</div>
							                	<span id="error_company_name_1" class="text-danger"><?php echo form_error('company_name[]'); ?></span>
							                </div>
							                <div class="form-group col-md-2" style="padding-top: 5px;">
							                	<label class="control-label"> Model No </label>
							                	<input type="text" class="form-control" name="model_no_1" id="model_no_1" placeholder="Model No" value="<?php echo $Get['model_no']; ?>">	
							                </div>
							                <div class="form-group col-md-2" style="padding-top: 5px;">
							                	<label class="control-label"> Serial No </label>
							                	<input type="text" class="form-control" name="serial_no_1" id="serial_no_1" placeholder="Serial No" value="<?php echo $Get['serial_no']; ?>">	
							                </div>
							                <div class="form-group col-md-1" style="padding-top: 35px;">
							                	<input type="checkbox" class="checkbox" name="in_warranty_1" id="in_warranty_1" value="1" autocomplete="off" <?php if($Get['in_warrenty'] == 1) { echo "checked"; } ?>> In Warranty
							                </div>
							                <div class="form-group col-md-1" style="padding-top: 25px;">
							                	<input type="button" class="btn btn-primary add" name="add" id="add" value="Add More"> 
							                </div>
							            </div>
						            <?php $j++;} else { ?>
						            	<div class="row col-md-12" id="row<?php echo $j; ?>">    
							                <input type="hidden" id="ID_<?php echo $j; ?>" name="ID_<?php echo $j; ?>" value="<?php echo $Get['amc_machine_id']; ?>">
							                <div class="form-group col-md-3">
							                	<select class="form-control" id="equipment_type_<?php echo $j; ?>" name="equipment_type_<?php echo $j; ?>">
												   	<option value="">Select</option>
												    <?php foreach ($ItemGroup as $Equipment1) { ?>
												       	<option value="<?php echo $Equipment1['id']; ?>" <?php if($Get['item_group_id'] == $Equipment1['id']) { echo "selected"; } ?>> <?php echo $Equipment1['group_name']; ?> </option>
												    <?php } ?>
												</select>
												<span id="error_equipment_type_<?php echo $j; ?>" class="text-danger"><?php echo form_error('Equipment_type_1'); ?></span>
							                </div>
							                <div class="form-group col-md-3">
							                	<div id="Update_com">
							                		<select class="form-control" id="company_name_<?php echo $j; ?>" name="company_name_<?php echo $j; ?>">
												   		<option value="">Select</option>
												   		<?php foreach ($ItemCompany as $ItemCompany1) { ?>
												       	<option value="<?php echo $ItemCompany1['id']; ?>" <?php if($Get['item_company_id'] == $ItemCompany1['id']) { echo "selected"; } ?>> <?php echo $ItemCompany1['item_company_info_name']; ?> </option>
												    <?php } ?>
													</select> 
													<span id="error_equipment_type_<?php echo $j; ?>" class="text-danger"><?php echo form_error('Equipment_type_1'); ?></span>
							                	</div>
							                </div>
							                <div class="form-group col-md-2" >
							                	<input type="text" class="form-control" name="model_no_<?php echo $j; ?>" id="model_no_<?php echo $j; ?>" placeholder="Model No" value="<?php echo $Get['model_no']; ?>">	
							                </div>
							                <div class="form-group col-md-2" >
							                	<input type="text" class="form-control" name="serial_no_<?php echo $j; ?>" id="serial_no_<?php echo $j; ?>" placeholder="Serial No" value="<?php echo $Get['serial_no']; ?>">	
							                </div>
							                <div class="form-group col-md-1" >
							                	<input type="checkbox" class="checkbox" name="in_warranty_<?php echo $j; ?>" id="in_warranty_<?php echo $j; ?>" value="1" autocomplete="off" <?php if($Get['in_warrenty'] == 1) { echo "checked"; } ?>> In Warranty
							                </div>
							                <div class="form-group col-md-1" >
							                	<a href='#'><span id="<?php echo $j; ?>" class='glyphicon glyphicon-trash'></span></a>
							                </div>
							            </div>
						            <?php $j++;} } }else { ?>
							            <div class="row col-md-12" id="row1">    
							                <div class="form-group col-md-3">
							                	<label class="control-label"> Select Equipment Type <label class="text-red">*</label> </label>	
							                	<select class="form-control" id="equipment_type_1" name="equipment_type_1">
												   	<option value="">Select</option>
												    <?php foreach ($ItemGroup as $Equipment1) { ?>
												       	<option value="<?php echo $Equipment1['id']; ?>"> <?php echo $Equipment1['group_name']; ?> </option>
												    <?php } ?>
												</select>
												<span id="error_equipment_type_1" class="text-danger"><?php echo form_error('Equipment_type_1'); ?></span>
							                </div>
							                <div class="form-group col-md-3">
							                	<label class="control-label"> Select Company Name <label class="text-red">*</label> </label>	
							                	<div id="Update_com">
							                		<select class="form-control" id="company_name_1" name="company_name_1">
												   		<option value="">Select</option>
												   		<?php foreach ($ItemCompany as $ItemCompany1) { ?>
												       	<option value="<?php echo $ItemCompany1['id']; ?>"> <?php echo $ItemCompany1['item_company_info_name']; ?> </option>
												    <?php } ?>
													</select> 
							                	</div>
							                	<span id="error_company_name_1" class="text-danger"><?php echo form_error('company_name_1'); ?></span>
							                </div>
							                <div class="form-group col-md-2" style="padding-top: 5px;">
							                	<label class="control-label"> Model No </label>
							                	<input type="text" class="form-control" name="model_no_1" id="model_no_1" placeholder="Model No">	
							                </div>
							                <div class="form-group col-md-2" style="padding-top: 5px;">
							                	<label class="control-label"> Serial No </label>
							                	<input type="text" class="form-control" name="serial_no_1" id="serial_no_1" placeholder="Serial No">	
							                </div>
							                <div class="form-group col-md-1" style="padding-top: 35px;">
							                	<input type="checkbox" class="checkbox" name="in_warranty_1" id="in_warranty_1" value="1"> In Warranty
							                </div>
							                <div class="form-group col-md-1" style="padding-top: 25px;">
							                	<input type="button" class="btn btn-primary add" name="add" id="add" value="Add More"> 
							                </div>
							            </div>
							        <?php } ?>     
						        </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-12">	
										<div>
			                    			<input type="button" name="click_a" id="click_a" class="btn btn-primary" value="submit">
			                    		</div>		
					                </div>
					            </div>
					        </div>
					    </form>            
			        </div>
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
	          $("#party_names").html(result);
	        }
      	});

      	var partyGroup = $("#party_group").val();
      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/MachineDetails/CheckAmcContract',
	        type: "POST",
	        data: {"partyGroupId":partyGroup},
	        success: function (result) {
	          //
	          $("#AMC_Ref_No").html(result);
	        }
      	});
    });

    <?php if(isset($count)){ ?>
    var i = <?php echo $count+1; ?>
	<?php } else { ?>
	var i = 2;	
	<?php } ?>	

    $("#add").click(function(){
    	var listItem = "";

    	listItem += "<div class='row col-md-12' id='row"+i+"'>";
    	listItem += "<input type='hidden' id='ID_"+i+"' name='ID_"+i+"' value='0'>";
		listItem += "<div class='form-group col-md-3'>";
		listItem += "<select class='form-control' id='equipment_type_"+i+"' name='equipment_type_"+i+"'>";
						<?php foreach ($ItemGroup as $Equi) { ?>
							listItem += "<option value='<?php echo $Equi['id']; ?>'> <?php echo $Equi['group_name']; ?> </option>";
						<?php } ?>
		listItem += "</select>";
		listItem += "<span id='error_equipment_type_"+i+"' class='text-danger'></span>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-3'>";
		listItem += "<select class='form-control' id='company_name_"+i+"' name='company_name_"+i+"'>";
						<?php foreach ($ItemCompany as $ItemCompany) { ?>
							listItem += "<option value='<?php echo $ItemCompany['id']; ?>'> <?php echo $ItemCompany['item_company_info_name']; ?> </option>";
						<?php } ?>
		
		listItem += "</select>";
		listItem += "<span id='error_company_name_"+i+"' class='text-danger'></span>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-2'>";
		listItem += "<input type='text' class='form-control' name='model_no_"+i+"' id='model_no_"+i+"' placeholder='Model No'>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-2'>";
		listItem += "<input type='text' class='form-control' name='serial_no_"+i+"' id='serial_no_"+i+"' placeholder='Serial No'>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-1'>";
		listItem += "<input type='checkbox' class='checkbox' name='in_warranty_"+i+"' id='in_warranty_"+i+"'> In Warranty";
		listItem += "</div>";                
		listItem += "<div class='form-group col-md-1'>"; 
		listItem += "<a href='#'><span id='"+i+"' class='glyphicon glyphicon-trash'></span>";
		listItem += "</div>"; 				                
		listItem += "</div>";				                	
		i++;
    	if(listItem != ''){
            $("#app").append(listItem);
        }
    });


	$("#click_a").click(function(){
		var party_group = $("#party_group").val();
		var party_names = $("#party_names").val();
		var AMC_Ref_No = $("#AMC_Ref_No").val();

		if(party_group == '' || party_names == '' || AMC_Ref_No == ''){
    		if(party_group == ''){
    			$("#error_Party_Group").show();
    			$("#error_Party_Group").html('Party Group field is required.');
    		} else { $("#error_Party_Group").hide(); }

    		if(party_names == ''){
    			$("#error_party_names").show();
    			$("#error_party_names").html('Party Name Ref No field is required.');
    		} else { $("#error_party_names").hide(); }

    		if(AMC_Ref_No == ''){
    			$("#error_AMC_Ref_No").show();
    			$("#error_AMC_Ref_No").html('AMC Contract Ref No field is required.');
    		} else { $("#error_AMC_Ref_No").hide(); }

    	} else {
    		$("#error_Party_Group").hide();
    		$("#error_AMC_Ref_No").hide();
    		$("#error_party_names").hide();

    		var val = i-1; 
    		var is_error = false;

    		for(j=1; j<=val; j++)
	    	{
	    		var equipment_type = $("#equipment_type_"+j).val();
	    		var company_name = $("#company_name_"+j).val();
	    		var model_no = $("#model_no_"+j).val();
	    		var serial_no = $("#serial_no_"+j).val();
	    		var in_warranty = $("#in_warranty_"+j).val();

	    		if(equipment_type == '' || company_name == ''){
	    			
	    			if(equipment_type == ''){
	    				is_error = true;
	    				$("#error_equipment_type_"+j).show();
	    				$("#error_equipment_type_"+j).html('Equipment Type field is required.');
	    			} else { $("#error_equipment_type_"+j).hide(); }

	    			if(company_name == ''){
	    				is_error = true;
	    				$("#error_company_name_"+j).show();
	    				$("#error_company_name_"+j).html('Company Name field is required.');
	    			} else { $("#error_company_name_"+j).hide(); }
	    		}


	    	}

	    	if(is_error != true)
            {
            	var machine_data = [];
            	var Ids = [];

            	for (k=1; k<=val; k++) {

			            
			        if($("#in_warranty_"+k).prop("checked") == true){
			            var check = 1;    
			        }else{
			            var check = 0;   
			         }
			    

            		machine_data.push( {
						<?php if(isset($id)) { echo "id:".$id.","; } ?>
						<?php if(isset($id)) { ?>
							amc_machine_id: $("#ID_"+k).val(),
						<?php } ?>

						equipment_type: $("#equipment_type_"+k).val(),
						company_name: $("#company_name_"+k).val(),
						model_no: $("#model_no_"+k).val(),
						serial_no: $("#serial_no_"+k).val(),
						in_warranty: check,
					});

					<?php if(isset($id)) { ?>
						
						if($("#ID_"+k).val() == null){}else{
							Ids.push($("#ID_"+k).val());
						}
					<?php } ?>
            	}

            	<?php if(isset($id)){ ?>
            		
            		$.ajax({
						url: '<?php echo base_url(); ?>Admin/MachineDetails/UpMachine',
						type: "POST",
						data: {
							"id":<?php echo $id; ?>,
							"party_group":party_group,
							"party_names":party_names, 
							"AMC_Ref_No":AMC_Ref_No,  
							"machine_data": machine_data,
							"Ids": Ids,
						},
						success: function (result) {
							window.location.href = "<?php echo base_url().'Admin/MachineDetails'; ?>";
						}
					});

            	<?php } else { ?>
            	
            		$.ajax({
						url: '<?php echo base_url(); ?>Admin/MachineDetails/AddMachine',
						type: "POST",
						data: {
							"party_group":party_group,
							"party_names":party_names, 
							"AMC_Ref_No":AMC_Ref_No,  
							"machine_data": machine_data
						},
						success: function (result) {
							window.location.href = "<?php echo base_url().'Admin/MachineDetails'; ?>";
						}
					});

            	<?php } ?>
            }
    	}
	});


    $(document).on("click", ".glyphicon", function(event) {
    	var id = $(this).attr('id');
    	$('#row'+id).remove();
    });
</script>