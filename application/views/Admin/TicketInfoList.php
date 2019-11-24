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
    	<div class="callout callout-danger" id="delete_info" style="display: none;">
        <h4>Delete Warning !</h4>
           This Party Used In Call Visit Report
      </div>
      <div class="row">
    		<div class="col-md-12">
          <div class="box box-info">
          	<div class="box-header with-border">
          		<h3 class="box-title"><i class="fa fa-list"></i> List <?php echo $this->session->userdata('submenu'); ?> </h3>
          		<div class="box-tools pull-right">
                <a href="<?php echo site_url('Admin/TicketInfo/TicketInfoAdd'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a> 
             </div>
        		</div>
		        <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Ticket Info Name  </th>
                    <th> Allocate Engineer </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datas as $d) { ?>
                    <tr>
                      <td> <?php echo $d['problem_info']; ?> </td>
                      <td> 
                        <div class="input-group" id="AddEngineer">
                          <?php if($d['engineer_id'] == null){ ?>  
                            <a href="#" class="allocat_eng" name="<?php echo $d['id'] ?>" data-toggle="modal" data-target="#modal-default"> not allocate </a>
                          <?php } else { ?>
                            <a href="#" class="allocat_eng" name="<?php echo $d['id'] ?>" data-toggle="modal" data-target="#modal-default"> <?php echo $d['engineer_name']; ?> </a>
                          <?php } ?> 
                        </div>
                      </td>
                      <td align="center"> 
                        <a href="<?php echo site_url('Admin/TicketInfo/TicketInfoEdit/').$d['id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="<?php echo site_url('Admin/TicketInfo/TicketInfoDelete/').$d['id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
                      </td>            
                  <?php } ?>
                </tbody>
              </table>
			    	</div>
				</div>
			</div>
		</div>
	</section>
  <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header" style="background-color:#3c8dbc; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#ffffff;" >
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Allocate Engineer </h4>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" accept-charset="utf-8">
                    <div class="box-body">
                      <div class="row col-md-12">    
                          <div class="form-group">
                            <input type="hidden" class="ServiceId" name="ServiceId" id="ServiceId" value="">
                              <label class="control-label"> Allocate Engineer <label class="text-red">*</label> </label>
                               <div id="engineerAdd">

                              </div>    
                              <label class="text-red" id="error_name">  </label>
                          </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" id="save_e"> Save </button>
                  </div>
                      </div>                      
                  </div>
              </form>            
                  </div>  
              </div>
          </div>
        </div>
</div> 
<script type="text/javascript">
  $(document).ready(function() {    
    <?php if($this->session->userdata('delete_msg')){ ?>
      $('#delete_info').show();
    <?php } ?>
    setTimeout(function() { 
      $('#delete_info').fadeOut('fast');
    }, 4000);
    <?php $this->session->unset_userdata('delete_msg'); ?>
  });
</script>
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

  $(".allocat_eng").click(function(){
    var id = $(this).attr('name');
    $(".ServiceId").val(id);

    $.ajax({
      url: '<?php echo base_url(); ?>Admin/TicketInfo/Check_engineer',
      type: "POST",
      data: "service_id="+id,
      success: function (result) { 
          if(result != null){
            $('#engineerAdd').html(result);
          }
      }
    }); 
  });

  $("#save_e").click(function(){
    var id = $("#engineer").val();
    if(id == ''){
      $('#error_name').show();
      $('#error_name').html("Allocate Engineer field is required.");
    } else {
      $('#error_name').hide();
      
      var ServiceId = $("#ServiceId").val();
      var EngineerId = $("#engineer").val();

      $.ajax({
        url: '<?php echo base_url(); ?>Admin/TicketInfo/Update_engineer',
        type: "POST",
        data: {"ServiceId":ServiceId,
                 "EngineerId":EngineerId},
        success: function (result) {
            window.location.href = "<?php echo base_url().'Admin/TicketInfo'; ?>";
        }
      });
    }
  });
</script>