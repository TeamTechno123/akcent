<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-dashboard"></i> Dashboard<small>Control panel</small></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-dashboard"></i> Dashboard</li>
      	</ol>
    </section>
    <section class="content">
     	<div class="row">
        	<div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php if(isset($DTotalTickets)) { echo $DTotalTickets; } ?></h3>
                    <p>Total Tickets</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tags"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php if(isset($DOpenTickets)) { echo $DOpenTickets; } ?></h3>
                    <p>Open Tickets</p>
                </div>
                <div class="icon">
                    <i class="fa fa-tag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php if(isset($DInProcessTickets)) { echo $DInProcessTickets; } ?></h3>
                    <p>In Process</p>
                </div>
                <div class="icon">
                    <i class="fa fa-hourglass-2"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php if(isset($DCompletedTickets)) { echo $DCompletedTickets; } ?></h3>
                    <p>Completed Tickets</p>
                </div>
                <div class="icon">
                    <i class="fa fa-thumbs-up"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-xs-6">
              <div class="small-box  bg-blue">
                <div class="inner">
                    <h3><?php if(isset($DPendingCollVisit)) { echo $DPendingCollVisit; } ?></h3>
                    <p>Pending Approval Call Visit</p>
                </div>
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <a href="<?php echo site_url('Technical/CallVisit'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <div class="col-lg-3 col-xs-6">
              <div class="small-box  bg-teal">
                <div class="inner">
                    <h3><?php if(isset($DApprovedCollVisit)) { echo $DApprovedCollVisit; } ?></h3>
                    <p>Approved Call Visit</p>
                </div>
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <a href="<?php echo site_url('Technical/CallVisit'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Ticket Details</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table no-margin">
                    <thead>
                    <tr>
                      <th>Tictet No.</th>
                      <th>Date</th>
                      <th>Party Name</th>
                      <th>Status</th>
                      <th> View </th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($Ticket)){ foreach ($Ticket as $k) { ?>
                        <tr>
                          <td> <?php echo $k['id']; ?> </td>
                          <td> <?php echo $k['create_date']; ?> </td>
                          <td> <?php echo $k['name']; ?> </td>
                          <td> <?php 
                                  if($k['status'] == "open"){
                                    echo "<span class='label label-primary'>Open</span>";
                                  }
                                  if($k['status'] == "allocated"){
                                    echo "<span class='label label-warning'>Allocated</span>";
                                  }
                                  if($k['status'] == "working"){
                                    echo "<span class='label label-info'>Working</span>";
                                  }
                                  if($k['status'] == "complete"){
                                    echo "<span class='label label-success'>Complete</span>";
                                  }
                               ?> 
                          </td>
                          <td> <a href="<?php echo site_url('Technical/Home/TicketInfoView/').$k['id']; ?>" ><i class="fa fa-list-alt"></i></a> </td>
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
                <h3 class="box-title">Call Visit Report</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table id="example2" class="table no-margin">
                    <thead>
                    <tr>
                      <th>Call Visit No.</th>
                      <th>Party Name</th>
                      <th>Status</th>
                      <th> View </th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($DCallVisit)){ foreach ($DCallVisit as $k) { ?>
                        <tr>
                          <td> <?php echo $k['call_visit_no']; ?> </td>
                          <td> <?php echo $k['name']; ?> </td>
                          <td> <?php 
                                  if($k['call_status'] == 'on_process') 
                                  { ?>
                                    <span class="label label-warning">On Process</span>
                                  <?php } 
                                  if($k['call_status'] == 'complete')
                                  { ?>
                                    <span class="label label-success">Complete</span>
                                  <?php } 
                               ?> 
                          </td>
                          <td> <a href="<?php echo site_url('Technical/CallVisit/CallVisitView/').$k['ticket_info_id']; ?>"><i class="fa fa-list-alt"></i></a> </td>
                        </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Sale Invoice</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table id="example2" class="table no-margin">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Sale Invoice No.</th>
                      <th>Machine Serial No.</th>
                      <th>Date</th>
                      <th>Party Name</th>
                      <th>Net Amount</th>
                      <th> View </th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($DSaleInvoice)){ $i = 1; foreach ($DSaleInvoice as $k) { ?>
                        <tr>
                          <td> <?php echo $i; ?> </td>
                          <td> <?php echo $k['bill_no']; ?> </td>
                          <td>
                            <?php
                              $SerialArray = explode(", ",$k['machine_serial_no']);
                              if($SerialArray !== null){
                                foreach ($SerialArray as $s) {
                                  $Machine_no = $this->Technical_model->DMachineSerialNo($s);
                                  echo $Machine_no[0]['serial_no']; ?>
                                  <br>
                              <?php }
                              }
                            ?>
                          </td>
                          <td> <?php echo $k['date']; ?> </td>
                          <td> <?php echo $k['name']; ?> </td>
                          <td> <?php echo $k['total_net_amt']; ?> </td>
                          <td> <a href="<?php echo site_url('Technical/SaleInvoice/SaleInvoiceView/').$k['id']; ?>"><i class="fa fa-list-alt"></i></a> </td>
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
</div>        	      	