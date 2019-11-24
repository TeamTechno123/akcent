<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<link rel="stylesheet" href="<?php echo base_url('files/my/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('files/my/buttons.dataTables.min.css'); ?>">

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-fw fa-gear"></i> <?php echo $this->session->userdata('topmenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-fw fa-gear"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
    	<div class="row">     
        	<div class="col-md-12">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-list"></i> ProblemInfo List </h3>
                    <br>
                    <br>
                    <div class="row col-md-12">    
                      <form action="" method="POST" accept-charset="utf-8">
                        <div class="form-group col-md-5">
                            <label class="control-label"> Select Equipment Type </label>
                            <select class="form-control" id="equipment_type" name="equipment_type">
                              <option value="">Select</option>
                              <?php if(isset($ItemGroup)) { foreach ($ItemGroup as $ItemGroup) { ?>
                                  <option value="<?php echo $ItemGroup['id']; ?>" <?php if(isset($item_group_id)) { if($item_group_id == $ItemGroup['id']) { echo "selected"; } } ?> ><?php echo $ItemGroup['group_name']; ?></option>
                              <?php } } ?>
                            </select> 
                        </div> 
                        <div class="form-group col-md-2" style="padding-top: 24px;">
                      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
                    </div>
                      </form>
                    </div>
            		</div>
			        <div class="box-body table-responsive">
		              	<table id="example" class="table table-bordered table-hover">
		                	<thead>
			                	<tr>
				                  	<th> Equipment Type </th>
				                  	<th> Problem Info </th>
			                	</tr>
		                	</thead>
		                	<tbody>
			                	<?php if($setting) { foreach ($setting as $setting) { ?>
			                		<tr>
			                			<td> <?php echo $setting['group_name']; ?> </td>
			                			<td> <?php echo $setting['problem_info']; ?> </td>
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
<script src="<?php //echo base_url('files/dist/table2excel.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
  /*function Export() {
    $("#example1").table2excel({
      filename: "EquipmentType.xls"
    });
  }*/
</script>

<script type="text/javascript" src="<?php echo base_url('files/my/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/dataTables.buttons.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/jszip.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/pdfmake.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/vfs_fonts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/buttons.html5.min.js'); ?>"></script>

<script type="text/javascript">
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           /* 'copyHtml5',*/
            'excelHtml5',
           /* 'csvHtml5',*/
            /*'pdfHtml5'*/
        ]
    });
</script>