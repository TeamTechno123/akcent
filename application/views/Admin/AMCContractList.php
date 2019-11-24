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
           This AMC Contract is Used Other Model 
        </div>
      <div class="row">
    		<div class="col-md-12">
          <div class="box box-info">
          	<div class="box-header with-border">
          		<h3 class="box-title"><i class="fa fa-list"></i> List-AMC Contract </h3>
          		<div class="box-tools pull-right">
                <a href="<?php echo site_url('Admin/AMCContract/AMCContractAdd'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a> 
             </div>
        		</div>
		        <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Contract No </th>
                    <th> Contract Date </th>
                    <th> Party Name </th>
                    <th> Amc Type </th>
                    <th> Start Date </th>
                    <th> End Date </th>
                    <th> contract Ref No </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datas as $d) { ?>
                    <tr>
                      <td> <?php echo $d['AMC_contract_ref_no']; ?> </td>
                      <td> <?php echo $d['contract_date']; ?> </td>
                      <td> <?php echo $d['party_name']; ?> </td>
                      <td> <?php echo $d['amc_type']; ?> </td>
                      <td> <?php echo date_format(date_create($d['contract_start_date']),"d-m-Y"); ?> </td>
                      <td> <?php echo date_format(date_create($d['contract_end_date']),"d-m-Y"); ?> </td>
                      <td> <?php echo $d['contract_ref_no']; ?> </td>
                      <td align="center"> 
                        <a href="<?php echo site_url('Admin/AMCContract/AMCContractEdit/').$d['contract_id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="<?php echo site_url('Admin/AMCContract/AMCContractDelete/').$d['contract_id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
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
