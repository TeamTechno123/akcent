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
           This Item Info Used In Party Wise Rate
        </div>
      <div class="row">
    		<div class="col-md-12">
          <div class="box box-info">
          	<div class="box-header with-border">
          		<h3 class="box-title"><i class="fa fa-list"></i> List-info </h3>
          		<div class="box-tools pull-right">
                <a href="<?php echo site_url('Admin/ItemInfo/AddInfo'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a> 
             </div>
        		</div>
		        <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th> Item Name </th>
                    <th> HSN </th>
                    <th> Item Company </th>
                    <th> Item Group </th>
                    <th> Tax Slab </th>
                    <th> Unixt </th>
                    <th> Sale Price </th>
                    <th> MRP </th>
                    <th> Warranty </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($ItemInfo as $d) { ?>
                    <tr>
                      <td> <?php echo $d['item_name']; ?> </td>
                      <td> <?php echo $d['HSN']; ?> </td>
                      <td> <?php echo $d['item_company_info_name']; ?> </td>
                      <td> <?php echo $d['group_name']; ?> </td>
                      <td> <?php echo $d['taxslab_name']; ?> </td>
                      <td> <?php echo $d['unit_name']; ?> </td>
                      <td> <?php echo $d['sale_price']; ?> </td>
                      <td> <?php echo $d['mrp']; ?> </td>
                      <td> <?php echo $d['warranty']; ?> </td>
                      <td align="center"> 
                        <a href="<?php echo site_url('Admin/ItemInfo/EditItemInfo/').$d['id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="<?php echo site_url('Admin/ItemInfo/DeleteItemInfo/').$d['id']; ?>" onclick="return confirm('Delete Confirm');"><i class="fa fa-trash"></i></a>
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