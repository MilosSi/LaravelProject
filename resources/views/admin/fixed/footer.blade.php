<footer class="main-footer">
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.2
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset("admin/plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("admin/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- Sparkline -->
<script src="{{asset("admin/plugins/sparklines/sparkline.js")}}"></script>

<!-- jQuery Knob Chart -->
<script src="{{asset("admin/plugins/jquery-knob/jquery.knob.min.js")}}"></script>
<!-- daterangepicker -->

<script src="{{asset("admin/plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset("admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>

<!-- overlayScrollbars -->
<script src="{{asset("admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("admin/dist/js/adminlte.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset("admin/dist/js/pages/dashboard.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("admin/dist/js/demo.js")}}"></script>

<!-- DataTables -->
<script src="{{asset("admin/plugins/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}"></script>
      <!-- page script -->
     <script>
        $(function () {
          $("#example1").DataTable();
          $('#example2').DataTable({
               "paging": true,
               "lengthChange": false,
               "searching": false,
              "ordering": true,
               "info": true,
             "autoWidth": false,
          })
      })
    </script>

<!-- Custom -->
<script src="{{asset("admin/js/main.js")}}"></script>
</body>
</html>
