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
    		<div class="pad margin no-print">
		      <div class="callout callout-info" style="margin-bottom: 0!important;">
		        <h4><i class="fa fa-info"></i> Note:</h4>
		        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
		      </div>
		    </div>
    		<div class="col-md-12">
          		<div class="box box-info">
            		<div class="box-header with-border">
              			<h3 class="box-title"><i class="fa fa-print"></i> Receipt Report </h3>
            		</div>
			        <div class="box-body table-responsive" id="printPDF">
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
						        <tr>

						          <td colspan="4">
                        <div class="" style="text-align:center;">
                                        <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:26px; margin-top: 0px; margin-bottom: 5px;font-weight:bold; text-transform:uppercase;" > <?php echo $GetCmpInfo['name']; ?></h3>
                                        <p style="margin-bottom:5px; line-height:20px;  font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;" > <b> <?php echo $GetCmpInfo['address']; ?></b> </p>
                                        <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile No: <?php echo $GetCmpInfo['mobile_no_1']; ?> &nbsp; | &nbsp; Email : <?php echo $GetCmpInfo['email']; ?> </p>
                                        <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No: <?php echo $GetCmpInfo['gst_no']; ?> &nbsp; | &nbsp; Website : <?php echo $GetCmpInfo['website']; ?> </p>
                    <!-- <p style="margin-bottom:5px; text-align: right; padding-top: 10px;font-family: Calibri, Candara, Segoe, 'Segoe UI';" > Mo.: <?php echo $GetCmpInfo['mobile_no_1']; ?>   &nbsp; | &nbsp; Mo.: <?php echo $GetCmpInfo['mobile_no_2']; ?>   </p> -->
                          </div>
						          </td>

						        </tr>
                    <tr>
                      <td colspan="2"  >  <p> <b>Receipt No.</b>  : <?php echo $datas[0]['receipt_no']; ?></p>
                        </td>
                        <td colspan="2"  >  <p> <b>Date</b>  : <?php echo $datas[0]['date']; ?></p>
                          </td>
                    </tr>
						        <tr>
                      <td colspan="1" class=" no-right-border">  <p> <b> Party Details :</b> </p>
                        </td>
                      <td colspan="3" class=" no-left-border">
                        <p > <b><?php echo $CheckParty[0]['name']; ?></b> </p> <p> <b> <?php echo $CheckParty[0]['address']; ?> </b></p>
                         </td>
						        </tr>
                    <tr>
                      <td colspan="2"  >  <p> <b>Amount in Words</b>  : <span style="font-size:15px!important; font-weight:bold; line-height:18px;"><?php echo $receipt_amt_words; ?></span>  </p>
                        </td>
                        <td colspan="2"  >  <p> <b>Amount</b>  : <b>  &#8377; <?php echo $datas[0]['receipt_amt']; ?> </b></p>
                          </td>
                    </tr>
                    <tr>
                      <td colspan="1" class=" no-right-border"> <p> <b>Payment Against : </b> </p>

                        </td>

                        <td colspan="3" class=" no-left-border">
                          <p style="font-size:16px;">  <?php foreach ($SelectBills as $k) {
                                              echo $k ?>
                                              <br>
                                            <?php } ?> </p>
                          </td>

                    </tr>

                    <tr>
                      <td colspan="2" class=" no-right-border text-left">
                        <br>
                          <br>
                          <p> <small>Receiver Signature</small> </p>
                        </td>
                        <td colspan="2" class=" no-left-border text-right">

                            <p> <b>For <?php echo $GetCmpInfo['name']; ?></b></p>
                            <br>
                            <p> <small>Auth. Signatory</small> </p>
                          </td>

                    </tr>
						      </table>

						      <br><br>
						      <!-- title row -->


						      <!-- this row will not appear when printing -->
						      <div class="row no-print">
						        <div class="col-xs-12">
						          <a href="<?php echo site_url('Admin/Report/ReceiptReportPrint1/').$id; ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Print
						          </a>
						          <!-- <a href="<?php echo site_url('Admin/Report/ReceiptReportPrintPDF/').$id; ?>">
						          	<button id="cmd" type="button"  class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="javascript:demoFromHTML();">
						            	<i class="fa fa-download"></i> Generate PDF
						          	</button>
						          </a> -->
						        </div>
						      </div>
						    </section>
					</div>
			    </div>
			</div>
     	</div>
    </section>
</div>
