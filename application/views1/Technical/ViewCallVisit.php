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
          		<h3 class="box-title"><i class="fa fa-list"></i> List <?php echo $this->session->userdata('submenu'); ?> </h3>
          		<div class="box-tools pull-right">
                
             </div>
        		</div>
		        <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Date </th>
                    <th> Ticket Info Name  </th>
                    <th> Engineer Name </th>
                    <th> Status </th>
                    <th> Approve </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(isset($datas)) { foreach ($datas as $d) { ?>
                    <tr>
                      <td> <?php echo $d['create_date']; ?> </td>
                      <td> <?php echo $d['problem_info']; ?> </td>
                      <td> 
                        <div class="input-group" id="AddEngineer">
                          <?php if($d['engineer_id'] == null){ ?> Not Allocate <?php } else { ?> <?php echo $d['engineer_name']; ?>
                          <?php } ?> 
                        </div>
                      </td>
                      <td> <?php if($d['call_status'] == 'on_process') { echo "On Process"; } if($d['call_status'] == 'complete') { echo "Complete"; } ?> </td>
                      <td> <?php if($d['approve'] == 0) { echo " Not Approve "; } ?> </td>
                      <td align="center"> 
                          <a href="<?php echo site_url('Technical/CallVisit/CallVisitEdit/').$d['ticket_info_id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                          <a href="<?php echo site_url('Technical/CallVisit/CallVisitView/').$d['id']; ?>"><i class="fa fa-list-alt"></i></a>
                      </td>            
                  <?php } } ?>
                </tbody>
              </table>
			    	</div>
				</div>
			</div>
		</div>
	</section>
</div> 
</script>