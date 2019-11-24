<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Tax Invoice</title>
   <style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 7mm;  /* this affects the margin in the printer settings */
    }
    </style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('files/dist/css/AdminLTE.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body >
<div class="wrapper">
  <!-- Main content -->
  <h4 align="center"> Sale Invoice </h4>
  <table class="table table-bordered mb-0 invoice-table" id="teb">
    <style media="print">
      .invoice-table td {
        Width:33% !important;

      }
      .invoice-table ,tr, td, th{
          border: 1px solid #555!important;
      }
      .invoice-table{
        margin-bottom:0px!important;
        border: 1px solid #555!important;
        padding-bottom:0px!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .pull-right{
        float: right!important;
      }
      hr{
          border-top: 1px solid #555!important;
      }
    </style>
    <tr>
      <td colspan="1" style="border-right:0px!important;">
             <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">
      </td>
      <td  colspan="2" style="border-left:0px!important;">
          <h3> <?php echo $GetCmpInfo['name']; ?></h3>
          <table >
            
          </table>
                          <p> <b>   Address:   </b> <?php echo $GetCmpInfo['address']; ?></p>
                          <p> <b>   Mobile No: </b> <?php echo $GetCmpInfo['mobile_no_1']; ?> </p>
                          <p> <b>   Gst No:    </b> <?php echo $GetCmpInfo['gst_no']; ?>  </p>
      </td>
    </tr>
    <tr>
      <td>   To
                          <address>
                            <strong><?php echo $PartyGroup[0]['party_name']; ?></strong><br>
                            <strong><?php if($CheckParty[0]['name'] !== '') { echo $CheckParty[0]['name']; } ?></strong><br>
                          <b>  Address: </b> <?php echo $CheckParty[0]['address']; ?><br>
                          <b>  Phone: </b> <?php echo $CheckParty[0]['mobile_1']; ?><br>
                          <b>  Email: </b> <?php echo $CheckParty[0]['email']; ?><br>
                          <b>  GSTIN: </b> <?php echo $CheckParty[0]['gst_no']; ?>
                          </address>
                      </td>
      <td>
                    <p><b>Invoice No.: <?php echo $old_bill_no; ?> </b></p>
                      <p> <b>Date: </b> <?php echo $date; ?> </p>
                      <p> <b>Contract Ref No:</b> <?php echo $CheckAmcContract[0]['contract_ref_no']; ?> </p>
                      <p> <b>Payee Code: </b> <?php echo $GetCmpInfo['lic_no2']; ?> </p> 
                      <p> <b>State Code: </b>&nbsp; 27</p>
                      <p> <b> PAN: </b><?php echo $CheckParty[0]['pan_no']; ?></p>
      </td>
    </tr>
    <tr>
      <td colspan="2"> <b> MACHINE S/N: </b> <?php echo $SerialNum; ?> </td>
    </tr>
  </table>

  <table class="table table-bordered invoice-tbl-2"  width="100%">
    <style media="print">
    /* @media print {
        table{
          margin: 0px;
        }
     } */
      .invoice-tbl-2{
      margin-top:0px;
      padding-top:0px;
      border-top:0px;
      border: 1px solid #555!important;
      border-top: 0px!important;
      margin-top: 0px!important;
      padding-top: 0px!important;
      vertical-align: top;
      }
      hr{
          border-top: 1px solid #555!important;
      }
        .invoice-tbl-2 tr, th, td{
          border: 1px solid #555!important;
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
      <th style="width: 65px">QTY</th>
      <th >RATE</th>
      <th >AMOUNT</th>
    </tr>
    <?php $i = 1; foreach ($GetSaleItem as $k) { ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $k['item_name']//." (".$k['group_name'].") "; ?></td>
                        <td><?php echo $k['gst']." %"; ?></td>
                        <td><?php echo $k['qty']." ".$k['unit_name']; ?></td>
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
    <p style="text-align:center;"> <b>For <?php echo $GetCmpInfo['name']; ?></b></p>
    <br><br>

  </tr>
  <tr>
    <td style="height:50px;"  colspan="3"> <p> Total Gst Amount In Words : <b><?php echo $gst_words; ?></b> </p> </td>

  </tr>
  <tr>
    <td   colspan="3">
      <b> Terms:</b><br>
         <p> We declare that this invoice shows the actual price of the goods described and that all
                  particulars are true and correct </p>
      <b> Declaration:</b><br>
          1)No Warranty on physical damage & burnouts.<br>
          2)Warranty as per authorized service center.<br><br>

          <b> Bank Details: </b> <br>
          <b> Bank Name </b> : HDFC Bank <br>
          <b> A/C No. </b>   : 50200025345757  <br>
          <b> Branch & IFSC Code </b> : Kudal & HDFC0002494 <br>
    </td>

  </tr>

  </table>
<center> This is a Computer Generated Invoice </center>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<script type="text/javascript">
  window.print("table");
</script>
</body>
</html>
