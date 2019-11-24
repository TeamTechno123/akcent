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
              			<h3 class="box-title"><i class="fa fa-plus"></i> Add Sale Invoice </h3>
            		</div>
			        <div class="box-body table-responsive">
						<form action="" method="POST" accept-charset="utf-8">
				            <div class="box-body">
					            <div class="row col-md-12">
					            	<div class="form-group col-md-6">
					                 	<label class="control-label"> Salle Bill No <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<input type="text" class="form-control" name="bill_no" id="bill_no" placeholder="AMC Contract Ref No" value="<?php if(isset($id)) { echo $AMC_contract_ref_no; } if(isset($BillNo)) { echo $BillNo; } if(isset($old_bill_no)) { echo $old_bill_no; }  ?>" readonly>
			                  			</div>
					                </div>
					                <?php if(isset($date)) { ?>
					                <div class="form-group col-md-6">
										<label class="control-label"> Date <label class="text-red">*</label> </label>	
										<div>
			                    			<input type="text" class="form-control" name="date" id="date" value="<?php echo $date; ?>">
			                  			</div>
									</div>	
					                <?php } else { ?>
									<div class="form-group col-md-6">
										<label class="control-label"> Date <label class="text-red">*</label> </label>	
										<div>
			                    			<input type="text" class="form-control" name="date" id="date">
			                  			</div>
									</div>
								<?php } ?>
					            </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-6">
					                  	<label class="control-label"> Select Party Group <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<select class="form-control" id="party_group" name="party_group">
										        <option value="">Select</option>
										        <?php foreach ($PartyGroup as $datas) { ?>
										        	<option value="<?php echo $datas['id']; ?>" <?php if(isset($party_id)) { if($party_id == $datas['id']) { echo "selected"; } } ?>> <?php echo $datas['party_name']; ?> </option>
										        <?php } ?>
										    </select>
			                  			</div>
			                  			<span id="error_party_group" class="text-danger"></span>
					                </div>
					                <div class="form-group col-md-6">
					                  	<label class="control-label"> Party Name </label>	
			                  			<div id="update_AMC" style="padding-top: 5px">
			                    			<select class="form-control" id="party_names" name="party_names">
												<option value="">Select</option>
												<?php if(isset($CheckParty)) {  foreach ($CheckParty as $k) { ?>
													<option value="<?php echo $k['id'] ?>" <?php if($k['id'] == $party_info_id){ echo "selected"; } ?>><?php echo $k['name']; ?></option>
												<?php } } ?>
										    </select>
			                  			</div>
			                  			<span id="error_party_names" class="text-danger"></span>
					                </div>
					            </div>
								<div class="row col-md-12"> 	
									<div class="form-group col-md-6">
					                  	<input type="hidden" name="MachineSerialNo" id="MachineSerialNo" value="">
					                  	<label class="control-label"> Machine Serial No </label>
										<div>
											<select class="form-control select2" multiple="multiple" id="machine_serial_no" name="machine_serial_no">
												<?php if(isset($machine_serial_no)) { foreach ($machine_serial_no as $key) { ?>
													<option value="<?php echo $key['amc_machine_id']; ?>" 
														<?php if(isset($datas)) { 
										        			foreach ($MachineSerial as $k) {
										        				if($k == $key['amc_machine_id']) { echo "selected"; }
										        			}
										        		} ?> 
										        		><?php echo $key['serial_no']; ?></option>
												<?php } } ?>
				                    		</select>
			                    		</div>
			                    	</div>		
									<div class="form-group col-md-6">
					                  	<label class="control-label"> Select AMC Contract Ref No <label class="text-red">*</label> </label>	
			                  			<div id="update_AMC">
			                    			<select class="form-control" id="AMC_Ref_No" name="AMC_Ref_No">
												<option value="">Select</option>
												<?php if(isset($CheckAmcContract)) {  foreach ($CheckAmcContract as $v) { ?>
													<option value="<?php echo $v['contract_id']; ?>" <?php if($v['contract_id'] == $amc_contract_info){ echo "selected"; } ?>><?php echo $v['contract_ref_no']; ?></option>
												<?php } } ?>
										    </select>
			                  			</div>
			                  			<span id="error_AMC_Ref_No" class="text-danger"></span>
					                </div> 
					                <input type="hidden" name="approve" id="approve"> 
					            </div>
					            <?php $j=1; ?>
					            <div id="app"> 
						            <?php if(isset($GetSaleItem)) { foreach($GetSaleItem as $Get) { if($j == 1) { ?>
						            	<div class="row col-md-12" id="row1">    
							                <input type="hidden" id="ID_<?php echo $j; ?>" name="ID_<?php echo $j; ?>" value="<?php echo $Get['id']; ?>">
							                <div class="form-group col-md-3">
							                	<label class="control-label"> Select Item <label class="text-red">*</label> </label>	
							                	<select class="form-control Equipment_type" id="1" name="Equipment_type1">
												   	<option value="">Select</option>
												   	<?php if(isset($ItemGroup)) { foreach ($ItemGroup as $k) { ?>
												   		<option value="<?php echo $k['id']; ?>" <?php if($Get['item_id'] == $k['id']) { echo "selected"; }?>><?php echo $k['item_name']; ?></option>
												   	<?php } } ?>
												</select>
												<span class="text-danger error" id="error_equipment_type1"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<label class="control-label"> Qty <label class="text-red">*</label></label>
							                	<input type="number" class="form-control qty" name="qty1" id="qty1" placeholder="Qty" min='1' value="<?php echo $Get['qty']; ?>">	
							                	<span class="text-danger error" id="error_qty1"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<label class="control-label"> Gst% <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="gst1" id="gst1" placeholder="Gst%" value="<?php echo $Get['gst']; ?>" readonly>	
							                	<span class="text-danger" id="error_gst1"></span>
							                </div>
							                <div class="form-group col-md-1" style="display: none;">
							                	<label class="control-label"> Gst Rate <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="gst_rate1" id="gst_rate1" placeholder="Gst% Rate" value="<?php echo $Get['gst_amt']; ?>" readonly>	
							                	<span class="text-danger" id="error_gst_rate1"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<label class="control-label"> Rate <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="rate1" id="rate1" placeholder="Rate" value="<?php echo $Get['rate']; ?>" readonly>	
							                	<span class="text-danger" id="error_rate1"></span>
							                </div>
							                 <div class="form-group col-md-2">
							                	<label class="control-label"> Amount <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="amount1" id="amount1" placeholder="Amount" value="<?php echo $Get['amt']; ?>" readonly>	
							                	<span class="text-danger" id="error_amount1"></span>
							                </div>
							                <div class="form-group col-md-1" style="padding-top: 25px;">
							                	<input type="button" class="btn btn-primary add" name="add" id="add" value="Add More"> 
							                </div>
							            </div>
						            	<?php $j++;} else { ?>
						            	<div class="row col-md-12" id="row<?php echo $j; ?>">    
							                <input type="hidden" id="ID_<?php echo $j; ?>" name="ID_<?php echo $j; ?>" value="<?php echo $Get['id']; ?>">
							                <div class="form-group col-md-3">
							                	<select class="form-control Equipment_type" id="<?php echo $j; ?>" name="Equipment_type<?php echo $j; ?>">
												   	<option value="">Select</option>
												   	<?php if(isset($ItemGroup)) { foreach ($ItemGroup as $k) { ?>
												   		<option value="<?php echo $k['id']; ?>" <?php if($Get['item_id'] == $k['id']) { echo "selected"; }?>><?php echo $k['item_name']; ?></option>
												   	<?php } } ?>
												</select>
												<span class="text-danger error" id="error_equipment_type"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<input type="number" class="form-control qty" name="qty<?php echo $j; ?>" id="qty<?php echo $j; ?>" placeholder="Qty" min='1' value="<?php echo $Get['qty']; ?>">	
							                	<span class="text-danger error" id="error_qty"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<input type="number" class="form-control" name="gst<?php echo $j; ?>" id="gst<?php echo $j; ?>" placeholder="Gst%" value="<?php echo $Get['gst']; ?>" readonly>	
							                	<span class="text-danger" id="error_gst"></span>
							                </div>
							                <div class="form-group col-md-1" style="display: none;">
							                	<input type="number" class="form-control" name="gst_rate<?php echo $j; ?>" id="gst_rate<?php echo $j; ?>" placeholder="Gst% Rate" value="<?php echo $Get['gst_amt']; ?>" readonly>	
							                	<span class="text-danger" id="error_gst_rate"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<input type="number" class="form-control" name="rate<?php echo $j; ?>" id="rate<?php echo $j; ?>" placeholder="Rate" value="<?php echo $Get['rate']; ?>" readonly>	
							                	<span class="text-danger" id="error_rate"></span>
							                </div>
							                 <div class="form-group col-md-2">
							                	<input type="number" class="form-control" name="amount<?php echo $j; ?>" id="amount<?php echo $j; ?>" placeholder="Amount" value="<?php echo $Get['amt']; ?>" readonly>	
							                	<span class="text-danger" id="error_amount"></span>
							                </div>
							                <div class="form-group col-md-1" >
							                	<a href='#'><span id="<?php echo $j; ?>" class='glyphicon glyphicon-trash'></span></a>
							                </div>
							            </div>
						            <?php $j++;} } }else { ?>
							            <div class="row col-md-12" id="row1">    
							                <div class="form-group col-md-3">
							                	<label class="control-label"> Select Item <label class="text-red">*</label> </label>	
							                	<select class="form-control Equipment_type" id="1" name="Equipment_type1">
												   	<option value="">Select</option>
												</select>
												<span class="text-danger error" id="error_equipment_type1"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<label class="control-label"> Qty <label class="text-red">*</label></label>
							                	<input type="number" class="form-control qty" name="qty1" id="qty1" placeholder="Qty" min='1'>	
							                	<span class="text-danger error" id="error_qty1"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<label class="control-label"> Gst% <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="gst1" id="gst1" placeholder="Gst%" readonly>	
							                	<span class="text-danger" id="error_gst1"></span>
							                </div>
							                <div class="form-group col-md-1" style="display: none;">
							                	<label class="control-label"> Gst Rate <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="gst_rate1" id="gst_rate1" placeholder="Gst% Rate" readonly>	
							                	<span class="text-danger" id="error_gst_rate1"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<label class="control-label"> Rate <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="rate1" id="rate1" placeholder="Rate" readonly>	
							                	<span class="text-danger" id="error_rate1"></span>
							                </div>
							                 <div class="form-group col-md-2">
							                	<label class="control-label"> Amount <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="amount1" id="amount1" placeholder="Amount" readonly>	
							                	<span class="text-danger" id="error_amount1"></span>
							                </div>
							                <div class="form-group col-md-1" style="padding-top: 25px;">
							                	<input type="button" class="btn btn-primary add" name="add" id="add" value="Add More"> 
							                </div>
							            </div>
							        <?php } ?>     
						        </div>
						        <div class="row col-md-12"> 
						       		<br>
						        	<div class="form-group col-md-3 pull-right">
							        	<label class="control-label"> Basic Amount <label class="text-red">*</label></label>
							        	<input type="number" class="form-control" name="total_basic_amt" id="total_basic_amt" placeholder="Basic Amount" value="<?php if(isset($total_basic_amt)){ echo $total_basic_amt; } ?>" readonly>	
							        	<span class="text-danger" id="total_basic_amt"></span>
							       	</div>
						        </div>
						        <div class="row col-md-12"> 
						        	<div class="form-group col-md-3 pull-right">
							        	<label class="control-label"> Gst Amount <label class="text-red">*</label></label>
							        	<input type="number" class="form-control" name="total_gst" id="total_gst" placeholder="Gst Amount" value="<?php if(isset($total_gst_amt)){ echo $total_gst_amt; } ?>" readonly>	
							        	<span class="text-danger" id="total_gst"></span>
							       	</div>
						        </div>
						        <div class="row col-md-12"> 
						        	<div class="form-group col-md-3 pull-right">
							        	<label class="control-label"> Net Amount <label class="text-red">*</label></label>
							        	<input type="number" class="form-control" name="total_net_amt" id="total_net_amt" placeholder="Net Amount" value="<?php if(isset($total_net_amt)){ echo $total_net_amt; } ?>" readonly>	
							        	<span class="text-danger" id="total_net_amt"></span>
							       	</div>
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
<script src="<?php echo base_url('files/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript">
	$('#date').datepicker({
		format: 'dd-mm-yyyy',
	    autoclose: true
	});

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
    });	

    $("#party_names").change(function(){
    	var partyGroup = $("#party_group").val();
    	var party_names = $("#party_names").val();
      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/TicketInfo/CheckMachineSerial1',
	        type: "POST",
	        data: {"partyGroupId":partyGroup, "partyName":party_names },
	        success: function (result) {
	        	$("#machine_serial_no").html(result);
	        }
      	});
    });

    $("#machine_serial_no").change(function(){
    	var name = $("#machine_serial_no option:selected").text();
    	$("#MachineSerialNo").val(name);
    });
   

	function ItemGroup(partyGroup,AMC_Ref_No,i){
		$.ajax({
	        url: '<?php echo base_url(); ?>Admin/SaleInvoice/CheckItemGroup',
	        type: "POST",
	        data: {"ItemGroup":partyGroup,"AMC_Ref_No":AMC_Ref_No},
	        success: function (result) {
	         	$("#"+i).html(result);
	        }
      	});
	}

	$("#AMC_Ref_No").change(function(){
    	var partyGroup = $("#party_group").val();
    	var AMC_Ref_No = $("#AMC_Ref_No").val();
    	var j = 1;
    	ItemGroup(partyGroup,AMC_Ref_No,j);
    });

	<?php if(isset($count)){ ?>
    var i = <?php echo $count+1; ?>
	<?php } else { ?>
	var i = 2;	
	<?php } ?>

    $("#add").click(function(){
    	var partyGroup = $("#party_group").val();
    	var AMC_Ref_No = $("#AMC_Ref_No").val();

    	var listItem = "";

    	listItem += "<div class='row col-md-12' id='row"+i+"'>";
    	listItem += "<input type='hidden' id='ID_"+i+"' name='ID_"+i+"' value='0'>";
		listItem += "<div class='form-group col-md-3'>";
		listItem += "<select class='form-control Equipment_type' id='"+i+"' name='Equipment_type"+i+"'>";
		ItemGroup(partyGroup,AMC_Ref_No,i);
		listItem += "</select>";
		listItem += "<span class='text-danger error' id='error_equipment_type"+i+"'></span>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-2'>";
		listItem += "<input type='number' class='form-control qty' name='qty"+i+"' id='qty"+i+"' placeholder='Qty' min='1'>";
		listItem += "<span class='text-danger error' id='error_qty"+i+"'></span>";
		listItem += "</div>";
		listItem += "<div class='form-group col-md-2'>";
		listItem += "<input type='number' class='form-control' name='gst"+i+"' id='gst"+i+"' placeholder='Gst%' readonly>";
		listItem += "<span class='text-danger' id='error_gst"+i+"'></span>";
		listItem += "</div>"; 
		listItem += "<div class='form-group col-md-1' style='display: none;'>";
		listItem += "<input type='number' class='form-control' name='gst_rate"+i+"' id='gst_rate"+i+"' placeholder='Gst% Rate' readonly>"; 
		listItem += "<span class='text-danger' id='error_gst_rate"+i+"'></span>";
		listItem += "</div>"; 
		listItem += "<div class='form-group col-md-2'>";
		listItem += "<input type='number' class='form-control' name='rate"+i+"' id='rate"+i+"' placeholder='Rate' readonly>";
		listItem += "<span class='text-danger' id='error_rate"+i+"'></span>";
		listItem += "</div>"; 
		listItem += "<div class='form-group col-md-2'>";
		listItem += "<input type='number' class='form-control' name='amount"+i+"' id='amount"+i+"' placeholder='Amount' readonly>";
		listItem += "<span class='text-danger' id='error_amount"+i+"'></span>";
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

    function GetTotal(){
    	var items = i;
    	var basic_amt = 0;
    	var get_amt = 0;
    	var net_amt = 0;

    	for (var j=1; j<=items; j++) {
			
			if($("#amount"+j).val() == null){}else{
				get_amt = get_amt + parseInt($("#gst_rate"+j).val());
				net_amt = net_amt + parseInt($("#amount"+j).val());
			}
    	}

    	main_net = $("#total_net_amt").val(net_amt);
    	main_gst = $("#total_gst").val(get_amt);
    	main_basic = net_amt- get_amt;

		$("#total_basic_amt").val(main_basic);

    }

    function GetRate(party_group, AMC_Ref_No, ItemName,id,qty) {
    	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/SaleInvoice/GetRateParty',
	        type: "POST",
	        data: {"party_group":party_group,"AMC_Ref_No":AMC_Ref_No, "ItemName":ItemName},
	        success: function (result) {
	         	var result = $.parseJSON(result);

	         	$("#gst"+id).val(result.gst);
	         	$("#rate"+id).val(result.party_rate);

	         	var approve = $('#approve').val();
	         	if(approve == ''){
	         		if(result.required == 1){
	         			$('#approve').val(result.required);
	         		}
	         	}


	         	id_re = id.replace("qty", "");

	         	var gst_rate = result.party_rate/(1+(parseInt(result.gst)/100));
	         	var gst_rate = (result.party_rate-gst_rate.toFixed(2))*qty;
	         	var gst_rate = gst_rate.toFixed(2);

	        	$("#gst_rate"+id_re).val(gst_rate);
	        	$("#amount"+id_re).val(result.party_rate*qty);
	        	GetTotal();
	        }
      	});
    }

   	$(document).on("change", ".qty", function(event) {
   		var party_group = $("#party_group").val();
		var AMC_Ref_No = $("#AMC_Ref_No").val();
   		id = $(this).attr("id");
   		var qty = $(this).val();
   		var res = id.replace("qty", "");
   		var ItemName = $("#"+res).find(":selected").val();

   		GetRate(party_group, AMC_Ref_No, ItemName,id,qty);
   			
   	});

    $(document).on("change", ".Equipment_type", function(event) {
    	var party_group = $("#party_group").val();
		var AMC_Ref_No = $("#AMC_Ref_No").val();
    	var id = $(this).attr('id');
    	var ItemName = $(this).val();
    	
    	$("#qty"+id).val(1);
    	GetRate(party_group, AMC_Ref_No, ItemName,id,1);
    });

    $(document).on("click", "#submit", function(event) {
    	var party_group = $("#party_group").val();
    	var party_names = $("#party_names").val();
		var AMC_Ref_No = $("#AMC_Ref_No").val();
		var machine_serial_no = $("#machine_serial_no").val();
    	
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

    		var is_error = false;

    		for(j=1; j<=i; j++)
	    	{
	    		var Equipment_type = $(".Equipment_type").val();
	    		var qty = $("#qty"+j).val();
	    		var rate = $("#rate"+j).val();
	    		var gst = $("#gst"+j).val();
	    		var gst_rate = $("#gst_rate"+j).val();
	    		var amount = $("#amount"+j).val();	

	    		if(Equipment_type == '' || rate == '' || qty == ''){
	    			
	    			if(Equipment_type == ''){
	    				is_error = true;
	    				$("#error_equipment_type"+j).show();
	    				$("#error_equipment_type"+j).html('Equipment Type field is required.');
	    			} else { $("#error_equipment_type"+j).hide(); }
	    			if(rate == ''){
	    				is_error = true;
	    				$("#error_rate"+j).show();
	    				$("#error_rate"+j).html('Rate field is required.');
	    			} else { $("#error_rate"+j).hide(); }
	    			if(qty == ''){
	    				is_error = true;
	    				$("#error_qty"+j).show();
	    				$("#error_qty"+j).html('Qty field is required.');
	    			} else { $("#error_qty"+j).hide(); }
	    			if(gst == ''){
	    				is_error = true;
	    				$("#error_gst"+j).show();
	    				$("#error_gst"+j).html('Gst field is required.');
	    			} else { $("#error_gst"+j).hide(); }
	    			if(gst_rate == ''){
	    				is_error = true;
	    				$("#error_gst_rate"+j).show();
	    				$("#error_gst_rate"+j).html('Gst Rate field is required.');
	    			} else { $("#error_gst_rate"+j).hide(); }
	    			if(amount == ''){
	    				is_error = true;
	    				$("#error_amount"+j).show();
	    				$("#error_amount"+j).html('Amount field is required.');
	    			} else { $("#error_amount"+j).hide(); }
	    		}
	    	}

	    	if(is_error != true)
            {
	    		var sale_invoice = [];
	    		var sale_item = [];
	    		var Ids = [];
				var set = i;

				var approve = $("#approve").val();
				if(approve == ''){
					approve_data = 1;
				} else {
					approve_data = 0;
				}

				sale_invoice.push( {
					<?php if(isset($id)) { echo "id:".$id.","; } ?>
					bill_no: $("#bill_no").val(),
					date: $("#date").val(),
					party_id: $("#party_group").val(),
					party_info_id: $("#party_names").val(),
					machine_serial_no: $("#machine_serial_no").val(),
					amc_contract_info: $("#AMC_Ref_No").val(),
					total_basic_amt: $("#total_basic_amt").val(),
					total_gst_amt: $("#total_gst").val(),
					total_net_amt: $("#total_net_amt").val(),
					approve: approve_data,
				});

			    <?php if(isset($GetSaleItem)){ ?>

			    	var sets = i;
			    	for(var k=1; k<=sets; k++)
					{

				    	sale_item.push( {
							id: $("#ID_"+k).val(),
							item_id: $("#"+k).val(),
							qty: $("#qty"+k).val(),
							gst: $("#gst"+k).val(),
							gst_rate: $("#gst_rate"+k).val(),
							rate: $("#rate"+k).val(),
							amount: $("#amount"+k).val(),
						});	
					
						$IDs = $("#ID_"+k).val();

						if($IDs == null){}else {
							if($IDs == 0){}else{
								Ids.push($IDs);
							}
						}
					}

			    	$.ajax({
						url: '<?php echo base_url(); ?>Admin/SaleInvoice/SaleInvoiceUp',
						type: "POST",
						data: {
							"sale_invoice":sale_invoice,
							"sale_item": sale_item,
							"Ids": Ids,
						},
						success: function (result) {
							window.location.href = "<?php echo base_url().'Admin/SaleInvoice'; ?>";
						}
					});

			    <?php } else { ?>

				    for(var k=1; k<=set; k++)
					{
						sale_item.push( {
							item_id: $("#"+k).val(),
							qty: $("#qty"+k).val(),
							gst: $("#gst"+k).val(),
							gst_rate: $("#gst_rate"+k).val(),
							rate: $("#rate"+k).val(),
							amount: $("#amount"+k).val(),
						});					
				    }

				    var MachineSerialNo = $("#MachineSerialNo").val();

				    $.ajax({
						url: '<?php echo base_url(); ?>Admin/SaleInvoice/AddSaleInvoice',
						type: "POST",
						data: {
							"sale_invoice":sale_invoice, 
							"sale_item": sale_item, 
							"MachineSerialNo":MachineSerialNo,
						},
						success: function (result) {
							window.location.href = "<?php echo base_url().'Admin/SaleInvoice'; ?>";
						}
					});

				<?php } ?>
	    	}
    	}
    });

    $(document).on("click", ".glyphicon", function(event) {
    	var id = $(this).attr('id');
    	$('#row'+id).remove();
    	i--;
    	GetTotal();
    });
</script>