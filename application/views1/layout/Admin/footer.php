<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
		    <ul class="nav nav-tabs nav-justified control-sidebar-tabs"> </ul>
		    <div class="tab-content">	
		      	<div class="tab-pane" id="control-sidebar-home-tab"></div>
			</div>
		</aside>
        
  		<div class="control-sidebar-bg"></div>
		<script src="<?php echo base_url('files/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
		<script> $.widget.bridge('uibutton', $.ui.button); </script>
		<script src="<?php echo base_url('files/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/raphael/raphael.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/morris.js/morris.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/moment/min/moment.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
		<script src="<?php echo base_url('files/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
		<script src="<?php echo base_url('files/dist/js/adminlte.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/dist/js/pages/dashboard.js'); ?>"></script>
		<script src="<?php echo base_url('files/dist/js/demo.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('files/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
		<script>
		  $(function () {
		   	$('.select2').select2()

		    $('#example1').DataTable()
		    $('#example2').DataTable({
		      'paging'      : true,
		      'lengthChange': false,
		      'searching'   : false,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : false,
		    })
		  })
		</script>
	</body>
</html>