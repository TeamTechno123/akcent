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
			                    			<input type="text" class="form-control" name="date" id="date" value="<?php echo $date; ?>" disabled>
			                  			</div>
									</div>	
					                <?php } else { ?>
									<div class="form-group col-md-6">
										<label class="control-label"> Date <label class="text-red">*</label> </label>	
										<div>
			                    			<input type="text" class="form-control" name="date" id="date" disabled>
			                  			</div>
									</div>
								<?php } ?>
					            </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Select Party Group <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<select class="form-control" id="party_group" name="party_group" disabled>
										        <option value="">Select</option>
										        <?php foreach ($PartyGroup as $datas) { ?>
										        	<option value="<?php echo $datas['id']; ?>" <?php if(isset($party_id)) { if($party_id == $datas['id']) { echo "selected"; } } ?>> <?php echo $datas['party_name']; ?> </option>
										        <?php } ?>
										    </select>
			                  			</div>
			                  			<span id="error_party_group" class="text-danger"></span>
					                </div>
					                <div class="form-group col-md-4">
					                  	<label class="control-label"> Party Name </label>	
			                  			<div id="update_AMC" style="padding-top: 5px">
			                    			<select class="form-control" id="party_names" name="party_names" disabled>
												<option value="">Select</option>
												<?php if(isset($CheckParty)) {  foreach ($CheckParty as $k) { ?>
													<option value="<?php echo $k['id'] ?>" <?php if($k['id'] == $party_info_id){ echo "selected"; } ?>><?php echo $k['name']; ?></option>
												<?php } } ?>
										    </select>
			                  			</div>
			                  			<span id="error_party_names" class="text-danger"></span>
					                </div>
									<div class="form-group col-md-4">
					                  	<label class="control-label"> Select AMC Contract Ref No <label class="text-red">*</label> </label>	
			                  			<div id="update_AMC">
			                    			<select class="form-control" id="AMC_Ref_No" name="AMC_Ref_No" disabled>
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
							                <div class="form-group col-md-3">
							                	<label class="control-label"> Select Item <label class="text-red">*</label> </label>	
							                	<select class="form-control Equipment_type" id="1" name="Equipment_type1" disabled>
												   	<option value="">Select</option>
												   	<?php if(isset($ItemGroup)) { foreach ($ItemGroup as $k) { ?>
												   		<option value="<?php echo $k['id']; ?>" <?php if($Get['item_id'] == $k['id']) { echo "selected"; }?>><?php echo $k['item_name']; ?></option>
												   	<?php } } ?>
												</select>
												<span class="text-danger error" id="error_equipment_type1"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<label class="control-label"> Qty <label class="text-red">*</label></label>
							                	<input type="number" class="form-control qty" name="qty1" id="qty1" placeholder="Qty" min='1' value="<?php echo $Get['qty']; ?>" disabled>	
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
							                 <div class="form-group col-md-3">
							                	<label class="control-label"> Amount <label class="text-red">*</label></label>
							                	<input type="number" class="form-control" name="amount1" id="amount1" placeholder="Amount" value="<?php echo $Get['amt']; ?>" readonly>	
							                	<span class="text-danger" id="error_amount1"></span>
							                </div>
							            </div>
						            	<?php $j++;} else { ?>
						            	<div class="row col-md-12" id="row<?php echo $j; ?>">    
							                <div class="form-group col-md-3">
							                	<select class="form-control Equipment_type" id="1" name="Equipment_type1" disabled>
												   	<option value="">Select</option>
												   	<?php if(isset($ItemGroup)) { foreach ($ItemGroup as $k) { ?>
												   		<option value="<?php echo $k['id']; ?>" <?php if($Get['item_id'] == $k['id']) { echo "selected"; }?>><?php echo $k['item_name']; ?></option>
												   	<?php } } ?>
												</select>
												<span class="text-danger error" id="error_equipment_type"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<input type="number" class="form-control qty" name="qty1" id="qty1" placeholder="Qty" min='1' value="<?php echo $Get['qty']; ?>" disabled>	
							                	<span class="text-danger error" id="error_qty"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<input type="number" class="form-control" name="gst1" id="gst1" placeholder="Gst%" value="<?php echo $Get['gst']; ?>" readonly>	
							                	<span class="text-danger" id="error_gst"></span>
							                </div>
							                <div class="form-group col-md-1" style="display: none;">
							                	<input type="number" class="form-control" name="gst_rate1" id="gst_rate1" placeholder="Gst% Rate" value="<?php echo $Get['gst_amt']; ?>" readonly>	
							                	<span class="text-danger" id="error_gst_rate"></span>
							                </div>
							                <div class="form-group col-md-2">
							                	<input type="number" class="form-control" name="rate1" id="rate1" placeholder="Rate" value="<?php echo $Get['rate']; ?>" readonly>	
							                	<span class="text-danger" id="error_rate"></span>
							                </div>
							                 <div class="form-group col-md-3">
							                	<input type="number" class="form-control" name="amount1" id="amount1" placeholder="Amount" value="<?php echo $Get['amt']; ?>" readonly>	
							                	<span class="text-danger" id="error_amount"></span>
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
							       	<input type="hidden" name="ids" id="ids" value="<?php echo $id; ?>">
						        </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-12">	
										<div>
			                    			<?php if(!isset($view)) { ?>
			                    			<a href="<?php echo site_url('Technical/SaleInvoice/SaleInvoiceUp/').$id; ?>"> <input type="button" name="submit" id="submit" class="btn btn-success" value="Approve This"> </a> &nbsp&nbsp&nbsp&nbsp
			                    			<input type="button" name="Decline" data-toggle="modal" data-target="#modal-default" id="Decline" class="btn btn-danger" value="Decline"> &nbsp&nbsp&nbsp&nbsp
			                    			<?php } ?>
			                    			<a href="<?php echo site_url('Technical/SaleInvoice'); ?>"> <input type="button" name="submit" id="submit" class="btn btn-primary" value="Back"> </a>
			                    		</div>		
					                </div>
					            </div>
					        </div>
					    </form>            
			        </div>
			    </div>
			</div>        
     	</div>
     	<div class="modal fade" id="modal-default">
          	<div class="modal-dialog">
            	<div class="modal-content">
              		<div class="modal-header" style="background-color:#3c8dbc; color:#ffffff;">
                		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#ffffff;" >
                  		<span aria-hidden="true">&times;</span></button>
                		<h4 class="modal-title"> Decline Reason </h4>
              		</div>
              		<div class="modal-body">
                		<form action="" method="POST" accept-charset="utf-8">
				            <div class="box-body">
					            <div class="row col-md-12">    
					                <div class="form-group">

					                  	<label class="control-label"> Decline Reason <label class="text-red">*</label> </label>
										<div id="engineerAdd">
			                    			<input type="text" class="form-control" name="reason" id="reason" value="">
			                    		</div>		
			                    		<label class="text-red" id="error_name">  </label>
					                </div>
									<div class="form-group">
										<button type="button" class="btn btn-primary" id="save_e"> Save </button>
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
   
    $("#error_name").hide(); 

    $(document).on("click", "#save_e", function(event) {
    	var reason = $("#reason").val();
    	var ids = $("#ids").val();
    	if(reason == ''){
    		
    		$("#error_name").show();
    		$("#error_name").html("Decline Reason field is required");

    	} else {
			$("#error_name").hide();

			$.ajax({
			    url: '<?php echo base_url(); ?>Technical/SaleInvoice/SaleInvoiceDecline',
			    type: "POST",
			    data: {
			      	"id":ids,
			      	"approve":2,
			      	"reason":reason,
			    },
			    success: function (result) {
			       	window.location.href = "<?php echo base_url().'Technical/SaleInvoice'; ?>";
			    }
			});
    	}
    });
</script>