<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);?>

<div class="content-wrapper">
    <section class="content-header">
      	<h1><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('submenu'); ?></h1>
      	<ol class="breadcrumb">
        	<li><i class="fa fa-fw fa-users"></i> <?php echo $this->session->userdata('topmenu'); ?></li>
        	<li><?php echo $this->session->userdata('submenu'); ?></li>
      	</ol>
    </section>
    <section class="content">
    	<div class="row">
    		<div class="col-md-12">
          <div class="box box-info">
          	<div class="box-header with-border">
          		<h3 class="box-title"><i class="fa fa-list"></i> List Technical User Info </h3>
          		<div class="box-tools pull-right">
                <a href="<?php echo site_url('Admin/TechnicalUser/TechnicalUserAdd'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a> 
             </div>
        		</div>
		        <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Party Group </th>
                    <th> Party Name </th>
                    <th> Name </th>
                    <th> Address </th>
                    <th> Mobile No </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datas as $d) { ?>
                    <tr>
                      <td> <?php echo $d['party_name']; ?> </td>
                      <td> <?php echo $d['party_info_name']; ?> </td>                
                      <td> <?php echo $d['name']; ?> </td>
                      <td> <?php echo $d['address']; ?> </td>
                      <td> <?php echo $d['mobile_no']; ?> </td>
                      <td> 
                        <?php if($d['status'] == 1) { ?>
                          <a href="#"><span id="<?php echo $d['id']; ?>" class="label label-success Approved approve">Approved</span></a>
                        <?php } else { ?>
                          <a href="#"><span id="<?php echo $d['id']; ?>" class="label label-danger Denied approve">Denied</span></a>
                        <?php } ?>
                      </td>
                      <td align="center"> 
                        <a href="<?php echo site_url('Admin/TechnicalUser/TechnicalUserEdit/').$d['id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="<?php echo site_url('Admin/TechnicalUser/TechnicalUserDelete/').$d['id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
                      </td>            
                  <?php } ?>
                </tbody>
              </table>
			    	</div>
				</div>
			</div>
		</div>
	</section>
</div> 
<script type="text/javascript">
  $(".approve").on("click", function(){
    var id = $(this).attr('id');
    var Approved = $(this).hasClass("Approved");
    if(Approved){
      var check = 0;
    } else { 
      var check = 1;
    }

    $.ajax({
      url:'<?php echo base_url(); ?>Admin/TechnicalUser/CheckApproveCoupon',
      method:"POST",
      data:{  "id":id,
          "check":check},
      success:function(result)
      {
        window.location.replace("<?php echo site_url('Admin/TechnicalUser'); ?>");
      }
    });
  });
</script>