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
    <p style="text-align:center; font-size:17px; text-transform: uppercase;"> <b>Call Visit Report</b>  </p>
  </div>
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

      p{
        margin-bottom: 0px;
      }

    </style>

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
      p{
        margin-bottom: 0px;
      }

    </style>


    <td   colspan="6" >
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
    <tr>
      <td colspan="3"  >  <p> <b>CSR No</b>  : <?php echo $SaleInvoice[0]['call_visit_no']; ?></p>
        </td>
        <td colspan="3"  >  <p> <b>Date</b>  : <?php echo $SaleInvoice[0]['reported_date']; ?> </p>
          </td>
    </tr>
    <tr>
      <td colspan="6" class="">
        <p> <b>Party Name</b>  : <?php echo $CheckParty[0]['name']; ?> </p>
        <p> <b>Party Address</b>  : <?php echo $CheckParty[0]['address']; ?> </p>
      </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right:0px!important;">  <p> <b>Status Of Call</b>   : <?php echo $SaleInvoice[0]['call_status']; ?> </p>
        </td>
        <td Width="50%" colspan="3" style="">  <p> <b>Ticket Reference no</b>  : <?php echo $SaleInvoice[0]['ticket_info_id']; ?> </p>
          </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right:0px!important;">   <p> <b>Model No</b> . <?php echo $GetMachine[0]['model_no']; ?> </p>
        </td>
        <td Width="50%" colspan="3" style="">  <p> <b>Reported By Name & Contact No</b>  : <?php echo $datas[0]['content_name']." / ". $datas[0]['content_no'] ; ?> </p>
          </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right:0px!important;">    <p> <b>Machine Serial No</b> . <?php echo $GetMachine[0]['serial_no']; ?></p>
        </td>
        <td Width="50%" colspan="3" style=""> <p> <b>Equipment Type</b>  :  <?php echo $Item[0]['group_name']; ?></p>
          </td>
    </tr>
    <tr>
      <td colspan="6" class="">   <p> <b>Problem Reported</b>  : <?php echo $datas[0]['problem_info']; ?> </p>
        </td>
    </tr>

    <tr>
      <td Width="50%" colspan="3" style="border-right: 2px solid #555!important;" >    <p> <b>Problem Info</b>  : <?php echo $Getproblem_info; ?></p>
        </td>
        <td Width="50%" colspan="3" > <p> <b>Rectification</b>  :  <?php echo $pro_info_rec_data; ?> </p>
          </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right: 2px solid #555!important;" >    <p> <b>Remark Any</b>  : </p>
        </td>
        <td Width="50%" colspan="3" > <p> <b>Approved By</b>  :   </p>
          </td>
    </tr>

    <tr>
      <td Width="50%" colspan="3" class="" style="border-right:0px!important;">  <p> <b>Customer Name</b>  :  </p>
        </td>
      <td Width="50%" colspan="3" class="" style="">   <p> <b>Engineer Name</b>  : <?php echo $datas[0]['engineer_name']; ?>  </p>
            </td>
    </tr>

    <tr>
      <td Width="50%" colspan="3" class="" style="border-right:0px!important;">  <p> <b>Sign Of Customer</b>  :  </p>
        </td>
      <td Width="50%" colspan="3" class="" style="">  <p> <b>Sign of Engineer</b>  :   </p>
            </td>
    </tr>



  </table> <br> <hr style="border-top: 1px dashed #000;">

  <div class="row">
    <p style="text-align:center; font-size:17px; text-transform: uppercase;"> <b>Call Visit Report</b>  </p>
  </div>
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

      p{
        margin-bottom: 0px;
      }

    </style>

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
      p{
        margin-bottom: 0px;
      }

    </style>


    <td   colspan="6" >
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
    <tr>
      <td colspan="3"  >  <p> <b>CSR No</b>  : <?php echo $SaleInvoice[0]['call_visit_no']; ?></p>
        </td>
        <td colspan="3"  >  <p> <b>Date</b>  : <?php echo $SaleInvoice[0]['reported_date']; ?> </p>
          </td>
    </tr>
    <tr>
      <td colspan="6" class="">
        <p> <b>Party Name</b>  : <?php echo $CheckParty[0]['name']; ?> </p>
        <p> <b>Party Address</b>  : <?php echo $CheckParty[0]['address']; ?> </p>
      </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right:0px!important;">  <p> <b>Status Of Call</b>   : <?php echo $SaleInvoice[0]['call_status']; ?> </p>
        </td>
        <td Width="50%" colspan="3" style="">  <p> <b>Ticket Reference no</b>  : <?php echo $SaleInvoice[0]['ticket_info_id']; ?> </p>
          </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right:0px!important;">   <p> <b>Model No</b> . <?php echo $GetMachine[0]['model_no']; ?> </p>
        </td>
        <td Width="50%" colspan="3" style="">  <p> <b>Reported By Name & Contact No</b>  : <?php echo $datas[0]['content_name']." / ". $datas[0]['content_no'] ; ?> </p>
          </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right:0px!important;">    <p> <b>Machine Serial No</b> . <?php echo $GetMachine[0]['serial_no']; ?></p>
        </td>
        <td Width="50%" colspan="3" style=""> <p> <b>Equipment Type</b>  :  <?php echo $Item[0]['group_name']; ?></p>
          </td>
    </tr>
    <tr>
      <td colspan="6" class="">   <p> <b>Problem Reported</b>  : <?php echo $datas[0]['problem_info']; ?> </p>
        </td>
    </tr>

    <tr>
      <td Width="50%" colspan="3" style="border-right: 2px solid #555!important;" >    <p> <b>Problem Info</b>  : <?php echo $Getproblem_info; ?></p>
        </td>
        <td Width="50%" colspan="3" > <p> <b>Rectification</b>  :  <?php echo $pro_info_rec_data; ?> </p>
          </td>
    </tr>
    <tr>
      <td Width="50%" colspan="3" style="border-right: 2px solid #555!important;" >    <p> <b>Remark Any</b>  : </p>
        </td>
        <td Width="50%" colspan="3" > <p> <b>Approved By</b>  :   </p>
          </td>
      <!-- <td colspan="6" class="">   <p> <b></b>  : </p>
        </td> -->
    </tr>

    <tr>
      <td Width="50%" colspan="3" class="" style="border-right:0px!important;">  <p> <b> Customer Name</b>  :  </p>
        </td>
      <td Width="50%" colspan="3" class="" style="">   <p> <b>Engineer Name</b>  : <?php echo $datas[0]['engineer_name']; ?>  </p>
            </td>
    </tr>

    <tr>
      <td Width="50%" colspan="3" class="" style="border-right:0px!important;">  <p> <b>Sign Of Customer</b>  :  </p>
        </td>
      <td Width="50%" colspan="3" class="" style="">  <p> <b>Sign of Engineer</b>  :   </p>
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
