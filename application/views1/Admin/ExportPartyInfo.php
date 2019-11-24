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
          		<h3 class="box-title"><i class="fa fa-list"></i> List-Party info </h3>
        		</div>
		        <div class="box-body table-responsive">
              <form action="" method="POST" accept-charset="utf-8">
                <div class="box-body">
                  <div class="row col-md-12">    
                    <div class="form-group col-md-5">
                      <label class="control-label"> Select Party Group </label> 
                      <select class="form-control" id="party_group" name="party_group">
                        <option value="">Select</option>
                        <?php if(isset($PartyGroup)) { foreach ($PartyGroup as $PartyGroup) { ?>
                        <option value="<?php echo $PartyGroup['id']; ?>"><?php echo $PartyGroup['party_name']; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label class="control-label"> Party Name </label> 
                      <div id="update_AMC">
                        <select class="form-control" id="party_name" name="party_name">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div> 
                    <div class="form-group col-md-2" style="padding-top: 24px;">
                      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
                    </div>
                  </div>
                </div>
              </form>
              <table id="example" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Group Name </th>
                    <th> Name </th>
                    <th> Address </th>
                    <th> mobile 1 </th>
                    <th> mobile 2 </th>
                    <th> Email id </th>
                    <th> Website </th>
                    <th> PAN No </th>
                    <th> GST No </th>
                    <th> Contact person </th>
                    <th> Contact No </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($party_info as $d) { ?>
                    <tr>
                      <td> <?php echo $d['party_name']; ?> </td>
                      <td> <?php echo $d['name']; ?> </td>
                      <td> <?php echo $d['address']; ?> </td>
                      <td> <?php echo $d['mobile_1']; ?> </td>
                      <td> <?php echo $d['mobile_2']; ?> </td>
                      <td> <?php echo $d['email']; ?> </td>
                      <td> <?php echo $d['website']; ?> </td>
                      <td> <?php echo $d['pan_no']; ?> </td>
                      <td> <?php echo $d['gst_no']; ?> </td>
                      <td> <?php echo $d['party_contact_person_name']; ?> </td>
                      <td> <?php echo $d['party_contact_no']; ?> </td>       
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
<script type="text/javascript">
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