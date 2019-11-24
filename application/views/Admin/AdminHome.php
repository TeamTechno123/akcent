<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-dashboard"></i> Dashboard<small>Control panel</small></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-dashboard"></i> Dashboard</li>
      	</ol>
    </section>
    <section class="content">
      <h2> Master Data Information </h2>
      <hr>
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php if(isset($DEngineer)) { echo $DEngineer; } ?></h3>
              <p>Total Engineers</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo site_url('Admin/Engineer'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
	        <div class="small-box bg-green">
	          <div class="inner">
	            <h3><?php if(isset($DParty)) { echo $DParty; } ?></h3>
	            <p>Total Party Groups</p>
	          </div>
	          <div class="icon">
	            <i class="fa fa-users"></i>
	          </div>
	          <a href="<?php echo site_url('Admin/Party/AddGroup'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php if(isset($DPartys)) { echo $DPartys; } ?></h3>
						  <p>Total Partys</p>
            </div>
	          <div class="icon">
	            <i class="fa fa-users"></i>
	          </div>
	         <a href="<?php echo site_url('Admin/Party/PartyInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php if(isset($DTechnicalUser)) { echo $DTechnicalUser; } ?></h3>
						  <p>Total Technical Users</p>
            </div>
            <div class="icon">
            	<i class="fa fa-users"></i>
          	</div>
         		<a href="<?php echo site_url('Admin/TechnicalUser'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      		</div>
      	</div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php if(isset($DProduct)) { echo $DProduct; } ?></h3>
              <p>Total Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="<?php echo site_url('Admin/ItemInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php if(isset($DContract)) { echo $DContract; } ?></h3>
              <p>AMC Contracts</p>
            </div>
            <div class="icon">
              <i class="fa fa-suitcase"></i>
            </div>
            <a href="<?php echo site_url('Admin/AMCContract'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <br>
      <hr>
      <h2> Ticket Information </h2>
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php if(isset($DTickets)) { echo $DTickets; } ?></h3>
              <p> Open Tickets </p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="<?php echo site_url('Admin/TicketInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php if(isset($DprogressTickets)) { echo $DprogressTickets; } ?></h3>
              <p>In Progress Tickets</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-2"></i>
            </div>
            <a href="<?php echo site_url('Admin/CallVisitReport'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php if(isset($DCompletTicket)) { echo $DCompletTicket; } ?></h3>
              <p>Completed Tickets</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-up"></i>
            </div>
            <a href="<?php echo site_url('Admin/CallVisitReport'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php if(isset($DvisitReport)) { echo $DvisitReport; } ?></h3>
              <p>Call Visit Report</p>
            </div>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
           <a href="<?php echo site_url('Admin/CallVisitReport'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php if(isset($DSaleInvoice)) { echo $DSaleInvoice; } ?></h3>
              <p>Sale Invoices</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="<?php echo site_url('Admin/SaleInvoice'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <br>
      <hr>
      <br>
      <div class="row">
        <div class="col-lg-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">AMC Contract Info List</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Sr No.</th>
                    <th>AMC Type</th>
                    <th>Contract Ref No</th>
                    <th>Party Group</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($AMCContract)){ foreach ($AMCContract as $k) { ?>
                      <tr>
                        <td> <?php echo $k['AMC_contract_ref_no']; ?> </td>
                        <td> <?php echo $k['amc_type']; ?> </td>
                        <td> <?php echo $k['contract_ref_no']; ?> </td>
                        <td> <?php echo $k['party_name']; ?> </td>
                        <td> 
                          <a href="<?php echo site_url('Admin/AMCContract/AMCContractEdit/').$k['contract_id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                          <a href="<?php echo site_url('Admin/AMCContract/AMCContractDelete/').$k['contract_id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tickets For Assignment</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table no-margin">
                  <thead>
                  <tr>
                    <th>Ticket No</th>
                    <th>Date</th>
                    <th>Party Name</th>
                    <th>Allocate Engineer</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; if(!empty($TicketInfo)){ foreach ($TicketInfo as $k) { ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $k['create_date']; ?> </td>
                        <td> <?php echo $k['name']; ?> </td>
                        <td> 
                          <div class="input-group" id="AddEngineer">
                            <?php if($k['engineer_id'] == null){ ?>  
                              <a href="#" class="allocat_eng" name="<?php echo $k['id'] ?>" data-toggle="modal" data-target="#modal-default"> not allocate </a>
                            <?php } else { ?>
                              <a href="#" class="allocat_eng" name="<?php echo $k['id'] ?>" data-toggle="modal" data-target="#modal-default"> <b> <?php echo $k['engineer_name']; ?> </b> </a>
                            <?php } ?> 
                          </div> 
                        </td>
                      </tr>
                    <?php $i++;} } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#3c8dbc; color:#ffffff;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#ffffff;" >
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Allocate Engineer </h4>
          </div>
          <div class="modal-body">
            <form action="" method="POST" accept-charset="utf-8">
              <div class="box-body">
                <div class="row col-md-12">    
                  <div class="form-group">
                    <input type="hidden" class="ServiceId" name="ServiceId" id="ServiceId" value="">
                    <label class="control-label"> Allocate Engineer <label class="text-red">*</label> </label>
                    <div id="engineerAdd"></div>    
                    <label class="text-red" id="error_name">  </label>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" id="save_e"> Save </button>
                  </div>
                </div>                      
              </div>
            </form>            
          </div>  
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
  $(".allocat_eng").click(function(){
    var id = $(this).attr('name');
    $(".ServiceId").val(id);

    $.ajax({
      url: '<?php echo base_url(); ?>Admin/TicketInfo/Check_engineer',
      type: "POST",
      data: "service_id="+id,
      success: function (result) { 
          if(result != null){
            $('#engineerAdd').html(result);
          }
      }
    }); 
  });

  $("#save_e").click(function(){
    var id = $("#engineer").val();
    if(id == ''){
      $('#error_name').show();
      $('#error_name').html("Allocate Engineer field is required.");
    } else {
      $('#error_name').hide();
      
      var ServiceId = $("#ServiceId").val();
      var EngineerId = $("#engineer").val();

      $.ajax({
        url: '<?php echo base_url(); ?>Admin/TicketInfo/Update_engineer',
        type: "POST",
        data: {"ServiceId":ServiceId,
                "EngineerId":EngineerId},
        success: function (result) {
          window.location.href = "<?php echo base_url().'Admin/Home'; ?>";
        }
      });
    }
  });
</script>      	      	