<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
            		<a href="<?php echo site_url('Party/TicketInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
	            	<a href="<?php echo site_url('Party/TicketInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
	            	<a href="<?php echo site_url('Party/TicketInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            		<a href="<?php echo site_url('Party/TicketInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          		</div>
        	</div>
          <div class="col-lg-3 col-xs-6">
              <div class="small-box  bg-blue">
                <div class="inner">
                    <h3><?php if(isset($DCollVisitReprort)) { echo $DCollVisitReprort; } ?></h3>
                    <p>Call Visit Reprort</p>
                </div>
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <a href="<?php echo site_url('Party/TicketInfo'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
        </div>
         <br>
        <br>
        <div class="row">
        <div class="col-lg-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
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
                    <th> Ticket No </th>
                    <th> Date </th>
                    <th> Machine Sr. No. </th>
                    <th> Equipment Type </th>
                    <th> Call Visit Report No. </th>
                    <th> Engineer Name </th>
                    <th> Status </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($table)){ $i = 1; foreach ($table as $k) { ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $k['id']; ?> </td>
                        <td> <?php echo $k['create_date']; ?> </td>
                        <td> <?php echo $k['serial_no']; ?> </td>
                        <td> <?php echo $k['group_name']; ?> </td>
                        <td> <?php echo $k['call_visit_no']; ?> </td>
                        <td> <?php echo $k['engineer_name']; ?> </td>
                        <td> <?php 
                               if($k['call_status'] == "on_process"){
                                echo "<span class='label label-info'>On Process</span>";
                               }
                               if($k['call_status'] == "complete"){
                                echo "<span class='label label-success'> Complete </span>";
                               }
                             ?> 
                        </td>
                      </tr>
                    <?php $i++;} } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>        	      	