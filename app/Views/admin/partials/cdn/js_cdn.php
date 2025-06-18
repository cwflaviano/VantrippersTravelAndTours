<!-- jQuery (load only once!) -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>?v=<?= time() ?>"></script>

<!-- jQuery UI (needed for sortable, bridge needed for AdminLTE) -->
<script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js') ?>?v=<?= time() ?>"></script>
<script>
  // Prevent conflict between jQuery UI and Bootstrap
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 4 Bundle (AdminLTE 3 uses Bootstrap 4, not 5!) -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>?v=<?= time() ?>"></script>

<!-- Charts & Visualization -->
<script src="<?= base_url('plugins/chart.js/Chart.min.js') ?>?v=<?= time() ?>"></script>
<script src="<?= base_url('plugins/sparklines/sparkline.js') ?>?v=<?= time() ?>"></script>
<script src="<?= base_url('plugins/jquery-knob/jquery.knob.min.js') ?>?v=<?= time() ?>"></script>

<!-- Date & Time -->
<script src="<?= base_url('plugins/moment/moment.min.js') ?>?v=<?= time() ?>"></script>
<script src="<?= base_url('plugins/daterangepicker/daterangepicker.js') ?>?v=<?= time() ?>"></script>
<script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>?v=<?= time() ?>"></script>

<!-- Editors & UI Enhancers -->
<script src="<?= base_url('plugins/summernote/summernote-bs4.min.js') ?>?v=<?= time() ?>"></script>
<script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>?v=<?= time() ?>"></script>

<!-- AdminLTE Core -->
<script src="<?= base_url('dist/js/adminlte.js') ?>?v=<?= time() ?>"></script>

<!-- Optional: Dashboard Script (uncomment if used) -->
<!-- <script src="<?= base_url('dist/js/pages/dashboard.js') ?>?v=<?= time() ?>"></script> -->

<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
