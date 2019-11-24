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
						              <!-- <div class="col-md-4">
						                  <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">
						              </div> -->
						              <div class="col-md-12 text-center">
                            <div class="" style="float:left;">
                              <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">

                            </div>
						               	<h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:36px; font-weight:bold; text-transform:uppercase;"> <?php echo $GetCmpInfo['name']; ?></h3>
						                <p style="line-height:20px; font-family: Calibri, Candara, Segoe, 'Segoe UI';" >  <b> <?php echo $GetCmpInfo['address']; ?></b> </p>
                            <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile No: <?php echo $GetCmpInfo['mobile_no_1']; ?> &nbsp; | &nbsp; Email : <?php echo $GetCmpInfo['email']; ?> </p>
                            <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No: <?php echo $GetCmpInfo['gst_no']; ?> &nbsp; | &nbsp; Website : <?php echo $GetCmpInfo['website']; ?> </p>
                             <!-- <p style="font-family: Calibri, Candara, Segoe, 'Segoe UI';">   </p> -->
						              </div>
						            </div>
						          </td>

						        </tr>
						        <tr>
						          <td>   To
						              <address>
						                <strong><?php echo $PartyGroup[0]['party_name']; ?></strong><br>
						                <strong><?php if($CheckParty[0]['name'] !== '') { echo $CheckParty[0]['name']; } ?></strong><br>
						               <b>Address</b> : <?php echo $CheckParty[0]['address']; ?><br>
						               <b>Phone</b> : <?php echo $CheckParty[0]['mobile_1']; ?><br>
						               <b>Email</b> : <?php echo $CheckParty[0]['email']; ?><br>
                           <b>GSTIN</b>   : <?php echo $CheckParty[0]['gst_no']; ?><br>
						              </address>
						          </td>
						          <td>
						          <p><b>Invoice No.: <?php echo $old_bill_no; ?> </b></p>
						          <p> <b>Date: </b> <?php echo $date; ?> </p>
						          <p> <b>Contract Ref No:</b> <?php echo $CheckAmcContract[0]['contract_ref_no']; ?> </p>
						          <p> <b>Payee Code: </b> <?php echo $GetCmpInfo['lic_no2']; ?> </p>
						          <p> <b>State Code: </b>&nbsp; 27</p>
                      <p> <b>PAN </b> : AVQPJ0603H  </p>
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
						            .invoice-tbl-2 th, .invoice-tbl-2 td{
						              border: 2px solid #555!important;
						              border-top: 0px!important;

						            }
						            .pull-right{
						              float: right!important;
						            }

						        </style>
						        <tr>
						          <th style="width: 10px; text-align:center;">S.No.</th>
						          <th style="text-align:center;">ITEM DESCRIPTION</th>
						          <th style="text-align:center;">GST %</th>
						          <th style="text-align:center;" >QTY</th>
						          <th style="text-align:center;" >RATE</th>
						          <th style="text-align:center;" >AMOUNT</th>
						        </tr>
						        <?php $i = 1; $total_my=0; foreach ($GetSaleItem as $k) {

                      $k['rate1']= $k['rate']-($k['rate'] * (100/(100+18)));
                    $rate_final= $k['rate']-(number_format((float)$k['rate1'], 2, '.', ''));
                      $k['amt1']= $k['amt']-($k['amt'] * (100/(100+18)));
                    $amount_final= $k['amt']-(number_format((float)$k['amt1'], 2, '.', ''));

                      ?>
							        <tr>
							          <td style="text-align:center;"><?php echo $i; ?></td>
							          <td style="text-align:left;"><?php echo $k['item_name']; ?></td>
							          <td style="text-align:center;"><?php echo $k['gst']." %"; ?></td>
							          <td style="text-align:center;"><?php echo $k['qty']." ". $k['unit_name']; ?></td>
							          <td style="text-align:center;"><?php echo $rate_final; ?></td>
							          <td style="text-align:center;"><?php echo $amount_final; ?></td>
							        </tr>
							    <?php $i++;
                      $total_my=$total_my+$amount_final;
                } ?>
						      <tr>
                        <?php $roundup= $total_net_amt-($total_gst_amt+$total_my);
                      $roundup1=  (number_format((float)$roundup, 2, '.', ''));
                        ?>
						        <td style="height:50px;" colspan="3"> <p style="text-transform:capitalize;"> Bill Amount In Words :  <b><?php echo $bill_words; ?></b></p> </td>
						        <td style="height:150px;" colspan="3" rowspan="3">
						        <p> <b>Total Before Tax</b>  <span class="pull-right"> <b><?php echo $total_my;  ?></b> </span> </p>

						        <p> <b>SGST 9%  </b>  <span class="pull-right"> <b> <?php echo $tex = $total_gst_amt/2; ?> </b> </span></p>
						        <p> <b>CGST 9%  </b>  <span class="pull-right"> <b> <?php echo $tex = $total_gst_amt/2; ?> </b> </span></p>

						        <p> <b>Total GST: </b>  <span class="pull-right"> <b><?php echo $total_gst_amt; ?></b> </span></p>

                    <p> <b>Round Up: </b>  <span class="pull-right"> <b><?php echo $roundup1; ?></b> </span></p>


						        <hr>
						      <h5><b> GRAND TOTAL <span class="pull-right"> <b><?php echo $total_net_amt; ?></b> </span> </b> </h5>
						        <hr>
						        <p style="text-align:right; padding-right:20px;"> <b>For <?php echo $GetCmpInfo['name']; ?></b></p>
						        <br><br>
						        <p style="text-align:right; padding-right:20px;"> Authorised signatory</p>
						         </td>
						      </tr>
						      <tr>
						        <td style="height:50px;" colspan="3"> <p style="text-transform:capitalize;"> Total Gst Amount In Words : <b><?php echo $gst_words; ?></b> </p> </td>

						      </tr>
						      <tr>
						        <td  colspan="3">
						          	<b> Terms : </b><br>
						          		1)No Warranty on physical damage & burnouts.<br>
										2)Warranty as per authorized service center.<br>
									<b> Declaration : </b><br>
									<p> We declare that this invoice shows the actual price of the goods described and that all
									particulars are true and correct </p>
                  <p style="margin-bottom:3px;"><b> Bank Details: </b></p>
                  <p style="margin-bottom:3px;">Bank Name : <b>HDFC Bank, Kudal</b>   </p>
                  <p style="margin-bottom:3px;">A/C No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  <b>50200025345757</b> </p>
                  <p style="margin-bottom:3px;">IFSC Code &nbsp;&nbsp; :  <b>HDFC0002494</b>  </p>
                  <p style="margin-bottom:3px; text-align:right; padding-right:10px;">Customer Signature </p>





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
