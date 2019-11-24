<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Receipt</title>
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
</div>
<body id="pdf">
<div class="wrapper">
  <!-- Main content -->
  <div class="row">
    <p style="text-align:center; font-size:17px;"> <b>RECEIPT</b>  </p>
  </div>
  <table id="example" class="table table-bordered mb-0 invoice-table">
    <style media="print">
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
      <td   colspan="4" >
        <!-- <div class="" style="float:left;">
          <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">

        </div> -->
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

  <br> <hr style="border-top: 1px dashed #000;">

  <div class="row">
    <p style="text-align:center; font-size:17px;"> <b>RECEIPT</b>  </p>
  </div>
  <table id="example" class="table table-bordered mb-0 invoice-table">
    <style media="print">
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
      <td   colspan="4" >
        <!-- <div class="" style="float:left;">
          <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">

        </div> -->
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
      <td colspan="2"  >  <p> <b>Amount in Words</b>  : <span style="font-size:15px!important; font-weight:bold; line-height:18px;"><?php echo $receipt_amt_words; ?></span>   </p>
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

  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.10/jspdf.plugin.autotable.min.js"></script>

<script src="<?php echo base_url('files/dist/tableHTMLExport.js'); ?>"></script>

<script type="text/javascript">
  <?php if(isset($pdf)) { ?>


  var doc = new jsPDF();

  $('#cmd').click(function () {
      doc.fromHTML($('#content').html(), 15, 15, {
          'width': 170,
              'elementHandlers': specialElementHandlers
      });
      doc.save('sample-file.pdf');
  });


  <?php } else { ?>
   window.print();
 <?php } ?>

</script>
</body>
</html>
