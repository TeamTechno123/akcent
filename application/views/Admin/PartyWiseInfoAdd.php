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
              			<h3 class="box-title"><i class="fa fa-plus"></i> Add Party Wise Info </h3>
            		</div>
			        <div class="box-body table-responsive">
						<form action="" method="POST" accept-charset="utf-8">
				            <div class="box-body">

					            <input type="hidden" name="party_id_h" id="party_id_h" value="<?php echo $GetData[0]['party_id']; ?>">
					            <input type="hidden" name="amc_contract_h" id="amc_contract_h" value="<?php echo $GetData[0]['amc_contract_info_id']; ?>">

					            <div class="row col-md-12">    
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Select Party Group <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<select class="form-control" id="party_group" name="party_group">
										        <option value="">Select</option>
										        <?php foreach ($PartyGroup as $datas) { ?>
										        	<option value="<?php echo $datas['id']; ?>" <?php if(isset($GetData)) { if($GetData[0]['party_id'] == $datas['id']) { echo "selected"; } } ?>> <?php echo $datas['party_name']; ?> </option>
										        <?php } ?>
										    </select>
			                  			</div>
			                  			<span id="error_party_group" class="text-danger"></span>
					                </div>
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Party Name </label>	
			                  			<div id="update_AMC" style="padding-top: 5px">
			                    			<select class="form-control" id="party_names" name="party_names">
												<option value="">Select</option>
												<?php if(isset($CheckParty)) {  foreach ($CheckParty as $k) { ?>
													<option value="<?php echo $k['id'] ?>" <?php if($k['id'] == $GetData[0]['party_info_id']){ echo "selected"; } ?>><?php echo $k['name']; ?></option>
												<?php } } ?>
										    </select>
			                  			</div>
			                  			<span id="error_party_names" class="text-danger"></span>
					                </div>
									<div class="form-group col-md-4">
					                  	<label class="control-label"> Select AMC Contract Ref No <label class="text-red">*</label> </label>	
			                  			<div id="update_AMC">
			                    			<select class="form-control" id="AMC_Ref_No" name="AMC_Ref_No">
												<option value="">Select</option>
												<?php if(isset($CheckAmcContract)) {  foreach ($CheckAmcContract as $v) { ?>
													<option value="<?php echo $v['contract_id']; ?>" <?php if($v['contract_id'] == $GetData[0]['amc_contract_info_id']){ echo "selected"; } ?>><?php echo $v['contract_ref_no']; ?></option>
												<?php } } ?>
										    </select>

			                  			</div>
			                  			<span id="error_AMC_Ref_No" class="text-danger"></span>
					                </div>  
					            </div>
					            <?php $j=1; ?>
					            <div id="app"> 
						            <?php if(isset($GetData)) { foreach($GetData as $Get) { if($j == 1) { ?>
						            	<div class="row col-md-12" id="row<?php echo $j; ?>">    
							                <input type="hidden" id="ID_<?php echo $j; ?>" name="ID_<?php echo $j; ?>" value="<?php echo $Get['id']; ?>">
							                <div class="form-group col-md-4">
							                	<label class="control-label"> Select Equipment Type <label class="text-red">*</label> </label>	
							                	<select class="form-control" id="Equipment_type<?php echo $j; ?>" name="Equipment_type<?php echo $j; ?>">
												   	<option value="">Select</option>
												    <?php foreach ($ItemGroup as $Equipment1) { ?>
												       	<option value="<?php echo $Equipment1['id']; ?>" <?php if($Get['amc_machine_id'] == $Equipment1['id']) { echo "selected"; } ?>> <?php echo $Equipment1['item_name']; ?> </option>
												    <?php } ?>
												</select>
												<span id="error_Equipment_type" class="text-danger"><?php echo form_error('Equipment_type[]'); ?></span>
							                </div>
							                <div class="form-group col-md-4">
							                	<label class="control-label"> Rate <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="rate<?php echo $j; ?>" id="rate<?php echo $j; ?>" placeholder="Enter rate" value="<?php echo $Get['rate']; ?>">	
							                	<span id="error_Equipment_type" class="text-danger"><?php echo form_error('rate[]'); ?></span>
							                </div>
							                <div class="form-group col-md-3" style="padding-top: 35px;">
							                	<input type="checkbox" name="in_warranty<?php echo $j; ?>" id="in_warranty<?php echo $j; ?>" value="1" autocomplete="off" <?php if($Get['required'] == 1) { echo "checked"; } ?>> This Item Required Approval
							                </div>
							                <div class="form-group col-md-1" style="padding-top: 25px;">
							                	<input type="button" class="btn btn-primary add" name="add" id="add" value="Add More"> 
							                </div>
							            </div>
						            	<?php $j++;} else { ?>
						            	<div class="row col-md-12" id="row<?php echo $j; ?>">    
							                <input type="hidden" id="ID_<?php echo $j; ?>" name="ID_<?php echo $j; ?>" value="<?php echo $Get['id']; ?>">
							                <div class="form-group col-md-4">
							                	<select class="form-control" id="Equipment_type<?php echo $j; ?>" name="Equipment_type<?php echo $j; ?>">
												   	<option value="">Select</option>
												    <?php foreach ($ItemGroup as $Equipment2) { ?>
												       	<option value="<?php echo $Equipment2['id']; ?>" <?php if($Get['amc_machine_id'] == $Equipment2['id']) { echo "selected"; } ?>> <?php echo $Equipment2['item_name']; ?> </option>
												    <?php } ?>
												</select>
							                </div>
							                <div class="form-group col-md-4" >
							                	<input type="text" class="form-control" name="rate<?php echo $j; ?>" id="rate<?php echo $j; ?>" placeholder="Enter Rate" value="<?php echo $Get['rate']; ?>">	
							                </div>
							                <div class="form-group col-md-3" >
							                	<input type="checkbox" name="in_warranty<?php echo $j; ?>" id="in_warranty<?php echo $j; ?>" value="1" autocomplete="off" <?php if($Get['required'] == 1) { echo "checked"; } ?>> This Item Required Approval
							                </div>
							                <div class="form-group col-md-1" >
							                	<a href='#'><span id="<?php echo $j; ?>" class='glyphicon glyphicon-trash'></span></a>
							                </div>
							            </div>
						            <?php $j++;} } }else { ?>
							            <div class="row col-md-12" id="row1">    
							                <div class="form-group col-md-4">
							                	<label class="control-label"> Select Item <label class="text-red">*</label> </label>	
							                	<select class="form-control" id="Equipment_type1" name="Equipment_type1">
												   	<option value="">Select</option>
												    <?php if(isset($ItemGroup)) { foreach ($ItemGroup as $Equipment1) { ?>
												       	<option value="<?php echo $Equipment1['id']; ?>"> <?php echo $Equipment1['item_name']; ?> </option>
												    <?php } } ?>
												</select>
												<span class="text-danger error" id="error_equipment_type1"></span>
							                </div>
							                <div class="form-group col-md-4">
							                	<label class="control-label"> Rate <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="rate1" id="rate1" placeholder="Enter rate">	
							                	<span class="text-danger error" id="error_rate1"></span>
							                </div>
							                <div class="form-group col-md-3" style="padding-top: 35px;">
							                	<input type="checkbox" name="in_warranty1" id="in_warranty1" value="1" autocomplete="off"> This Item Required Approval
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
			                    			<input type="button" name="submit" id="submit" class="btn btn-primary" value="submit">
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
	        url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/CheckParty',
	        type: "POST",
	        data: {"partyGroupId":partyGroup},
	        success: function (result) {
	          $("#party_names").html(result);
	        }
      	});

      	var partyGroup = $("#party_group").val();
      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/CheckAmcContract',
	        type: "POST",
	        data: {"partyGroupId":partyGroup},
	        success: function (result) {
	          $("#AMC_Ref_No").html(result);
	        }
      	});

      	/*var partyGroup = $("#party_group").val();
      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/CheckItemGroup',
	        type: "POST",
	        data: {"ItemGroup":partyGroup},
	        success: function (result) {
	         	console.log(result);
	          $(".Equipment_type").html(result);
	        }
      	});*/
      	
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
		listItem += "<div class='form-group col-md-4'>";
		listItem += "<select class='form-control' id='Equipment_type"+i+"' name='Equipment_type"+i+"'>";
		listItem += "<option value=''> Select </option>";
						<?php foreach ($ItemGroup as $Equi) { ?>
							listItem += "<option value='<?php echo $Equi['id']; ?>'> <?php echo $Equi['item_name']; ?> </option>";
						<?php } ?>
		listItem += "</select>";
		listItem += "<span class='text-danger error' id='error_equipment_type"+i+"'></span>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-4'>";
		listItem += "<input type='number' class='form-control' name='rate"+i+"' id='rate"+i+"' placeholder='Enter Rate'>";
		listItem += "<span class='text-danger error' id='error_rate"+i+"'></span>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-3'>";
		listItem += "<input type='checkbox' name='in_warranty"+i+"' id='in_warranty"+i+"' value='1' autocomplete='off'> This Item Required Approval";
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

    $(document).on("click", "#submit", function(event) {
    	var party_group = $("#party_group").val();
    	var party_names = $("#party_names").val();
		var AMC_Ref_No = $("#AMC_Ref_No").val();
    	
    	if(party_group == '' || AMC_Ref_No == ''){
    		if(party_group == ''){
    			$("#error_party_group").show();
    			$("#error_party_group").html('Party Group field is required.');
    		} else { $("#error_party_group").hide(); }

    		if(AMC_Ref_No == ''){
    			$("#error_AMC_Ref_No").show();
    			$("#error_AMC_Ref_No").html('AMC Contract Ref No field is required.');
    		} else { $("#error_AMC_Ref_No").hide(); }
    	} else {
    		$("#error_party_group").hide();
    		$("#error_AMC_Ref_No").hide();

    		for(j=1; j<=i; j++)
	    	{
	    		var Equipment_type = $("#Equipment_type"+j).val();
	    		var rate = $("#rate"+j).val();

	    		if(Equipment_type == '' || rate == ''){
	    			if(Equipment_type == ''){
	    				$("#error_equipment_type"+j).show();
	    				$("#error_equipment_type"+j).html('Equipment Type field is required.');
	    			} else { $("#error_equipment_type"+j).hide(); field1 = "1";}

	    			if(rate == ''){
	    				$("#error_rate"+j).show();
	    				$("#error_rate"+j).html('Rate field is required.');
	    			} else { $("#error_rate"+j).hide(); field2 = "1";}
	    		} else {
	    			$("#error_equipment_type"+j).hide();
	    			$("#error_rate"+j).hide();
	    		}
	    	}

	    	if($(".error").is(":visible")){  
            }else {
	    		$.ajax({
					url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/CheckPartyWiseInfo',
					type: "POST",
					data: {"party_group":party_group, "AMC_Ref_No":AMC_Ref_No},
					    success: function (result) {

					   	if(result !== ''){
			    			$("#error_AMC_Ref_No").show();
			    			$("#error_AMC_Ref_No").html('AMC Contract Ref No field is already exists.');
					   	} else {
					   		$("#error_AMC_Ref_No").hide();

					   		var datas = [];
					   		var Ids = [];
					   		var set = i-1;
				            
				            <?php if(isset($GetData)){ ?>

					            for(var k=1; k<=set; k++)
					            {
									var in_warranty;
					                
					                if($("input[id='in_warranty"+k+"']").prop("checked"))
					                {
					                    in_warranty = 1;
					                }else {
					                	in_warranty = 0;
					                }
	 
					                if($("#Equipment_type"+k).val() != null || $("#rate"+k).val() != null){
					                	datas.push( {
										  	id: $("#ID_"+k).val(),
										  	party_id: party_group,
										 	party_info_id: party_names,
										  	amc_contract_info_id: AMC_Ref_No,
										  	amc_machine_id: $("#Equipment_type"+k).val(),
										  	rate: $("#rate"+k).val(),
										  	required: in_warranty,
										});
										
										if($("#ID_"+k).val() == "0"){}else{
											Ids.push($("#ID_"+k).val());
										}

					                }
				            	}

					            var party_id_h = $("#party_id_h").val();
					            var amc_contract_h = $("#amc_contract_h").val();
					            
								$.ajax({
									url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/PartyWiseInfoDataUP',
									type: "POST",
									data: {
										"party_group": party_id_h,
										"AMC_Ref_No": amc_contract_h,
										"datas":datas,
										"Ids": Ids,
									},
									success: function (result) {
										window.location.href = "<?php echo base_url().'Admin/PartyWiseInfo'; ?>";
									}
								});

				            <?php } else { ?>
				            	
				            	var datas = [];
						   		var set = i-1;
					            
					            for(var k=1; k<=set; k++)
					            {
									var in_warranty;
					                
					                if($("input[id='in_warranty"+k+"']").prop("checked"))
					                {
					                    in_warranty = 1;
					                }else {
					                	in_warranty = 0;
					                }
     
					                if($("#Equipment_type"+k).val() != null || $("#rate"+k).val() != null){
					                	datas.push( {
										  	party_id: party_group,
										 	party_info_id: party_names,
										  	amc_contract_info_id: AMC_Ref_No,
										  	amc_machine_id: $("#Equipment_type"+k).val(),
										  	rate: $("#rate"+k).val(),
										  	required: in_warranty,
										}); 
					                } 
				            	}
				            	
				            		$.ajax({
										url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/PartyWiseInfoData',
										type: "POST",
										data: {"datas":datas},
										success: function (result) {
											if(result == ''){
												window.location.href = "<?php echo base_url().'Admin/PartyWiseInfo'; ?>";
											} else {
												$("#error_AMC_Ref_No").show();
		    									$("#error_AMC_Ref_No").html(result);
											}
										}
									});
							<?php } ?>
					   	}
					}
				});
	    	}
    	}
    });

    $(document).on("click", ".glyphicon", function(event) {
    	var id = $(this).attr('id');
    	$('#row'+id).remove();
    });
</script>