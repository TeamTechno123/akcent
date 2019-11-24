<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('submenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
        	<li><?php echo $this->session->userdata('submenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
    	<div class="row">
    		<div class="col-md-5">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-plus"></i> Add Party </h3>
            		</div>
			        <div class="box-body table-responsive">
						<form action="" method="POST" accept-charset="utf-8">
				            <div class="box-body">
					            <div class="row col-md-12">    
					                <div class="form-group col-md-12">
					                  	<label class="control-label"> Party Group Name <label class="text-red">*</label> </label>
										<div>
			                    			<input type="text" class="form-control" name="party_name" id="party_name" placeholder="Enter Party Group Name" value="<?php if(isset($id)) { echo $name; } ?>">
			                    		</div>		
			                    		<label class="text-red"> <?php echo form_error('party_name'); ?> </label>
					                </div>
					            </div>
					            <div class="row col-md-12">    
					                <div class="form-group col-md-12">	
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
        	<div class="col-md-7">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-list"></i> List Party </h3>
            		</div>
			        <div class="box-body table-responsive">
		              	<table id="example1" class="table table-bordered table-hover">
		                	<thead>
			                	<tr>
				                  	<th> Party Group Name </th>
				                  	<th> Action </th>
			                	</tr>
		                	</thead>
		                	<tbody>
			                	<?php foreach ($datas as $datas) { ?>
			                		<tr>
			                			<td> <?php echo $datas['party_name']; ?> </td>
			                			<td align="center"> 
			                				<a href="<?php echo site_url('Admin/Party/EditGroup/').$datas['id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
			                				<a href="<?php echo site_url('Admin/Party/DeleteGroup/').$datas['id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
			                			</td>
			                		</tr>
			                	<?php } ?>
			                </tbody>
			            </table>
			        </div>        			       
          		</div>
     		</div>
     	</div>	
    </section>
</div>