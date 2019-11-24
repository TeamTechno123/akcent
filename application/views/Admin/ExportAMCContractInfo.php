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
              			<h3 class="box-title"><i class="fa fa-list"></i> AMC Contract List </h3>
                    <br>
                    <br>
                    <div class="row col-md-12">    
                      <form action="" method="POST" accept-charset="utf-8">
                        <div class="form-group col-md-2" style="padding-top: 5px;">
                           <label class="control-label"> Contaract Date </label>
                           <input type="text" class="form-control" name="contaract_date" id="contaract_date">
                        </div>
                        <div class="form-group col-md-2" style="padding-top: 5px;">
                           <label class="control-label"> Start Date </label>
                           <input type="text" class="form-control" name="start_date" id="start_date">
                        </div>
                         <div class="form-group col-md-2">
                           <label class="control-label" style="padding-top: 5px;"> End Date </label>
                           <input type="text" class="form-control" name="end_date" id="end_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label"> Select Party Group <label class="text-red">*</label> </label> 
                            <div>
                              <select class="form-control" id="Party_Group" name="Party_Group">
                                <option value="">Select</option>
                                <?php if(isset($PartyGroup)) { foreach ($PartyGroup as $PartyGroup) { ?>
                                <option value="<?php echo $PartyGroup['id']; ?>" ><?php echo $PartyGroup['party_name']; ?></option>
                                <?php } } ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label"> Select AMC Type <label class="text-red">*</label> </label>  
                            <div>
                              <select class="form-control" id="type" name="type">
                                <option value="">Select</option>
                                <?php if(isset($AMCType)) { foreach ($AMCType as $AMCType) { ?>
                                  <option value="<?php echo $AMCType['id']; ?>" ><?php echo $AMCType['amc_type']; ?></option>
                                <?php } } ?>
                              </select>
                            </div>
                        </div>  
                        <div class="form-group col-md-1" style="padding-top: 30px;">
                          <input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
                        </div>
                      </form>
                    </div>
            		</div>
			        <div class="box-body table-responsive">
		              	<table id="example" class="table table-bordered table-hover">
		                	<thead>
			                	<tr>
                          <th> Contract No </th>
                          <th> Contract Date </th>
                          <th> Party Name </th>
                          <th> Amc Type </th>
                          <th> Start Date </th>
                          <th> End Date </th>
                          <th> contract Ref No </th>
                        </tr>
		                	</thead>
		                	<tbody>
			                	<?php foreach ($datas as $d) { ?>
                          <tr>
                            <td> <?php echo $d['AMC_contract_ref_no']; ?> </td>
                            <td> <?php echo $d['contract_date']; ?> </td>
                            <td> <?php echo $d['party_name']; ?> </td>
                            <td> <?php echo $d['amc_type']; ?> </td>
                            <td> <?php echo date_format(date_create($d['contract_start_date']),"d-m-Y"); ?> </td>
                            <td> <?php echo date_format(date_create($d['contract_end_date']),"d-m-Y"); ?> </td>
                            <td> <?php echo $d['contract_ref_no']; ?> </td>        
                        <?php } ?>
			                </tbody>
			            </table>
			        </div>        			       
          		</div>
     		</div>
     	</div>	
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('files/my/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/dataTables.buttons.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/jszip.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/pdfmake.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/vfs_fonts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('files/my/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('files/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript">
  $('#contaract_date').datepicker({
    format: 'dd-mm-yyyy',
      autoclose: true
  });
  $('#start_date').datepicker({
    format: 'yyyy-mm-dd',
      autoclose: true
  });
  $('#end_date').datepicker({
    format: 'yyyy-mm-dd',
      autoclose: true
  });  

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