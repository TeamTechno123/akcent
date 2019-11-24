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
              			<h3 class="box-title"><i class="fa fa-list"></i> Party Wise Info </h3>
                    <br>
                    <br>
                    <div class="row col-md-12">    
                      <form action="" method="POST" accept-charset="utf-8">
                        <div class="form-group col-md-4">
                            <label class="control-label"> Select Party Group </label>
                            <select class="form-control" id="party_group" name="party_group">
                              <option value="">Select</option>
                              <?php if(isset($PartyGroup)) { foreach ($PartyGroup as $PartyGroup) { ?>
                              <option value="<?php echo $PartyGroup['id']; ?>"><?php echo $PartyGroup['party_name']; ?></option>
                              <?php } } ?>
                            </select>
                        </div> 
                        <div class="form-group col-md-4">
                            <label class="control-label"> AMC Contract Ref No </label> 
                            <div id="update_AMC">
                              <select class="form-control" id="AMC_Ref_No" name="AMC_Ref_No">
                                <option value="">Select</option>
                              </select>
                            </div>
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
				                  	<th> Party Group Name </th>
				                  	<th> Party Name </th>
                            <th> Contract Ref No </th>
                            <th> Equipment Type </th>
                            <th> Rate </th>
                            <th> Item Required Approval </th>
			                	</tr>
		                	</thead>
		                	<tbody>
                        <?php foreach ($datas as $k) { ?>
                          <tr>
                            <td> <?php echo $k['party_name']; ?> </td>
                            <td> <?php echo $k['name']; ?> </td>
                            <td> <?php echo $k['contract_ref_no']; ?> </td>
                            <td> <?php echo $k['item_name']; ?> </td>
                            <td> <?php echo $k['rate']; ?> </td>
                            <td> <?php if(isset($k['required'])) { if($k['required'] == 0) { echo "No"; }else { echo "Yes"; } } ?> </td>
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
          url: '<?php echo base_url(); ?>Admin/PartyWiseInfo/CheckAmcContract',
          type: "POST",
          data: {"partyGroupId":partyGroup},
          success: function (result) {
            $("#AMC_Ref_No").html(result);
          }
        });
  });
</script>