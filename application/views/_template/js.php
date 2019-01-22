<script src="<?php echo base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js') ?>" ></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>" ></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte/bower_components/fastclick/lib/fastclick.js') ?>" ></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte/dist/js/adminlte.min.js') ?>" ></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>" ></script>
<!-- jvectormap  -->
<script src="<?php echo base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" ></script>
<script src="<?php echo base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" ></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>" ></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/adminlte/bower_components/chart.js/Chart.js') ?>" ></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/adminlte/dist/js/pages/dashboard2.js') ?>" ></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/adminlte/dist/js/demo.js') ?>" ></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') ?> "></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?> "></script>
<!-- page script -->
<script>
  $(function () {
    $('#mytable').DataTable()({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>