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
              			<h3 class="box-title"><i class="fa fa-plus"></i> Add Receipt Information </h3>
            		</div>
			        <div class="box-body table-responsive">
						<form action="" method="POST" accept-charset="utf-8">
				            <div class="box-body">
					            <div class="row col-md-12">
					            	<div class="form-group col-md-6">
					                 	<label class="control-label"> Receipt no <label class="text-red">*</label> </label>	
			                  			
			                  			<div>
			                    			<input type="text" class="form-control" name="receipt_no" id="receipt_no" placeholder="Ticket Number" value="<?php if(isset($id)) { echo $datas[0]['receipt_no']; } if(isset($ReceiptNo)) { echo "RCP".$ReceiptNo; } ?>" readonly>
			                  			</div>
					                </div>
					                <div class="form-group col-md-6">
										<label class="control-label"> Receipt Create Date <label class="text-red">*</label> </label>	
										<div>
			                    			<input type="text" class="form-control date" name="date" id="date" value="<?php if(isset($datas)){ echo $datas[0]['date']; } ?>">
			                  			</div>
			                  			<label class="text-red" id="error_date"> <?php echo form_error('date'); ?> </label>
									</div>	 
					            </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-6">
					                  	<label class="control-label"> Party Group <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<select class="form-control" id="party_group" name="party_group">
										        <option value="">Select</option>
										        <?php foreach ($PartyGroup as $d) { ?>
										        	<option value="<?php echo $d['id']; ?>" <?php if(isset($datas)) { if($datas[0]['party_id'] == $d['id']) { echo "selected"; } } ?>> <?php echo $d['party_name']; ?> </option>
										        <?php } ?>
										    </select>
										    <label class="text-red" id="error_party_group"> <?php echo form_error('party_group'); ?> </label>
			                  			</div>
					                </div>
					                <div class="form-group col-md-6">
					                  	<label class="control-label"> Party Name </label>	
			                  			<div id="update_AMC" style="padding-top: 5px">
			                    			<select class="form-control" id="party_names" name="party_names">
												<option value="">Select</option>
												 <?php foreach ($CheckParty as $d) { ?>
										        	<option value="<?php echo $d['id']; ?>" <?php if(isset($datas)) { if($datas[0]['party_info_id'] == $d['id']) { echo "selected"; } } ?>> <?php echo $d['name']; ?> </option>
										        <?php } ?>
										    </select>
			                  			</div>
					                </div>
					           	</div>
					           	<div class="row col-md-12">    
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Contract Ref No <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<select class="form-control" id="AMC_Ref_No" name="AMC_Ref_No">
										        <option value="">Select</option>
										        <?php foreach ($CheckAmcContract as $d) { ?>
										        	<option value="<?php echo $d['contract_id']; ?>" <?php if(isset($datas)) { if($datas[0]['amc_contract_info'] == $d['contract_id']) { echo "selected"; } } ?>> <?php echo $d['contract_ref_no']; ?> </option>
										        <?php } ?>
										    </select>
										</div>
										<label class="text-red" id="error_AMC_Ref_No"> <?php echo form_error('AMC_Ref_No'); ?> </label>
									</div>
									<div class="form-group col-md-4">
					                  	<label class="control-label"> Due Bills <label class="text-red">*</label> </label><label id="total" class="pull-right" style="color:#f35b5b;"> <?php if(isset($TotalBill)) { echo $TotalBill; } ?> </label>
			                  			<div>
			                    			<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" id="due_bills" name="due_bills">
										        <option value="">Select</option>
										         <?php foreach ($SaleInvoices as $d) { ?>
										        	<option value="<?php echo $d['id']; ?>" 
										        		<?php if(isset($datas)) { 
										        			foreach ($SelectBill as $k) {
										        				if($k == $d['id']) { echo "selected"; }
										        			}
										        		} ?>
										        		> <?php echo $d['bill_no']." ( RS.". $d['total_net_amt'] ." ) "; ?> </option>
										        <?php } ?>
										    </select>
										    <label class="text-red" id="error_due_bills"> <?php echo form_error('due_bills'); ?> </label>
										</div>
									</div>
									<div class="form-group col-md-4">
										<label class="control-label"> Receipt Amount </label>
										<div style="padding-top: 5px">
											<input type="text" class="form-control" name="receipt_amt" id="receipt_amt" value="<?php if(isset($datas)){ echo $datas[0]['receipt_amt']; } ?>" readonly>
										</div>
										<label class="text-red" id="error_receipt_amt"> <?php echo form_error('receipt_amt'); ?> </label>
									</div>
								</div>
								<div class="row col-md-12">
									<div class="form-group col-md-12">
										<label class="control-label"> Payment Mode <label class="text-red">*</label> : </label> &nbsp&nbsp&nbsp&nbsp
										
										<label><input type="radio" value="1" name="payment" <?php if(isset($datas)) { if($datas[0]['payment_mode'] == 1) { echo "checked"; } } else { echo "checked"; } ?>> &nbsp <label> Cash </label></label> &nbsp&nbsp&nbsp&nbsp	
										
										<label><input type="radio" value="2" name="payment" <?php if(isset($datas)) { if($datas[0]['payment_mode'] == 2) { echo "checked"; } } ?> > &nbsp <label> Cheque </label></label> &nbsp&nbsp&nbsp&nbsp
										<label><input type="radio" value="3" name="payment" <?php if(isset($datas)) { if($datas[0]['payment_mode'] == 3) { echo "checked"; } } ?> > &nbsp <label> Online Transfer </label></label>
									</div>
									<label class="text-red" id="error_payment"> <?php echo form_error('payment'); ?> </label>
								</div> 
								<div class="row col-md-12">
									<?php if(isset($datas)) { ?>
										<?php if($datas[0]['payment_mode'] == 1){ ?>
											<div class="form-group col-md-6" id='remark_div'>
												<label class="control-label" id="remark"> Remark </label><label class="text-red" id="requ">  </label>
												<div>
													<input type="text" class="form-control" name="remarks" id="remarks" value="<?php echo $datas[0]['remark']; ?>">
												</div>
											</div>
											<div class="form-group col-md-6" id='date_div' style="display: none;">
												<label class="control-label" id="date_lable"> Payment Date <label class="text-red">*</label> </label>
												<div>
													<input type="text" class="form-control date" name="cheque_date" id="cheque_date" value="<?php echo $datas[0]['payment_date']; ?>">
												</div>
												<label class="text-red" id="error_cheque_date"> <?php echo form_error('cheque_date'); ?> </label>
											</div>
										<?php } ?>
										<?php if($datas[0]['payment_mode'] == 2){ ?>
											<div class="form-group col-md-6" id='remark_div'>
												<label class="control-label" id="remark"> Cheque No <label class="text-red">*</label></label>
												<div>
													<input type="text" class="form-control" name="remarks" id="remarks" value="<?php echo $datas[0]['remark']; ?>">
												</div>
											</div>
											<div class="form-group col-md-6" id='date_div'>
												<label class="control-label" id="date_lable"> Payment Date <label class="text-red">*</label> </label>
												<div>
													<input type="text" class="form-control date" name="cheque_date" id="cheque_date" value="<?php echo $datas[0]['payment_date']; ?>">
												</div>
												<label class="text-red" id="error_cheque_date"> <?php echo form_error('cheque_date'); ?> </label>
											</div>
										<?php } ?>
										<?php if($datas[0]['payment_mode'] == 3){ ?>
											<div class="form-group col-md-6" id='remark_div'>
												<label class="control-label" id="remark"> Translate Id </label>
												<div>
													<input type="text" class="form-control" name="remarks" id="remarks" value="<?php echo $datas[0]['remark']; ?>">
												</div>
											</div>
											<div class="form-group col-md-6" id='date_div'>
												<label class="control-label" id="date_lable"> Payment Date <label class="text-red">*</label> </label>
												<div>
													<input type="text" class="form-control date" name="cheque_date" id="cheque_date" value="<?php echo $datas[0]['payment_date']; ?>">
												</div>
												<label class="text-red" id="error_cheque_date"> <?php echo form_error('cheque_date'); ?> </label>
											</div>
										<?php } ?>


									<?php } else { ?>
										<div class="form-group col-md-6" id='remark_div'>
											<label class="control-label" id="remark"> Remark </label><label class="text-red" id="requ">  </label>
											<div>
												<input type="text" class="form-control" name="remarks" id="remarks" value="">
											</div>
											<label class="text-red" id="error_remarks"> <?php echo form_error('remarks'); ?> </label>
										</div>
										<div class="form-group col-md-6" id='date_div' style="display: none;">
											<label class="control-label" id="date_lable"> Payment Date <label class="text-red">*</label> </label>
											<div>
												<input type="text" class="form-control date" name="cheque_date" id="cheque_date" value="">
											</div>
											<label class="text-red" id="error_cheque_date"> <?php echo form_error('cheque_date'); ?> </label>
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
<script src="<?php echo base_url('files/plugins/iCheck/icheck.min.js'); ?>"></script>
<script src="<?php echo base_url('files/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('files/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript">
	
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	    autoclose: true
	});

	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    	checkboxClass: 'icheckbox_minimal-blue',
      	radioClass   : 'iradio_minimal-blue'
    });

    $('.select2').select2()

	$("#party_group").change(function(){
    	$("#total").hide();
    	
    	var partyGroup = $("#party_group").val();
      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/CheckParty',
	        type: "POST",
	        data: {"partyGroupId":partyGroup},
	        success: function (result) {
	          $("#party_names").html(result);
	        }
      	});

      	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/CheckAmcContract',
	        type: "POST",
	        data: {"partyGroupId":partyGroup},
	        success: function (result) {
	          $("#AMC_Ref_No").html(result);
	        }
      	});
    });

    $("#AMC_Ref_No").change(function(){
		var partyGroup = $("#party_group").val();
		var AMC_Ref_No = $("#AMC_Ref_No").val();
		
		$.ajax({
	        url: '<?php echo base_url(); ?>Admin/ReceiptInfo/CheckBill',
	        type: "POST",
	        data: {"partyGroup":partyGroup, "AMC_Ref_No":AMC_Ref_No},
	        success: function (result) {
	          $("#due_bills").html(result);
	        }
      	});

		$.ajax({
	        url: '<?php echo base_url(); ?>Admin/ReceiptInfo/CheckTotalBill',
	        type: "POST",
	        data: {"partyGroup":partyGroup, "AMC_Ref_No":AMC_Ref_No},
	        success: function (result) {
	        	if(result == ''){
	        		$("#total").hide();
	        		$("#receipt_amt").val('');
	        	} else {
	        		$("#total").show();
	        		$("#total").html(result);
	        	}	
	        }
      	});
    });

    $("#due_bills").change(function(){
    	var due_bills = $("#due_bills").val();
    	
    	$.ajax({
	        url: '<?php echo base_url(); ?>Admin/ReceiptInfo/CheckSelectBill',
	        type: "POST",
	        data: {"due_bills":due_bills},
	        success: function (result) {
	        	if(result == ''){
	        		$("#receipt_amt").val('');
	        	} else {
	        		$("#receipt_amt").val(result);
	        	}
	        }
      	});
    });

    $('input[type=radio][name=payment]').on('change', function(){
	   
    	var chk_val = $(this).val();

    	if(chk_val == 1){
    		$("#requ").html("");
    		$("#remark").html("Remark");
    		$("#date_div").hide();
    	}

		if(chk_val == 2){
			$("#requ").html("*");
    		$("#remark").html("Cheque No");
    		$("#date_div").show();
    	}

    	if(chk_val == 3){
    		$("#requ").html("");
    		$("#remark").html("Translate Id");
    		$("#date_div").show();
    	}

	});

	 $(document).on("click", "#submit", function(event) {
    	var receipt_no = $("#receipt_no").val();
    	var date = $("#date").val();
    	var party_group = $("#party_group").val();
    	var party_names = $("#party_names").val();
		var AMC_Ref_No = $("#AMC_Ref_No").val();
		var due_bills = $("#due_bills").val();
		var receipt_amt = $("#receipt_amt").val();
		var payment = $("input[name='payment']:checked").val()
		var remarks = $("#remarks").val();
		var cheque_date = $("#cheque_date").val();
    	
    	if(date == '' || party_group == '' || AMC_Ref_No == '' || due_bills == ''){
    		if(date == ''){
    			$("#error_date").show();
    			$("#error_date").html('Date field is required.');
    		} else { $("#error_date").hide(); }

    		if(party_group == ''){
    			$("#error_party_group").show();
    			$("#error_party_group").html('Party Group field is required.');
    		} else { $("#error_party_group").hide(); }

    		if(AMC_Ref_No == ''){
    			$("#error_AMC_Ref_No").show();
    			$("#error_AMC_Ref_No").html('AMC Contract Ref No field is required.');
    		} else { $("#error_AMC_Ref_No").hide(); }

    		if(due_bills == ''){
    			$("#error_due_bills").show();
    			$("#error_due_bills").html('Due Bills Ref No field is required.');
    		} else { $("#error_due_bills").hide(); }

    		if(payment == ''){
    			$("#error_payment").show();
    			$("#error_payment").html('Payment Ref No field is required.');
    		} else { $("#error_payment").hide(); }

    	} else {
    		$("#error_date").hide();
    		$("#error_party_group").hide();
    		$("#error_AMC_Ref_No").hide();
    		$("#error_due_bills").hide();
    		$("#error_payment").hide();

    		var is_error = false;

    		if(payment == 2){
    			if(remarks == '' || cheque_date == ''){
    				if(remarks == ''){
    					is_error = true;
		    			$("#error_remarks").show();
		    			$("#error_remarks").html('Cheque No field is required.');
		    		} else { $("#error_remarks").hide(); }

		    		if(cheque_date == ''){
		    			is_error = true;
		    			$("#error_cheque_date").show();
		    			$("#error_cheque_date").html('Cheque Date No field is required.');
		    		} else { $("#error_cheque_date").hide(); }
    			}
    		}

    		if(payment == 3){
    			$("#error_remarks").hide();
    			if(cheque_date == ''){
    				is_error = true;
		    		$("#error_cheque_date").show();
		    		$("#error_cheque_date").html('Payment Date No field is required.');
				} else { $("#error_cheque_date").hide(); }
    		}

    		if(is_error != true)
            {
            	$("#error_remarks").hide();
            	$("#error_cheque_date").hide();
            	
            	<?php if(isset($datas)){ ?>

            		$.ajax({
				        url: '<?php echo base_url(); ?>Admin/ReceiptInfo/UpReceiptInfo',
				        type: "POST",
				        data: {
				        	"id":<?php echo $id; ?>,
				        	"receipt_no":receipt_no,
				        	"date":date,
				        	"party_group":party_group,
				        	"party_names":party_names,
				        	"AMC_Ref_No":AMC_Ref_No,
				        	"due_bills":due_bills,
				        	"receipt_amt":receipt_amt,
				        	"payment":payment,
				        	"remarks":remarks,
				        	"cheque_date":cheque_date,
				        },
				        success: function (result) {
				        	window.location.href = "<?php echo base_url().'Admin/ReceiptInfo'; ?>";
				        }
			      	});

            	<?php } else { ?>

	            	$.ajax({
				        url: '<?php echo base_url(); ?>Admin/ReceiptInfo/AddReceiptInfo',
				        type: "POST",
				        data: {
				        	"receipt_no":receipt_no,
				        	"date":date,
				        	"party_group":party_group,
				        	"party_names":party_names,
				        	"AMC_Ref_No":AMC_Ref_No,
				        	"due_bills":due_bills,
				        	"receipt_amt":receipt_amt,
				        	"payment":payment,
				        	"remarks":remarks,
				        	"cheque_date":cheque_date,
				        },
				        success: function (result) {
				        	window.location.href = "<?php echo base_url().'Admin/ReceiptInfo'; ?>";
				        }
			      	});

            	<?php }  ?>
            }
    	}
    });

</script>