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
										<input type="text" class="form-control" value="<?php echo $datas['party_name']; ?>" disabled>
		                    		</div>		
		                    		<label class="text-red"> <?php echo form_error('party_group'); ?> </label>
				                </div>
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Party Name  </label>
									<div style="padding-top: 5px">
										<input type="text" class="form-control" value="<?php echo $datas['name']; ?>" disabled>
		                    		</div>		
				                </div>
				            </div>
				            <div class="row col-md-12">    
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Machine Serial No </label><label class="Machine pull-right" style="color: #f39c12 ;"></label>
									<div>
										<input type="text" class="form-control" value="<?php echo $datas['serial_no']." (".$datas['item_company_info_name']."-".$datas['model_no']." )"; ?>" disabled>
		                    		</div>		
				                </div>
				                <div class="form-group col-md-6">
				                  	<label class="control-label"> Equipment Type </label>
									<div>
										<input type="text" class="form-control" value="<?php echo $datas['group_name']; ?>" disabled>
		                    		</div>		
				                </div>
				            </div>
							<div class="row col-md-12">  
				            	<div class="form-group col-md-12">
				                	<label class="control-label"> Problem Information <label class="text-red">*</label> </label>	
		                  			<div>
		                  				<textarea class="form-control" rows="3" id="problem_information" name="problem_information" placeholder="Enter Problem Information" disabled><?php echo $datas['problem_info']; ?></textarea>
		                  			</div>
				                </div>
				            </div>
				            <div class="row col-md-12">
		                    	<div class="form-group col-md-6">
				                  	<label class="control-label"> Contact Person Name <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" value="<?php echo $datas['content_name']; ?>" disabled>
		                    		</div>		
		                    	</div>
		                    	<div class="form-group col-md-6">
				                  	<label class="control-label"> Contact Number <label class="text-red">*</label> </label>
									<div>
		                    			<input type="text" class="form-control" value="<?php echo $datas['content_no']; ?>" disabled>
		                    		</div>		
		                    	</div>
				            </div> 
				            <div class="row col-md-12">  
				            	<div class="form-group col-md-12">
				                	<label class="control-label"> Additional Note </label>	
		                  			<div>
		                  				<textarea class="form-control" rows="3" id="additional_note" name="additional_note" placeholder="Enter Additional Note" disabled><?php echo $datas['additional_note']; ?></textarea>
		                  			</div>
				                </div>
				            </div>
				        </div> 
				        <div class="box-footer">
				            <a href="<?php echo site_url('Technical/Home'); ?>"><button type="button" class="btn btn-primary pull-right">Back</button></a>
				        </div>    
			        </form>			       
          		</div>
     		</div>
     	</div>	
    </section>
</div> 