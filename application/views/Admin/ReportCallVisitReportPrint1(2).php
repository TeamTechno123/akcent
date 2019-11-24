<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Call Visit Report</title>
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
  <table class="table table-bordered mb-0 invoice-table">
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
      <td colspan="1" style="border-right:0px!important;">
        <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">
      </td>
      <td align="center" colspan="3" style="border-right:0px!important; border-left:0px!important;">
         <h3> <?php echo $GetCmpInfo['name']; ?></h3>
         <p> Address: <?php echo $GetCmpInfo['address']; ?></p>
         <p> Mobile No: <?php echo $GetCmpInfo['mobile_no_1']; ?> </p>
         <p> Gst No: <?php echo $GetCmpInfo['gst_no']; ?>  </p>
      </td>
      <td  colspan="2" style="border-left:0px!important; text-align:right!important;">
        <br><br><br><br><br><br><br>
         <p> Mo.: <?php echo $GetCmpInfo['mobile_no_1']; ?>   &nbsp;&nbsp;</p>
         <p> Mo.: <?php echo $GetCmpInfo['mobile_no_2']; ?>   &nbsp;&nbsp;</p>
        <br>
      </td>
    </tr>
    <tr>
      <td colspan="3"  >  <p>CSR No : <?php echo $SaleInvoice[0]['call_visit_no']; ?></p>
        </td>
        <td colspan="3"  >  <p>Date : <?php echo $SaleInvoice[0]['reported_date']; ?> </p>
          </td>
    </tr>
    <tr>
      <td colspan="6" class="">  
        <p>Party Name : <?php echo $CheckParty[0]['name']; ?> </p><br>
        <p>Party Address : <?php echo $CheckParty[0]['address']; ?> </p><br>
      </td>
    </tr>
    <tr>
      <td colspan="3" style="border-right:0px!important;">  <p> Status Of Call : <?php echo $SaleInvoice[0]['call_status']; ?> </p>
        </td>
        <td colspan="3" style="border-left:0px!important;">  <p>Ticket Reference no : <?php echo $SaleInvoice[0]['ticket_info_id']; ?> </p>
          </td>
    </tr>
    <tr>
      <td colspan="3" style="border-right:0px!important;">   <p>Model No. <?php echo $GetMachine[0]['model_no']; ?> </p>
        </td>
        <td colspan="3" style="border-left:0px!important;">  <p>Reported By Name & Contact No : <?php echo $datas[0]['content_name']." / ". $datas[0]['content_no'] ; ?> </p>
          </td>
    </tr>
    <tr>
      <td colspan="3" style="border-right:0px!important;">    <p>Machine Serial No. <?php echo $GetMachine[0]['serial_no']; ?></p>
        </td>
        <td colspan="3" style="border-left:0px!important;"> <p>Equipment Type :  <?php echo $Item[0]['group_name']; ?></p>
          </td>
    </tr>
    <tr>
      <td colspan="6" class="">   <p>Problem Reported : <?php echo $datas[0]['problem_info']; ?> </p>
        </td>
    </tr>

    <tr>
      <td colspan="3" style="border-right: 2px solid #555!important;" >    <p>Problem Info : <?php echo $Getproblem_info; ?></p>
        </td>
        <td colspan="3" > <p>Rectification :  <?php echo $pro_info_rec_data; ?> </p>
          </td>
    </tr>
    <tr>
      <td colspan="6" class="">   <p>Remark Any : </p>
        </td>
    </tr>

    <tr>
      <td colspan="3" class="" style="border-right:0px!important;">  <p>Name :  </p>
        </td>
      <td colspan="3" class="" style="border-left:0px!important;">   <p>Engineer Name : <?php echo $datas[0]['engineer_name']; ?>  </p>
            </td>
    </tr>

    <tr>
      <td colspan="3" class="" style="border-right:0px!important;">  <p>Sign Of Customer :  </p>
        </td>
      <td colspan="2" class="" style="border-left:0px!important;">  <p>Sign of Engineer :   </p>
            </td>
    </tr>



  </table>

  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>
