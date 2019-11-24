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
				                <div class="form-group col-md-7">
				                  	<label class="control-label"> Name <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php if(isset($name)){ echo $name; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('name'); ?> </label>
				                </div>
				                <div class="form-group col-md-5">
				                  	<label class="control-label"> HSN <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" name="HSN" id="HSN" placeholder="Enter HSN" value="<?php if(isset($HSN)){ echo $HSN; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('HSN'); ?> </label>
				                </div>
				            </div>
				            <div class="row col-md-12">
				            	<div class="form-group col-md-4">
				                	<label class="control-label"> Select Item Company <label class="text-red">*</label> </label>
									<select class="form-control" id="item_company" name="item_company">
									 	<option value="">Select</option>
										<?php if(isset($ItemCompany)) { foreach ($ItemCompany as $ItemCompany) { ?>
										    <option value="<?php echo $ItemCompany['id']; ?>" <?php if(isset($item_company_id)) { if($item_company_id == $ItemCompany['id']) { echo "selected"; } } ?> ><?php echo $ItemCompany['item_company_info_name']; ?></option>
										<?php } } ?>
									</select>
		                    		<label class="text-red"> <?php echo form_error('item_company'); ?> </label>
				                </div>
				                <div class="form-group col-md-4">
				                	<label class="control-label"> Select Equipment Type </label>
									<select class="form-control" id="equipment_type" name="equipment_type">
									 	<option value="">Select</option>
										<?php if(isset($ItemGroup)) { foreach ($ItemGroup as $ItemGroup) { ?>
										    <option value="<?php echo $ItemGroup['id']; ?>" <?php if(isset($item_group_id)) { if($item_group_id == $ItemGroup['id']) { echo "selected"; } } ?> ><?php echo $ItemGroup['group_name']; ?></option>
										<?php } } ?>
									</select>	
				                </div>
				                <div class="form-group col-md-4">
				                	<label class="control-label"> Select Tax Salb <label class="text-red">*</label> </label>
									<select class="form-control" id="taxs_lab" name="taxs_lab">
									 	<option value="">Select</option>
										<?php if(isset($TaxSlab)) { foreach ($TaxSlab as $TaxSlab) { ?>
										    <option value="<?php echo $TaxSlab['id']; ?>" <?php if(isset($taxslab_id)) { if($taxslab_id == $TaxSlab['id']) { echo "selected"; } } ?> ><?php echo $TaxSlab['taxslab_name']; ?></option>
										<?php } } ?>
									</select>	
		                    		<label class="text-red"> <?php echo form_error('taxs_lab'); ?> </label>
				                </div>
				            </div> 
				            <div class="row col-md-12">        
				                <div class="form-group col-md-3">
				                	<label class="control-label"> Select Unit <label class="text-red">*</label> </label>
									<select class="form-control" id="unit" name="unit">
									 	<option value="">Select</option>
										<?php if(isset($Unit)) { foreach ($Unit as $Unit) { ?>
										    <option value="<?php echo $Unit['id']; ?>" <?php if(isset($unit_id)) { if($unit_id == $Unit['id']) { echo "selected"; } } ?> ><?php echo $Unit['unit_name']; ?></option>
										<?php } } ?>
									</select>	
		                    		<label class="text-red"> <?php echo form_error('unit'); ?> </label>
				                </div>
				                <div class="form-group col-md-3">
				                	<label class="control-label"> Sale Price <label class="text-red">*</label> </label>
									<div>
		                    			<input type="number" class="form-control" name="sale_price" id="sale_price" placeholder="Enter Sale Price" value="<?php if(isset($sale_price)){ echo $sale_price; } ?>">
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('sale_price'); ?> </label>
				                </div>
				                 <div class="form-group col-md-3">
				                	<label class="control-label"> MRP </label>
									<div style="padding-top: 5px;">
		                    			<input type="number" class="form-control" name="MRP" id="MRP" placeholder="Enter MRP" value="<?php if(isset($MRP)){ echo $MRP; } ?>">
		                    		</div>	
		                    		<label class="text-red"> <?php echo form_error('MRP'); ?> </label>	
				                </div>
				                <div class="form-group col-md-3">
				                	<label class="control-label"> Warranty </label>
									<select class="form-control" id="warranty" name="warranty">
									 	<option value="">Select</option>
										<option value="6 Months" <?php if(isset($warranty)) { if($warranty == '6 Months') { echo "selected"; } } ?> >6 Months</option>
										<option value="1 Year" <?php if(isset($warranty)) { if($warranty == '1 Year') { echo "selected"; } } ?> >1 Year</option>
									</select>	
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