<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Fortran {{ \Config::get('app.angkatan')}}</title>
  <!-- Custom CSS -->
  <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <link rel="icon" href="{{asset('img/logo.jpg')}}" type="image/gif" sizes="16x16">

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
              <img src="{{asset('img/logo.jpg')}}" alt="homepage" class="light-logo" width="45px"/>

            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text mt-3">
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
                <a class="dropdown-item" href="/logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
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

      <!-- THIS IS THE BODY -->

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4>Nama : {{$mahasiswa->nama}}</h4>
                <h4>NIM : {{$mahasiswa->nim}}</h4>
                <h4>Kelompok : {{App\Kelompok::find($mahasiswa->idKelompok)->namaKelompok}}</h4>
                <h4>Nilai : {{$mahasiswa->nilaiAkhir}}</h4>
                <br>

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Nilai</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($nilais as $nilai)
                    <tr>
                      <td>{{$nilai->tanggal}}</td>
                      <td>{{App\Kategori::find($nilai->idKategori)->kategori}}</td>
                      <td>{{$nilai->keterangan}}</td>
                      <td>{{$nilai->nilai}}</td>
                      <td>
                        <form class="" action="/admin/mahasiswa/{{$mahasiswa->nim}}" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="id" value="{{$nilai->idNilai}}">
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
  <script src="{{asset('dist/js/pages/chart/chart-page-init.js')}}"></script>

</body>

</html>
