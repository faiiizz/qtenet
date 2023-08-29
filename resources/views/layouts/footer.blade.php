<footer class="main-footer">
    <strong></strong>
    <div class="float-right d-none d-sm-inline-block">
        <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <b>Qte-net kafe</b>
    </div>
</footer>
</div>

<script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

<!--Sweetalert -->
{{-- @include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard3.js"></script>
</body>

</html>
