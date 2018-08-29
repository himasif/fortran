<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>FORTRAN 2016</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta property="og:title" content="">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Styles -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">

  <script src="js/modernizr-2.7.1.js"></script>

</head>

<body>


  <div class="navbar navbar-inverse navbar-fixed-top hidden-xs hidden-sm">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="logo" href="index.html"><h3 class="white">FORTRAN|For the Registered Generation</h3></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#pricing" class="scroll"><a href="#">HIMASIF|BEM|Universitas jember</a></li>
        </ul>
      </div><!--/.navbar-collapse -->
    </div>
  </div>

  <header>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <a href="index.html"><h3 class="wow fadeIn white">FORTRAN|For the Registered Generation</h3></a>
        </div>
        <div class="col-xs-6 signin text-right navbar-nav">
          <a href="#pricing" class="scroll"><a href="#">HIMASIF|BEM|Universitas jember</a>
        </div>
      </div>

      <div class="row2 header-info">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <div class="container white">
            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
              <h3 class="white">INDIVIDU</h3>
              <hr class="line purple">
              <table class="text-left">
                @foreach($kategori_individu as $kategori)
                <tr>
                  <td>{{$kategori->kategori}} : {{$nilai_kategori[$kategori->idKategori]}}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.8s">
              <h3 class="white">KELOMPOK</h3>
              <hr class="line white">
              <table class="text-left">
                @foreach($kategori_kelompok as $kategori)
                <tr>
                  <td>{{$kategori->kategori}} : {{$nilai_kategori[$kategori->idKategori]}}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <div class="col-sm-4 wow fadeIn" data-wow-delay="1.2s">
              <h3 class="white">ANGKATAN</h3>
              <hr  class="line yellow">
              <table class="text-left">
                @foreach($kategori_angkatan as $kategori)
                <tr>
                  <td>{{$kategori->kategori}} : {{$nilai_kategori[$kategori->idKategori]}}</td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-md-offset-5 col-sm-6 col-sm-offset-1">
              <div class="col-xs-2 text-center wow fadeInUp" data-wow-delay="1.4s">
                <a href="{{url('/')}}" class="btn btn-primary btn-lg">Back to Home</a>
              </div>
              <div class="row1">
              </div><!--End Button Row-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  @php
  $i=1
  @endphp
  <div class="mouse-icon hidden-xs">
    <div class="scroll"></div>
  </div>

  <section id="press" class="pad-sm">
      <div class="container">
        <div class="col-md-12">
          <table class="table table-responsive">
            <thead>
              <th>No</th>
              <th>Tanggal</th>
              <th>Kategori</th>
              <th>Asal Nilai</th>
              <th>Keterangan</th>
              <th>Nilai</th>
            </thead>
            <tbody>
              @foreach($data as $value)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$value->tanggal}}</td>
                <td>{{App\Kategori::find($value->idKategori)->kategori}}</td>
                @if($value->idKategori <= 13)
                <td>Individu</td>
                @elseIf($value->idKategori <= 17)
                <td>Kelompok</td>
                @else
                <td>Angkatan</td>
                @endIf
                <td>{{$value->keterangan}}</td>
                <td>{{$value->nilai}}</td>
              </tr>
              @endForeach
            </tbody>
          </table>
          <div class="col-md-12 text-center bg-faded">
            <h1 style="color:black;">SCORE ANDA : {{$final["score"]}}</h1>
            <div class="row">
              Dengan nilai akhir {{$final["nilai"]}}
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">

        <div class="row margin-30 news-container">
          <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
            <!-- <a href="#" target="_blank"> -->
            <!-- <img class="news-img pull-left" src="img/press-01.jpg" alt="Tech Crunch"> -->
            <p class="black">Perbedaan bukan memecahkan, namun dari perbedaan bisa muncul sebuah kebersamaan, keakraban, dan keharmonisan. Dan itu akan kamu wujudkan dalam FORTRAN 2016<br />
            <small><em>-Motto Bersama-</em></small></p>
            </a>
          </div>
        </div>

        <div class="row margin-30 news-container">
          <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
            <a href="#" target="_blank"><!--
            <img class="news-img pull-left" src="img/press-02.jpg" alt="Forbes"> -->
            <p class="black">Kalian mewakili potensi besar yang memiliki kemampuan untuk merubah dunia menjadi Luar Biasa<br />
            <small><em>-Anonim-</em></small></p>
            </a>
          </div>
        </div>

      </div>
    </section>


  <footer>
    <div class="container">

      <div class="row">
        <div class="col-sm-8 margin-20">
          <ul class="list-inline social">
            <li>Connect with us on</li>
            <li><a href="http://www.twitter.com/himasifpssi"><i class="fa fa-twitter"></i></a></li>
            <li><a href="http://www.facebook.com/himasif.unej"><i class="fa fa-facebook"></i></a></li>
            <li><a href="http://www.instagram.com/himasif"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>

        <div class="col-sm-4 text-right">
          <p><small>Copyright &copy; 2016. All rights reserved. <br>
            Created by <a href="http://www.facebook.com/himasif.unej">Mediatek|HIMASIF</a></small></p>
          </div>
        </div>

      </div>
    </footer>


    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>


  </body>
  </html>
