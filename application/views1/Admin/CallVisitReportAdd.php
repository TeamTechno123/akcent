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
              			<h3 class="box-title"><i class="fa fa-plus"></i> Add Call Visit Report </h3>
            		</div>
			        <div class="box-body table-responsive">
						<form action="" method="POST" accept-charset="utf-8">
				            <div class="box-body">
					            <div class="row col-md-12">
					            	<div class="form-group col-md-6">
					                 	<label class="control-label"> Call Visit no <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<input type="text" class="form-control" name="call_visit" id="call_visit" placeholder="Ticket Number" value="<?php if(isset($call_visit_no)) { echo $call_visit_no; } if(isset($CallNo)) { echo $CallNo; } ?>" readonly>
			                  			</div>
					                </div>
					                <div class="form-group col-md-6">
										<label class="control-label"> Ticket Create Date <label class="text-red">*</label> </label>	
										<div>
			                    			<input type="text" class="form-control" name="ticket_date" id="ticket_date" value="<?php echo $datas[0]['create_date']; ?>" readonly>
			                  			</div>
									</div>	
					                
					            </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-6">
					                  	<label class="control-label"> Party Group <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<select class="form-control" id="party_group" name="party_group" disabled>
										        <option value="">Select</option>
										        <?php foreach ($PartyGroup as $d) { ?>
										        	<option value="<?php echo $d['id']; ?>" <?php if(isset($datas)) { if($datas[0]['party_id'] == $d['id']) { echo "selected"; } } ?>> <?php echo $d['party_name']; ?> </option>
										        <?php } ?>
										    </select>
			                  			</div>
			                  		
					                </div>
					                <div class="form-group col-md-6">
					                  	<label class="control-label"> Party Name </label>	
			                  			<div id="update_AMC" style="padding-top: 5px">
			                    			<select class="form-control" id="party_names" name="party_names" disabled>
												<option value="">Select</option>
												<?php if(isset($CheckParty)) {  foreach ($CheckParty as $k) { ?>
													<option value="<?php echo $k['id'] ?>" <?php if($k['id'] == $datas[0]['party_info_id']){ echo "selected"; } ?>><?php echo $k['name']; ?></option>
												<?php } } ?>
										    </select>
			                  			</div>
			                  		
					                </div>
					           </div>
					           <div class="row col-md-12"> 
    					            <div class="form-group col-md-4">
    					                  	<label class="control-label"> Contact Person Name <label class="text-red">*</label> </label>	
    			                  			<div id="update_AMC">
    			                    			<input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person Name" value="<?php echo $datas[0]['content_name'] ?>" readonly>
    			                  			</div>
    			                  			
    					                </div>
    					                 <div class="form-group col-md-4">
    					                  	<label class="control-label"> Contact Number <label class="text-red">*</label> </label>	
    			                  			<div id="update_AMC">
    			                    			<input type="text" class="form-control" name="contact_nummber" id="contact_nummber" placeholder="Contact Number" value="<?php echo $datas[0]['content_no'] ?>" readonly>
    			                  			</div>
    			                  			
    					                </div>
    					                 <div class="form-group col-md-4">
    					                  	<label class="control-label"> Equipmeny Type <label class="text-red">*</label> </label>	
    			                  			<div id="update_AMC">
    			                    			<input type="text" class="form-control" name="item_type" id="item_type" placeholder="Equipment Type" value="<?php echo $Item[0]['group_name']; ?>" readonly>
    			                  			</div>
    					                </div>
					            </div>
					           	<div class="row col-md-12"> 
    					             <div class="form-group col-md-4">
    					                <label class="control-label"> Make <label class="text-red">*</label> </label><label class="pull-right" id="InWarrenty" style="color: green ;"><?php if($GetMachine[0]['in_warrenty'] == 1){ echo "In Warrenty"; } ?></label>	
    			                  		<div id="update_AMC">
    			                    		<input type="text" class="form-control" name="make" id="make" placeholder="Make" value="<?php  echo $GetMachine[0]['item_company_info_name']; ?>" readonly>
    			                  		</div>
    			                  	</div>
    					            <div class="form-group col-md-4">
    					                <label class="control-label"> Machine Model <label class="text-red">*</label> </label>	
    			                  		<div id="update_AMC">
    			                    		<input type="text" class="form-control" name="item_model" id="item_model" placeholder="Machine Model" value="<?php  echo $GetMachine[0]['model_no']; ?>" readonly>
    			                  		</div>
    			                  	</div>
    					            <div class="form-group col-md-4">
    					               	<label class="control-label"> Machine Serial no <label class="text-red">*</label> </label>	
    			                  		<div id="update_AMC">
    			                    		<input type="text" class="form-control" name="item_sr" id="item_sr" placeholder="Machine Serial no" value="<?php  echo $GetMachine[0]['serial_no']; ?>" readonly>
    			                  		</div>	
    					            </div>
    					           
					            </div>
					            <div class="row col-md-12"> 
    					           	<div class="form-group col-md-6">
    					              	<label class="control-label"> Problem Info <label class="text-red">*</label> </label>	
    			                  		<div id="update_AMC">
    			                    		<textarea rows="3" class="form-control" name="prob_info" id="prob_info" placeholder="Problem Information" value="" readonly><?php echo $datas[0]['problem_info']; ?></textarea>
    			                  		</div>
    					            </div>
    					            <div class="form-group col-md-6">
    					              	<label class="control-label"> Additional Detail <label class="text-red">*</label> </label>	
    			                  		<div id="update_AMC">
    			                    		<textarea rows="3" class="form-control" name="addi_detail" id="addi_detail" placeholder="Additional Detail" value="" readonly><?php echo $datas[0]['additional_note']; ?></textarea>
    			                  		</div>
    					            </div>  
					            </div>
					            <div class="row col-md-12"> 
    					            <div class="form-group col-md-6">
    					                <label class="control-label"> Engineer Name<label class="text-red">*</label> </label>	
    			                  		<div id="update_AMC">
    			                    		<input type="text" class="form-control" name="engineer_name" id="engineer_name" placeholder="Engineer Name" value="<?php echo $datas[0]['engineer_name']; ?>" readonly>
    			                  		</div>
    			                  	</div>
    					            <div class="form-group col-md-6">
    					                <label class="control-label"> Engineer Contact no <label class="text-red">*</label> </label>	
    			                  		<div id="update_AMC">
    			                    		<input type="text" class="form-control" name="engineer_contact" id="engineer_contact" placeholder="Engineer Contact no" value="<?php echo $datas[0]['e_mobile_no']; ?>" readonly>
    			                  		</div>	
    					            </div>   
					            </div>
					            <div class="row col-md-12">
					               	<?php if(isset($SaleInvoice)) { $i=1; $j=1; ?>
					               		<div class="col-md-6" id="app_pro_info">
					               			<?php foreach ($pro_info_data as $v) { ?>
						               			<?php if($i == 1){ ?>
						               				<div class="row form-group col-md-10" id="<?php echo "add_pro".$i; ?>">
						               					<label class="control-label"> Problem Info </label>	
						               					<select class="form-control" id="problem_info[]" name="problem_info[]">
															<option value="">Select</option>
															<?php if(isset($pro_info)) { foreach ($pro_info as $k) { ?>
																<option value="<?php echo $k['id']; ?>" <?php if($k['id'] == $v) { echo "selected"; } ?>><?php echo $k['problem_info']; ?></option>
															<?php } } ?>
														</select>
						               				</div>
						               				<div class="col-md-2" style="padding-top: 25px;">
								               			<input type="button" class="btn btn-primary" name="add_pro" id="add_pro" value="Add More"> 
								               		</div>
						               				
						               			<?php $i++;} else { ?>
													<div class="row form-group col-md-10" id="<?php echo "add_pro".$i; ?>">
						               					<select class="form-control" id="problem_info[]" name="problem_info[]">
															<option value="">Select</option>
															<?php if(isset($pro_info)) { foreach ($pro_info as $k) { ?>
																<option value="<?php echo $k['id']; ?>" <?php if($k['id'] == $v) { echo "selected"; } ?>><?php echo $k['problem_info']; ?></option>
															<?php } } ?>
														</select>
						               				</div>
						               				<div class="col-md-2" style="padding-top: 7px" id="<?php echo "i_add_pro".$i; ?>">
								               			<a href='#'><span id='<?php echo $i; ?>' class='glyphicon del_prob glyphicon-trash'></span></a> 
								               		</div>
						               			<?php $i++;} ?>
						               		<?php } ?>
					               		</div>
					               		<div class="col-md-6" id="app_pro_recti">
					               			<?php foreach ($pro_info_rec_data as $v) { ?>
						               			<?php if($j == 1){ ?>
						               				<div class="row form-group col-md-10" id="<?php echo "add_pro_re".$j; ?>">
								               			<label class="control-label"> Problem Rectification </label>	
												        <select class="form-control" id="prob_info_rec[]" name="prob_info_rec[]">
															<option value="">Select</option>
															<?php if(isset($pro_info_rec)) { foreach ($pro_info_rec as $k) { ?>
																<option value="<?php echo $k['id']; ?>" <?php if($k['id'] == $v) { echo "selected"; } ?>><?php echo $k['problem_rectification_info']; ?></option>
															<?php } } ?>
														</select>
								               		</div>
								               		<div class="col-md-2" style="padding-top: 25px">
								               			<input type="button" class="btn btn-primary" name="add_pro_re" id="add_pro_re" value="Add More"> 
								               		</div>
								               	<?php $j++;} else { ?>
								               		<div class="row form-group col-md-10" id="<?php echo "add_pro_re".$j; ?>">
												        <select class="form-control" id="prob_info_rec[]" name="prob_info_rec[]">
															<option value="">Select</option>
															<?php if(isset($pro_info_rec)) { foreach ($pro_info_rec as $k) { ?>
																<option value="<?php echo $k['id']; ?>" <?php if($k['id'] == $v) { echo "selected"; } ?>><?php echo $k['problem_rectification_info']; ?></option>
															<?php } } ?>
														</select>
								               		</div>
								               		<div class="col-md-2" style="padding-top: 7px" id="<?php echo "i_add_pro_re".$j; ?>">
								               			<a href='#'><span id='<?php echo $j; ?>' class='glyphicon del_prob_rec glyphicon-trash'></span></a>
								               		</div>
												<?php $j++;} ?>
						               		<?php } ?>
					               		</div>
					               	<?php } else { ?>
					               	<div class="col-md-6" id="app_pro_info">
					               		<div class="row form-group col-md-10" id="1">
					               			<label class="control-label"> Problem Info </label>	
									           <select class="form-control" id="problem_info[]" name="problem_info[]">
												<option value="">Select</option>
												<?php if(isset($pro_info)) { foreach ($pro_info as $k) { ?>
													<option value="<?php echo $k['id']; ?>"><?php echo $k['problem_info']; ?></option>
												<?php } } ?>
											</select>
					               		</div>
					               		<div class="col-md-2" style="padding-top: 25px">
					               			<input type="button" class="btn btn-primary" name="add_pro" id="add_pro" value="Add More"> 
					               		</div>
					               	</div>
					                <div class="col-md-6" id="app_pro_recti">
					               		<div class="row form-group col-md-10" id="1">
					               			<label class="control-label"> Problem Rectification </label>	
									           <select class="form-control" id="prob_info_rec[]" name="prob_info_rec[]">
												<option value="">Select</option>
												<?php if(isset($pro_info_rec)) { foreach ($pro_info_rec as $k) { ?>
													<option value="<?php echo $k['id']; ?>"><?php echo $k['problem_rectification_info']; ?></option>
												<?php } } ?>
											</select>
					               		</div>
					               		<div class="col-md-2" style="padding-top: 25px">
					               			<input type="button" class="btn btn-primary" name="add_pro_re" id="add_pro_re" value="Add More"> 
					               		</div>
					               	</div>
					               <?php } ?>
						        </div>
						        <div class="row col-md-12">
					            	<div class="form-group col-md-6">
					                 	<label class="control-label"> Reported Date <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<input type="text" class="form-control" name="report_date" id="report_date" placeholder="Report Date" value="<?php if(isset($SaleInvoice)) { echo $SaleInvoice[0]['reported_date']; } ?>" >
			                  			</div>
			                  			<label class="text-red"> <?php echo form_error('report_date'); ?> </label>
					                </div>
					                <div class="form-group col-md-6">
										<label class="control-label"> Reported Time <label class="text-red">*</label> </label>	
										<div>
			                    			<input type="time" class="form-control" name="report_time" id="report_time" placeholder="Report Time" value="<?php if(isset($SaleInvoice)) { echo $SaleInvoice[0]['reported_time']; } ?>">
			                  			</div>
			                  			<label class="text-red"> <?php echo form_error('report_time'); ?> </label>
									</div>	
					            </div>
					            <div class="row col-md-12">
					            	<div class="form-group col-md-6">
					                 	<label class="control-label"> Place <label class="text-red">*</label> </label>	
			                  			<div>
			                    			<input type="text" class="form-control" name="place" id="place" placeholder="Place" value="<?php if(isset($SaleInvoice)) { echo $SaleInvoice[0]['place']; } ?>" >
			                  			</div>
			                  			<label class="text-red"> <?php echo form_error('place'); ?> </label>
					                </div>
					                <div class="form-group col-md-6">
										<label class="control-label"> Select Call Status <label class="text-red">*</label> </label>	
										<div>
			                    			<select class="form-control" id="call_status" name="call_status" >
												<option value="">Select</option>
												<option value="on_process" <?php if(isset($SaleInvoice)) { if($SaleInvoice[0]['call_status'] == 'on_process') { echo "selected"; } } ?>>On Process</option>
												<option value="complete" <?php if(isset($SaleInvoice)) { if($SaleInvoice[0]['call_status'] == 'complete') { echo "selected"; } } ?>>Complete</option>
										    </select>
			                  			</div>
			                  			<label class="text-red"> <?php echo form_error('call_status'); ?> </label>
									</div>	   
					            </div>
					            <div class="row col-md-12">
					            	<div class="form-group col-md-12">
					            		<input type="checkbox" name="approve" id="approve" value="0" <?php if(isset($SaleInvoice)){ if($SaleInvoice[0]['approve'] == 0) { echo "checked"; } } ?>>&nbsp<label>This Report Needed Technical User Approval</label>
					            	</div>
					            </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-12">	
										<div>
			                    			<input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
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
	$('#report_date').datepicker({
		format: 'dd-mm-yyyy',
	    autoclose: true
	});

	<?php if(isset($pro_info_count)){ ?>
    var i = <?php echo $pro_info_count+1; ?>
	<?php } else { ?>
	var i = 2;	
	<?php } ?>

	<?php if(isset($pro_info_rec_count)){ ?>
    var j = <?php echo $pro_info_rec_count+1; ?>
	<?php } else { ?>
	var j = 2;	
	<?php } ?>

    $("#add_pro").click(function(){
    	var listItem = "";
  
    	listItem += "<div class='row form-group col-md-10' id='add_pro"+i+"'>";
		listItem += "<select class='form-control' id='problem_info[]' name='problem_info[]'>";
		listItem += "<option value=''>Select</option>";
					<?php foreach ($pro_info as $v) { ?>
						listItem += "<option value='<?php echo $v['id']; ?>'> <?php echo $v['problem_info']; ?> </option>";
					<?php } ?>
		listItem += "</select>";
		listItem += "</div>"; 
		listItem += "<div class='col-md-2' style='padding-top: 7px' id='i_add_pro"+i+"'>";
		listItem += "<a href='#'><span id='"+i+"' class='glyphicon del_prob glyphicon-trash'></span></a> ";
		listItem += "</div>";
		listItem += "</div>";
		i++;
    	if(listItem != ''){
            $("#app_pro_info").append(listItem);
        }
    });


    $("#add_pro_re").click(function(){
    	var listItem = "";
    	listItem += "<div class='row form-group col-md-10' id='add_pro_re"+j+"'>";
		listItem += "<select class='form-control' id='prob_info_rec[]' name='prob_info_rec[]'>";
		listItem += "<option value=''>Select</option>";
					<?php foreach ($pro_info_rec as $v) { ?>
						listItem += "<option value='<?php echo $v['id']; ?>'> <?php echo $v['problem_rectification_info']; ?> </option>";
					<?php } ?>
		listItem += "</select>";
		listItem += "</div>"; 
		listItem += "<div class='col-md-2' style='padding-top: 7px' id='i_add_pro_re"+j+"' >";
		listItem += "<a href='#'><span id='"+j+"' class='glyphicon del_prob_rec glyphicon-trash'></span></a> ";
		listItem += "</div>";
		listItem += "</div>";	
		i++;
    	if(listItem != ''){
            $("#app_pro_recti").append(listItem);
        }
    });

    $(document).on("click", ".del_prob", function(event) {
    	var id = $(this).attr('id');
    	$('#add_pro'+id).remove();
    	$('#i_add_pro'+id).remove();
    	i--;
    });

    $(document).on("click", ".del_prob_rec", function(event) {
    	var id = $(this).attr('id');
    	$('#add_pro_re'+id).remove();
    	$('#i_add_pro_re'+id).remove();
    	i--;
    });
</script>