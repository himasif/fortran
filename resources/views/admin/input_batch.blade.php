<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
  <title>Input Nilai Batch</title>
  <!-- Custom CSS -->
  <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quill/dist/quill.snow.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/extra-libs/multicheck/multicheck.css')}}">
  <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js')}}/1.4.2/respond.min.js')}}"></script>
  <![endif]-->
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css')}} -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="index.html">
            <!-- Logo icon -->
            <b class="logo-icon p-l-10">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" />

            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
              <!-- dark Logo text -->
              <h2>Fortran</h2>
              <!-- <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="light-logo" /> -->

            </span>
            <!-- Logo icon -->
            <!-- <b class="logo-icon"> -->
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <!-- <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="light-logo" /> -->

            <!-- </b> -->
            <!--End Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-left mr-auto">
            <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
              <div class="dropdown-menu dropdown-menu-right user-dd animated">
                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('layouts.menu_bar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Input Nilai Batch</h4>
          </div>
        </div>
      </div>

      <div class="container-fluid">

        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Jadi Gini</h4>
          <p>Menu ini digunakan untuk menginputkan nilai se-angkatan kecuali nim tertentu yang dipisahkan oleh ',' (koma).</p>
          <p>Menu ini sangat beresiko jika anda salah input, karena saya males membuat fitur deletenya.<br> Kalau ada kesalahan input duh males sumpah!!1!1</p>
          <hr>
          <p class="mb-0">Lebih baik menu ini digunakan untuk absensi kehadiran saja</p>
        </div>


        @foreach($kategori as $val)
        <input type="hidden" id="nilai_kategori_{{$val->idKategori}}" value="{{$val->nilai_kategori}}">
        @endforeach
        <div class="card">
          <form class="form-horizontal" method="post">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tanggal <small class="text-muted">dd/mm/yyyy</small></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control date-inputmask" id="date-mask" placeholder="Masukan Tanggal" name="tanggal">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 text-right control-label col-form-label">Kategori</label>
                <div class="col-md-9">
                  <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="kategori" onchange="nilaiValue(this)">
                    <option>Select</option>
                    @foreach($kategori as $val)
                    <option value="{{$val->idKategori}}">{{$val->kategori}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="keterangan"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Nilai</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" placeholder="Masukan Nilai" name="nilai" id="nilai">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Terkecuali (NIM)</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="exception_nim" placeholder="Dipisahkan oleh ','"></textarea>
              </div>
            </div>
            <div class="border-top">
              <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>

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
