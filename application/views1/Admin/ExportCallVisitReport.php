<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<link rel="stylesheet" href="<?php echo base_url('files/my/jquery.dataTables.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('files/my/buttons.dataTables.min.css'); ?>">

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
    		<div class="col-md-12">
          <div class="box box-info">
          	<div class="box-header with-border">
          		<h3 class="box-title"><i class="fa fa-list"></i> List Call Visit Report </h3>
        		</div>
		        <div class="box-body table-responsive">
              <form action="" method="POST" accept-charset="utf-8">
                <div class="box-body">
                  <div class="row col-md-12">    
                    <div class="form-group col-md-2">
                      <label class="control-label"> From Date </label>
                      <input type="text" class="form-control" name="from_date" id="from_date">
                    </div>
                    <div class="form-group col-md-2">
                      <label class="control-label"> To Date </label>
                      <input type="text" class="form-control" name="to_date" id="to_date">
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label"> Select Party Group </label> 
                      <select class="form-control" id="party_group" name="party_group">
                        <option value="">Select</option>
                        <?php if(isset($PartyGroup)) { foreach ($PartyGroup as $PartyGroup) { ?>
                        <option value="<?php echo $PartyGroup['id']; ?>"><?php echo $PartyGroup['party_name']; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label"> Party Name </label> 
                      <div id="update_AMC">
                        <select class="form-control" id="party_name" name="party_name">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div> 
                    <div class="form-group col-md-1" style="padding-top: 24px;">
                      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
                    </div>
                  </div>
                </div>
              </form>
              <table id="example" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Call Visit No </th>
                    <th> Party Group Name </th>
                    <th> Party Name </th>
                    <th> Problem Info </th>
                    <th> Problem Rectification </th>
                    <th> Reported Date  </th>
                    <th> Reported Time  </th>
                    <th> Place </th>
                    <th> Call Status  </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datas as $d) { ?>
                    <tr>
                      <td> <?php echo $d['call_visit_no']; ?> </td>
                      <td> <?php echo $d['party_group']; ?> </td>
                      <td> <?php echo $d['party_name']; ?> </td>
                      <td> <?php echo $Getproblem_info; ?> </td>
                      <td> <?php echo $pro_info_rec_data; ?> </td>
                      <td> <?php echo $d['reported_date']; ?> </td>
                      <td> <?php echo $d['reported_time']; ?> </td>
                      <td> <?php echo $d['place']; ?> </td>
                      <td> <?php echo $d['call_status']; ?> </td> 
                  <?php } ?>
                </tbody>
              </table>
              <br>
              <br>
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
<script type="text/javascript">
  $('#from_date').datepicker({
    format: 'dd-mm-yyyy',
      autoclose: true
  });
  $('#to_date').datepicker({
    format: 'dd-mm-yyyy',
      autoclose: true
  });
  $("#party_group").change(function(){
    var partyGroup = $("#party_group").val();
    $.ajax({
      url: '<?php echo base_url(); ?>Admin/MachineDetails/CheckParty',
      type: "POST",
      data: {"partyGroupId":partyGroup},
      success: function (result) {
        $("#party_name").html(result);
      }
    });
  });
</script>