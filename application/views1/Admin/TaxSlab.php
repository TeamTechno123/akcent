<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-fw fa-gear"></i> <?php echo $this->session->userdata('topmenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-fw fa-gear"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
    	<div class="row">
    		<div class="col-md-4">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-plus"></i> Add Tax Slab Name </h3>
            		</div>
			        <div class="box-body table-responsive">
						<form action="" method="POST" accept-charset="utf-8">
				            <div class="box-body">
					            <div class="row col-md-12">    
					                <div class="form-group">
					                  	<label class="setting control-label"> Tax Slab Name <label class="text-red">*</label> </label>
										<div>
			                    			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php if(isset($id)) { echo $name; } ?>">
			                    		</div>		
			                    		<label class="text-red"> <?php echo form_error('name'); ?> </label>
					                </div>
					            </div>
					            <div class="row col-md-12">    
					                <div class="form-group">	
										<div>
			                    			<input type="submit" name="submit" class="btn btn-primary">
			                    		</div>		
					                </div>
					            </div>
					        </div>
					    </form>            
			        </div>
			    </div>
			</div>        
        	<div class="col-md-8">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-list"></i> Tax Slab </h3>
            		</div>
			        <div class="box-body table-responsive">
		              	<table id="example1" class="table table-bordered table-hover">
		                	<thead>
			                	<tr>
				                  	<th> Tax Slab Name </th>
				                  	<th> Action </th>
			                	</tr>
		                	</thead>
		                	<tbody>
			                	<?php if($setting) { foreach ($setting as $setting) { ?>
			                		<tr>
			                			<td> <?php echo $setting['taxslab_name']; ?> </td>
			                			<td align="center"> 
			                				<a href="<?php echo site_url('Admin/TaxSlab/EditTaxSlab/').$setting['id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
			                				<a href="<?php echo site_url('Admin/TaxSlab/DeteleTaxSlab/').$setting['id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
			                			</td>
			                		</tr>
			                	<?php } } ?>
			                </tbody>
			            </table>
			        </div>        			       
          		</div>
     		</div>
     	</div>	
    </section>
</div>