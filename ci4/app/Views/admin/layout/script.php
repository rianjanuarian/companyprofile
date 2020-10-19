<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('admin') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Data Table -->
<script src="<?= base_url('admin') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('admin') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('admin') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('admin') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('admin') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('admin') ?>/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('admin') ?>/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('admin') ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('admin') ?>/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('admin') ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('admin') ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('admin') ?>/plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- PAGE SCRIPTS -->
<script src="<?= base_url('admin') ?>/dist/js/pages/dashboard2.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>