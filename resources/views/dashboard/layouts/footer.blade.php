<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  @include('dashboard.layouts.aside_control')

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url('/') }}/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/dashboard/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/') }}/dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{ url('/') }}/dashboard/bower_components/raphael/raphael.min.js"></script>
<script src="{{ url('/') }}/dashboard/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('/') }}/dashboard/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ url('/') }}/dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ url('/') }}/dashboard/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/') }}/dashboard/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('/') }}/dashboard/bower_components/moment/min/moment.min.js"></script>
<script src="{{ url('/') }}/dashboard/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ url('/') }}/dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('/') }}/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{ url('/') }}/dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ url('/') }}/dashboard/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/') }}/dashboard/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/dashboard/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="{{ url('/') }}/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Datatables Buttons -->
<script src="{{ url('/') }}/dashboard/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/dashboard/bower_components/datatables.net/js/datetime.js"></script>
<script src="{{url('')}}/vendor/datatables/buttons.server-side.js"></script>

<script>

  function check_all(){

    $('item[class="item_checkbox"]:checkbox').each(function(){

      if($('item[class="check_all"]:checkbox:checked').length == 0 )
      {
        $(this).prop('checked', false);
      }else{
        $(this).prop('checked', true);
      }

    });

  }

</script>

@stack('js')
@stack('css')

</body>
</html>
