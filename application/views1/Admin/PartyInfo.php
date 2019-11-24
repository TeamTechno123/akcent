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
          		<h3 class="box-title"><i class="fa fa-list"></i> List-info </h3>
          		<div class="box-tools pull-right">
                <a href="<?php echo site_url('Admin/Party/AddPartyInfo'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a> 
             </div>
        		</div>
		        <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Group Name </th>
                    <th> Name </th>
                    <th> Address </th>
                    <th> mobile 1 </th>
                    <th> mobile 2 </th>
                    <th> Email id </th>
                    <th> Website </th>
                    <th> PAN No </th>
                    <th> GST No </th>
                    <th> Contact person </th>
                    <th> Contact No </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($party_info as $d) { ?>
                    <tr>
                      <td> <?php echo $d['party_name']; ?> </td>
                      <td> <?php echo $d['name']; ?> </td>
                      <td> <?php echo $d['address']; ?> </td>
                      <td> <?php echo $d['mobile_1']; ?> </td>
                      <td> <?php echo $d['mobile_2']; ?> </td>
                      <td> <?php echo $d['email']; ?> </td>
                      <td> <?php echo $d['website']; ?> </td>
                      <td> <?php echo $d['pan_no']; ?> </td>
                      <td> <?php echo $d['gst_no']; ?> </td>
                      <td> <?php echo $d['party_contact_person_name']; ?> </td>
                      <td> <?php echo $d['party_contact_no']; ?> </td>
                      <td align="center"> 
                        <a href="<?php echo site_url('Admin/Party/EditPartyInfo/').$d['id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="<?php echo site_url('Admin/Party/DeletePartyInfo/').$d['id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
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