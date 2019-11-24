<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Tax Invoice</title>
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
  <style type="text/css" media="print">
    @page
    {
        size:  auto;   /* auto is the initial value */
        margin: 7mm;  /* this affects the margin in the printer settings */
    }
    </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body >
<div class="wrapper">
  <!-- Main content -->
  <div class="row">
    <p style="text-align:center; font-size:17px; text-transform: uppercase;"> <b>Tax Invoice</b>  </p>
  </div>
  <table class="table table-bordered mb-0 invoice-table">
    <style media="print">
    table, td, th{
    border :1px solid #000;
  }
      .invoice-table td {
        Width:33% !important;

      }
      .invoice-table tr, td, th{
          border: 1px solid #000!important;
      }
      .invoice-table{
        margin-bottom:0px!important;
        border: 1px solid #000!important;
        padding-bottom:0px!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .pull-right{
        float: right!important;
      }
      hr{
          border-top: 1px solid #000!important;
      }
    </style>
    <style media="screen">
      .invoice-table td {
        Width:33% !important;

      }
      .invoice-table tr, td, th{
          border: 1px solid #000!important;
      }
      .invoice-table{
        margin-bottom:0px!important;
        border: 1px solid #000!important;
        padding-bottom:0px!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .pull-right{
        float: right!important;
      }
      hr{
          border-top: 1px solid #000!important;
      }
    </style>
    <tr >
      <!-- <td width="10%" colspan="1" style="border-right:0px!important;">
             <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='100' alt="">
      </td> -->
      <td   colspan="3" >
        <div class="" style="float:left;">
          <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' height='125' alt="">

        </div>
          <div class="" style="text-align:center;">
                          <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:28px; font-weight:bold; text-transform:uppercase;" > <?php echo $GetCmpInfo['name']; ?></h3>
                            <p style="margin-bottom:5px; line-height:20px; padding-left:100px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;" > <b> <?php echo $GetCmpInfo['address']; ?></b> </p>
                            <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile No: <?php echo $GetCmpInfo['mobile_no_1']; ?> &nbsp; | &nbsp; Email : <?php echo $GetCmpInfo['email']; ?> </p>
                            <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No: <?php echo $GetCmpInfo['gst_no']; ?> &nbsp; | &nbsp; Website : <?php echo $GetCmpInfo['website']; ?> </p>
        <!-- <p style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI';" >   </p> -->
            </div>
      </td>
    </tr>
    <tr>
      <td style="padding-bottom:3px;">   To
                          <address>
                            <strong><?php echo $PartyGroup[0]['party_name']; ?></strong><br>
                            <strong><?php if($CheckParty[0]['name'] !== '') { echo $CheckParty[0]['name']; } ?></strong><br>
                           <b>Address</b>   : <?php echo $CheckParty[0]['address']; ?><br>
                          <b>Phone</b>   : <?php echo $CheckParty[0]['mobile_1']; ?><br>
                          <b>Email</b>   : <?php echo $CheckParty[0]['email']; ?><br>
                          <b>GSTIN</b>   : <?php echo $CheckParty[0]['gst_no']; ?>
                          </address>
                      </td>
      <td>
                    <p><b>Invoice No. : <?php echo $old_bill_no; ?> </b></p>
                      <p> <b>Date : </b> <?php echo $date; ?> </p>
                      <p> <b>Contract Ref No : </b> <?php echo $CheckAmcContract[0]['contract_ref_no']; ?> </p>
                      <p> <b>Payee Code : </b> <?php echo $GetCmpInfo['lic_no2']; ?> </p>
                      <p> <b>State Code : </b>&nbsp; 27</p>
                      <p> <b>PAN </b> : AVQPJ0603H  </p>
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
      border: 1px solid #000!important;
      border-top: 0px!important;
      margin-top: 0px!important;
      padding-top: 0px!important;
      vertical-align: top;
      }
      hr{
          border-top: 1px solid #000!important;
      }
        .invoice-tbl-2 tr, th, td{
          border: 1px solid #000!important;
          border-top: 0px!important;
        }
        .pull-right{
          float: right!important;
        }

    </style>
    <style media="screen">
    /* @media print {
        table{
          margin: 0px;
        }
     } */
      .invoice-tbl-2{
      margin-top:0px;
      padding-top:0px;
      border-top:0px;
      border: 1px solid #000!important;
      border-top: 0px!important;
      margin-top: 0px!important;
      padding-top: 0px!important;
      vertical-align: top;
      }
      hr{
          border-top: 1px solid #000!important;
      }
        .invoice-tbl-2 tr, th, td{
          border: 1px solid #000!important;
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
      <th style="text-align:center;" Width="9%" >QTY </th>
      <th style="text-align:center;" >RATE</th>
      <th style="text-align:center;" >AMOUNT</th>
    </tr>

    <?php $i = 1; $total_my=0; foreach ($GetSaleItem as $k) { ?>
      <?php
            $k['rate1']= $k['rate']-($k['rate'] * (100/(100+18)));
          $rate_final= $k['rate']-(number_format((float)$k['rate1'], 2, '.', ''));
            $k['amt1']= $k['amt']-($k['amt'] * (100/(100+18)));
          $amount_final= $k['amt']-(number_format((float)$k['amt1'], 2, '.', ''));
       ?>
                      <tr>
                        <td style="text-align:center;"><?php echo $i; ?></td>
                        <td style="text-align:left;"><?php echo $k['item_name']; ?></td>
                        <td style="text-align:center;" > <?php echo $k['gst']." %"; ?></td>
                        <td style="text-align:center;"><?php echo $k['qty']." ". $k['unit_name'];?></td>
                        <td style="text-align:center;"><?php echo  $rate_final; ?></td>
                        <td style="text-align:center;"><?php echo   $amount_final; ?></td>
                      </tr>
                  <?php $i++;
                  $total_my=$total_my+$amount_final;
                 } ?>
  <tr>
    <?php $roundup= $total_net_amt-($total_gst_amt+$total_my);
  $roundup1=  (number_format((float)$roundup, 2, '.', ''));
    ?>
    <td style="height:50px; " colspan="3"> <p style="text-transform:capitalize;"> Bill Amount In Words :  <b><?php echo $bill_words; ?></b></p> </td>
    <td style="height:150px;" colspan="3" rowspan="3">
     <p> <b>Total Before Tax</b> :  <span class="pull-right"> <b><?php echo   $total_my; ?></b> </span> </p>

                    <p> <b>SGST 9%  </b>  <span class="pull-right"> <b> <?php echo $tex = $total_gst_amt/2; ?> </b> </span></p>
                    <p> <b>CGST 9%  </b>  <span class="pull-right"> <b> <?php echo $tex = $total_gst_amt/2; ?> </b> </span></p>

                    <p> <b>Total GST: </b>  <span class="pull-right"> <b><?php echo $total_gst_amt; ?></b> </span></p>

                    <p> <b>Round Up :  </b>  <span class="pull-right"> <b><?php echo $roundup1; ?></b> </span></p>

                    <hr>
                  <h5><b> GRAND TOTAL <span class="pull-right"> <b><?php echo $total_net_amt; ?></b> </span> </b> </h5>
    <hr>
    <p style="text-align:right; padding-right:20px; font-size:12px;"> <b>For <?php echo $GetCmpInfo['name']; ?></b></p>
    <br><br>
    <p style="text-align:right; padding-right:20px;"> Authorised Signatory</p>
     </td>

  </tr>
  <tr>
    <td style="height:50px;"  colspan="3"> <p style="text-transform:capitalize;"> Total Gst Amount In Words : <b><?php echo $gst_words; ?></b> </p> </td>

  </tr>
  <tr>
    <td   colspan="3">
      <b> Terms : </b><br>
                          1)No Warranty on physical damage & burnouts.<br>
                    2)Warranty as per authorized service center.<br>
                  <b> Declaration : </b><br>
                  <p> We declare that this invoice shows the actual price of the goods described and that all
                  particulars are true and correct </p>
                <p style="margin-bottom:3px;"><b> Bank Details: </b></p>
                <p style="margin-bottom:3px;">Bank Name : <b>HDFC Bank, Kudal</b>  </p>
                <p style="margin-bottom:3px;">A/C No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  <b>50200025345757</b> </p>
                <!-- <p style="margin-bottom:3px;">Branch & IFSC Code : Kudal & HDFC0002494 </p>
                <p style="margin-bottom:3px; text-align:right; padding-right:10px;">Customer Signature </p> -->

                <div style="overflow: hidden;">
                  <p style="float: left;margin-bottom:3px;">IFSC Code &nbsp;&nbsp; : <b>HDFC0002494</b> </p>
                  <p style="float: right; margin-bottom:3px; padding-right:20px;">Customer Signature</p>
              </div>


    </td>

  </tr>


  </table>

    <div class="row">
      <p style="text-align:center;"> This is Computer Generated Invoice </p>
    </div>

  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<script type="text/javascript">
  window.print();
</script>
</body>
</html>
