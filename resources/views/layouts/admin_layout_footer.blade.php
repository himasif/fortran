
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        Created by Mediatek <a href="https://github.com/himasif">Himasif</a>
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="{{asset('assets/libs/popper.js')}}/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
  <!--Wave Effects -->
  <script src="{{asset('dist/js/waves.js')}}"></script>
  <!--Menu sidebar -->
  <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
  <!--Custom JavaScript -->
  <script src="{{asset('dist/js/custom.min.js')}}"></script>
  <!--This page JavaScript -->
  <!-- <script src="{{asset('dist/js/pages/dashboards/dashboard1.js')}}"></script> -->
  <!-- Charts js Files -->
  <script src="{{asset('assets/libs/flot/excanvas.js')}}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.js')}}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
  <script src="{{asset('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
  <script src="{{asset('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
  <script src="{{asset('dist/js/pages/mask/mask.init.js')}}"></script>
  <script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
  <script src="{{asset('assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
  <script src="{{asset('assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
  <script src="{{asset('assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
  <script src="{{asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/libs/quill/dist/quill.min.js')}}"></script>
  <script src="{{asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
  <script src="{{asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
  <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
  <script src="{{asset('js/nilai.js')}}"></script>
  <script>
  //***********************************//
  // For select 2
  //***********************************//
  $(".select2").select2();

  /*colorpicker*/
  $('.demo').each(function() {
    //
    // Dear reader, it's actually very easy to initialize MiniColors. For example:
    //
    //  $(selector).minicolors();
    //
    // The way I've done it below is just for the demo, so don't get confused
    // by it. Also, data- attributes aren't supported at this time...they're
    // only used for this demo.
    //
    $(this).minicolors({
      control: $(this).attr('data-control') || 'hue',
      position: $(this).attr('data-position') || 'bottom left',

      change: function(value, opacity) {
        if (!value) return;
        if (opacity) value += ', ' + opacity;
        if (typeof console === 'object') {
          console.log(value);
        }
      },
      theme: 'bootstrap'
    });

  });
  /*datwpicker*/
  jQuery('.mydatepicker').datepicker();
  jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true
  });
  var quill = new Quill('#editor', {
    theme: 'snow'
  });

  $('#zero_config').DataTable();

  </script>

</body>

</html>
