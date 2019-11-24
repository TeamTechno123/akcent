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
              			<h3 class="box-title"><i class="fa fa-print"></i> Sale Invoice Report </h3>
            		</div>
			        <div class="box-body table-responsive">
			        	<section class="invoice" id="printableArea">
							<table class="table table-bordered mb-0 invoice-table">
						        <style media="screen">
						          .invoice-table td{
						            Width:33% !important;
						              border: 2px solid #555!important;
						          }
						          .invoice-table{
						            margin-bottom:0px;
						            border: 2px solid #555!important;
						          }
						          .invoice-table p{
						            line-height: 15px;
						          }
						        </style>
						        <tr>

						          <td colspan="3">
						            <div class="row">
						              <div class="col-md-4">
						                  <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">
						              </div>
						              <div class="col-md-4 offset-md-4 text-center">
						               	<h3> <?php echo $GetCmpInfo['name']; ?></h3>
						                <p> Address: <?php echo $GetCmpInfo['address']; ?></p>
						                <p> Mobile No: <?php echo $GetCmpInfo['mobile_no_1']; ?> </p>
						                <p> Gst No: <?php echo $GetCmpInfo['gst_no']; ?>  </p>
						              </div>
						            </div>
						          </td>

						        </tr>
						        <tr>
						          <td>   To
						              <address>
						                <strong><?php echo $PartyGroup[0]['party_name']; ?></strong><br>
						                <strong><?php if($CheckParty[0]['name'] !== '') { echo $CheckParty[0]['name']; } ?></strong><br>
						                Address: <?php echo $CheckParty[0]['address']; ?><br>
						                Phone: <?php echo $CheckParty[0]['mobile_1']; ?><br>
						                Email: <?php echo $CheckParty[0]['email']; ?><br>
						              </address>
						          </td>
						          <td>
						          <p><b>Invoice No.: <?php echo $old_bill_no; ?> </b></p>
						          <p> <b>Date: </b> <?php echo $date; ?> </p>
						          <p> <b>Contract Ref No:</b> <?php echo $CheckAmcContract[0]['contract_ref_no']; ?> </p>
						          <p> <b>Payee Code: </b> <?php echo $GetCmpInfo['lic_no2']; ?> </p> 
						          <p> <b>State Code: </b>&nbsp; 27</p>
						          </td>
						        </tr>
						        <tr>
						        	<td colspan="2"> <b> MACHINE S/N: </b> <?php echo $SerialNum; ?> </td>
						        </tr>
						      </table>

						      <table class="table table-bordered invoice-tbl-2">
						        <style media="screen">
						          .invoice-tbl-2{
						          margin-top:0px;
						          padding-top:0px;
						          border-top:0px;
						          border: 2px solid #555!important;
						          border-top: 0px!important;
						          }
						            .invoice-tbl-2 th, td{
						              border: 2px solid #555!important;
						              border-top: 0px!important;
						            }
						            .pull-right{
						              float: right!important;
						            }

						        </style>
						        <tr>
						          <th style="width: 10px">S.No.</th>
						          <th>ITEM DESCRIPTION</th>
						          <th>GST %</th>
						          <th >QTY</th>
						          <th >RATE</th>
						          <th >AMOUNT</th>
						        </tr>
						        <?php $i = 1; foreach ($GetSaleItem as $k) { ?>
							        <tr>
							          <td><?php echo $i; ?></td>
							          <td><?php echo $k['item_company_info_name']." - ".$k['item_name']." (".$k['group_name'].") "; ?></td>
							          <td><?php echo $k['gst']." %"; ?></td>
							          <td><?php echo $k['qty']; ?></td>
							          <td><?php echo $k['rate']; ?></td>
							          <td><?php echo $k['amt']; ?></td>
							        </tr>
							    <?php $i++;} ?>
						      <tr>
						        <td style="height:50px;" colspan="3"> <p> Bill Amount In Words :  <b><?php echo $bill_words; ?></b></p> </td>
						        <td style="height:150px;" colspan="3" rowspan="3">
						        <p>Total Before Tax <span class="pull-right"> <b><?php echo $total_basic_amt; ?></b> </span> </p>
						       
						        <p> <b>SGST 9%  </b>  <span class="pull-right"> <b> <?php echo $tex = $total_gst_amt/2; ?> </b> </span></p>
						        <p> <b>CGST 9%  </b>  <span class="pull-right"> <b> <?php echo $tex = $total_gst_amt/2; ?> </b> </span></p>

						        <p> <b>Total GST: </b>  <span class="pull-right"> <b><?php echo $total_gst_amt; ?></b> </span></p>
						        <hr>
						      <h5><b> GRAND TOTAL <span class="pull-right"> <b><?php echo $total_net_amt; ?></b> </span> </b> </h5>
						        <hr>
						        <p style="text-align:right; padding-right:20px;"> <b>For <?php echo $GetCmpInfo['name']; ?></b></p>
						        <br><br>
						        <p style="text-align:right; padding-right:20px;"> Auth. signatory</p>
						         </td>
						      </tr>
						      <tr>
						        <td style="height:50px;" colspan="3"> <p> Total Gst Amount In Words : <b><?php echo $gst_words; ?></b> </p> </td>

						      </tr>
						      <tr>
						        <td  colspan="3">
						          	<b> TERMS: </b><br>
						          		1)No Warranty on physical damage & burnouts.<br>
										2)Warranty as per authorized service center.<br>
									<b> DECLARATION: </b><br>
									<p> We declare that this invoice shows the actual price of the goods described and that all
									particulars are true and correct </p>


						        </td>

						      </tr>


						      </table>

						      <br><br>
						      <!-- title row -->


						      <!-- this row will not appear when printing -->
						      <div class="row no-print">
						        <div class="col-xs-12">
						          <a href="<?php echo site_url('Admin/Report/InvoiceReportPrint1/').$id; ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Print
						          </a>
						          <button id="cmd" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
						            <i class="fa fa-download"></i> Generate PDF
						          </button>
						        </div>
						      </div>
						    </section>
					</div>
			    </div>
			</div>        
     	</div>	
    </section>
</div>