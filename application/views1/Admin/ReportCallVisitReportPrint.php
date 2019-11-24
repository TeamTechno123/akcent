<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
    	<div class="row">
    		<!-- <div class="pad margin no-print">
		      <div class="callout callout-info" style="margin-bottom: 0!important;">
		        <h4><i class="fa fa-info"></i> Note:</h4>
		        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
		      </div>
		    </div> -->
    		<div class="col-md-12">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-print"></i> Call Visit Report </h3>
            		</div>
			        <div class="box-body table-responsive">
			        	<section class="invoice" id="printableArea">
							<table class="table table-bordered mb-0 invoice-table">
						        <style media="screen">
						          .invoice-table td{
						            Width:33% !important;
						              border: 2px solid #555!important;
						          }
						          .invoice-table .small{
						            Width:15% !important;
						              border: 2px solid #555!important;
						          }
						          .invoice-table .large{
						            Width:85% !important;
						              border: 2px solid #555!important;
						          }
						          .invoice-table{
						            margin-bottom:0px;
						            border: 2px solid #555!important;
						          }
						          .invoice-table p{
						            line-height: 15px;
						          }
						          .invoice-table .no-right-border{
						          border-right: 0px!important;
						          }
						          .invoice-table .no-left-border{
						          border-left: 0px!important;
						          }
						          .invoice-table .no-top-border{
						          border-top: 0px!important;
						          }
						          .invoice-table .no-bottom-border{
						          border-bottom: 0px!important;
						          }
								</style>
						        <!-- <tr>
						          	<td colspan="3">
						            <div class="row">
						              <div class="col-md-4">
						                  <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">
						              </div>
						              <div class="col-md-4  text-center">
						                <h3> <?php echo $GetCmpInfo['name']; ?></h3>
						                <p> Address: <?php echo $GetCmpInfo['address']; ?></p>
						                <p> Mobile No: <?php echo $GetCmpInfo['mobile_no_1']; ?> </p>
						                <p> Gst No: <?php echo $GetCmpInfo['gst_no']; ?>  </p>
						              </div>
						              <div class="col-md-4 text-right">
						              <br><br><br><br><br><br><br><br>
						              <p> Mo.: <?php echo $GetCmpInfo['mobile_no_1']; ?>  &nbsp;&nbsp;</p>
						              <p> Mo.: <?php echo $GetCmpInfo['mobile_no_2']; ?>  &nbsp;&nbsp;</p>
						              </div>
						            </div>
						          </td>

						        </tr> -->

                    <tr>

						          <td colspan="3">
						            <div class="row">
						              <!-- <div class="col-md-4">
						                  <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">
						              </div> -->
						              <div class="col-md-12 text-center">
                            <div class="" style="float:left;">
                              <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">

                            </div>
						               	<h3 style="font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size:36px; font-weight:bold; text-transform:uppercase;"> <?php echo $GetCmpInfo['name']; ?></h3>
						                <p style="line-height:20px; font-family: Calibri, Candara, Segoe, 'Segoe UI';" >  <b> <?php echo $GetCmpInfo['address']; ?></b> </p>
						                <p style="font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> Mobile No: <?php echo $GetCmpInfo['mobile_no_1']; ?> &nbsp; | &nbsp; GST No: <?php echo $GetCmpInfo['gst_no']; ?>  </p>
						               <!-- <p style="margin-bottom:5px; text-align: right; padding-top: 10px;font-family: Calibri, Candara, Segoe, 'Segoe UI';" > Mo.: <?php echo $GetCmpInfo['mobile_no_1']; ?>   &nbsp; | &nbsp; Mo.: <?php echo $GetCmpInfo['mobile_no_2']; ?>   </p> -->
						              </div>
						            </div>
						          </td>

						        </tr>
						        <tr>
						          <td colspan="3" style="padding-top:0px!important;padding-bottom:0px!important;">
						            <div class="row">
						              <div class="col-md-6" style="border-right: 2px solid #555!important;">
						                <br>
						              <p> <b> CSR No.</b> <?php echo $SaleInvoice[0]['call_visit_no']; ?></p>
						              <br>
						              </div>
						              <div class="col-md-6" >
						                <br>
						              <p> <b>Date</b>  : <?php echo $SaleInvoice[0]['reported_date']; ?> </p>
						              <br>
						              </div>
						            </div>
						            </td>

						        </tr>
						        <tr>
						          <td colspan="3">
						            <br>
						            <p> <b>Party Name</b>  : <?php echo $CheckParty[0]['name']; ?> </p>
						            <p> <b>Party Address</b>  : <?php echo $CheckParty[0]['address']; ?> </p>
						            </td>
						        </tr>
						  <tr>
						        <td colspan="3" style="padding-top:0px!important;padding-bottom:0px!important;">
						          <div class="row">
						            <div class="col-md-6" style="border-right: 2px solid #555!important;">
						              <br>
						            <p> <b>Status Of Call</b>   : <?php echo $SaleInvoice[0]['call_status']; ?> </p>
						            <br>
						            </div>
						            <div class="col-md-6" >
						              <br>
						            <p> <b>Ticket Reference no</b>  : <?php echo $SaleInvoice[0]['ticket_info_id']; ?> </p>
						            <br>
						            </div>
						          </div>
						          </td>

						      </tr>
						        <tr>
						      <td colspan="3" style="padding-top:0px!important;padding-bottom:0px!important;">
						        <div class="row">
						          <div class="col-md-6" style="border-right: 2px solid #555!important;">
						            <br>
						          <p> <b>Model No</b> . <?php echo $GetMachine[0]['model_no']; ?> </p>
						          <br>
						          </div>
						          <div class="col-md-6" >
						            <br>
						          <p> <b> Reported By Name & Contact No</b>  : <?php echo $datas[0]['content_name']." / ". $datas[0]['content_no'] ; ?> </p>
						          <br>
						          </div>
						        </div>
						        </td>

						    </tr>
						      <tr>
						    <td colspan="3" style="padding-top:0px!important;padding-bottom:0px!important;">
						      <div class="row">
						        <div class="col-md-6" style="border-right: 2px solid #555!important;">
						          <br>
						        <p> <b>Machine Serial No</b> . <?php echo $GetMachine[0]['serial_no']; ?></p>
						        <br>
						        </div>
						        <div class="col-md-6" >
						          <br>
						        <p> <b>Equipment Type</b>  :  <?php echo $Item[0]['group_name']; ?></p>
						        <br>
						        </div>
						      </div>
						      </td>
						  </tr>

						  <tr class="">
						    <td colspan="3" class="">
						      <br>
						      <p> <b>Problem Reported</b>  : <?php echo $datas[0]['problem_info']; ?> </p>
						      <br>
						      </td>
						  </tr>

						  <tr>
						<td colspan="3" style="padding-top:0px!important;padding-bottom:0px!important;">
						  <div class="row">
						    <div class="col-md-6" style="border-right: 2px solid #555!important;">
						      <br>
						    <p> <b>Problem Info</b>  : <?php echo $Getproblem_info; ?></p>
						    <br>
						    </div>
						    <div class="col-md-6" >
						      <br>
						    <p> <b>Rectification</b>  :  <?php echo $pro_info_rec_data; ?> </p>
						    <br>
						    </div>
						  </div>
						  </td>
						</tr>

						<tr class="">
						  <td colspan="3" class="">
						    <br>
						    <p> <b>Remark Any</b>  : </p>
						    <br>
						    </td>
						</tr>

						<tr>
						<td colspan="3" style="padding-top:0px!important;padding-bottom:0px!important;">
						<div class="row">
						  <div class="col-md-6">
						    <br>
						  <p> <b>Name</b>  : </p>
						  <br>
						  </div>
						  <div class="col-md-6" >
						    <br>
						  <p> <b> Engineer Name</b> : <?php echo $datas[0]['engineer_name']; ?>  </p>
						  <br>
						  </div>
						</div>
						</td>
						</tr>
						<tr>
						<td colspan="3" style="padding-top:0px!important;padding-bottom:0px!important;">
						<div class="row">
						  <div class="col-md-6" >
						    <br>
						  <p> <b>Sign of Customer</b>  : </p>
						  <br>
						  </div>
						  <div class="col-md-6" >
						    <br>
						  <p> <b>  Sign of Engineer</b> :   </p>
						  <br>
						  </div>
						</div>
						</td>
						</tr>

						      </table>

						      <br><br>
						      <!-- title row -->


						      <!-- this row will not appear when printing -->
						      <div class="row no-print">
						        <div class="col-xs-12">
						          <a href="<?php echo site_url('Admin/Report/CallVisitReportPrint1/').$id; ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Print
						          </a>
						          <!-- <button id="cmd" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
						            <i class="fa fa-download"></i> Generate PDF
						          </button> -->
						        </div>
						      </div>
						    </section>
					</div>
			    </div>
			</div>
     	</div>
    </section>
</div>
