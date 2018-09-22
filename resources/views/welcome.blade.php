<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>FORTRAN {{ \Config::get('app.angkatan')}}</title>
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
            <li><a href="#pricing" class="scroll"><a href="http://bem.ilkom.unej.ac.id/">BEM|Universitas jember</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <header>

      <div class="bgimg">
        <div class="bgimg-black">
        </div>
      </div>

      <div class="container">

        <div class="row1 header-info">
          <div class="col-sm-10 col-sm-offset-1 text-center">
            <h1 class="wow fadeIn">FORTRAN {{ \Config::get('app.angkatan')}}</h1>
            <br />
            <p class="lead wow fadeIn" data-wow-delay="0.5s">For the Registered Generation</p>
            <br />
            <p class="lead wow fadeIn" data-wow-delay="0.5s">Let's Become Family</p>
            <br />

            <div class="row">
              <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                  <div class="col-xs-6 text-right wow fadeInUp" data-wow-delay="1s">
                    <a href="#be-the-first" class="btn btn-secondary btn-lg scroll">Information</a>
                  </div>
                  <div class="col-xs-6 text-left wow fadeInUp" data-wow-delay="1.4s">
                    <a href="#invite" class="btn btn-primary btn-lg scroll">Check Score</a>
                  </div>
                <div class="row1">
                </div><!--End Button Row-->
              </div>
            </div>

          </div>
        </div>
      </div>
    </header>

    <div class="mouse-icon hidden-xs">
				<div class="scroll"></div>
			</div>

    <section id="be-the-first" class="pad-xl">
	    <div class="container">
		    <div class="row">
			    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
				    <hr class="line purple">
				    <h3 style="text-align: center;">FORTRAN</h3>
				    <p>Salah satu kegiatan pengembangan mahasiswa baru yang bertujuan untuk membentuk karakter mahasiswa baru sehingga menjadi pribadi yang komunikatif, tangguh, kreatif dan inovatif</p>
			    </div>
			    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.8s">
				    <hr  class="line blue">
				    <h3 style="text-align: center;">Family</h3>
				    <p>Tempat dimana kita merasa nyaman dalam segala hal, maka jadikanlah keluarga fasilkom ini menjadi tempat yang nyaman bagi kalian untuk sekedar sharing kuliah dan dalam hal lain</p>
			    </div>
		    </div>
	    </div>
    </section>


    <section id="invite" class="pad-lg light-gray-bg">
      <div class="container">
        @if(session('message'))
        <div class="error-nim">
          <h2 class="error-nim-text">NIM Tidak Ditemukan</h2>
        </div>
        @endif
        <div class="row">

          <div class="col-sm-8 col-sm-offset-2 text-center">
            <i class="fa fa-envelope-o margin-40"></i>
            <h2 class="black">Check your Score!</h2>
            <br />
            <p class="black">You can Do the Best</p>
            <br />

            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form role="form" action="/nilai" method="POST">

                  <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="nim" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Your NIM" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg">Request Score</button>
                </form>
              </div>
            </div><!--End Form row-->
          </div>
        </div>
      </div>
    </section>


    <section id="press" class="pad-sm">
      <div class="container">

        <div class="row margin-30 news-container">
          <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
<!--             <a href="#" target="_blank">
            <img class="news-img pull-left" src="img/press-01.jpg" alt="Tech Crunch"> -->
            <p class="black">Perbedaan bukan memecahkan, namun dari perbedaan bisa muncul sebuah kebersamaan, keakraban, dan keharmonisan. Dan itu akan kamu wujudkan dalam FORTRAN 2016<br />
            <small><em>-Motto Bersama-</em></small></p>
            </a>
          </div>
        </div>

        <div class="row margin-30 news-container">
          <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
<!--             <a href="#" target="_blank">
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
          <div class="col-sm-12 text-center">
            <p><small>Copyright &copy; 2018. All rights reserved. <br>
	            Created by <a href="https://github.com/himasif/">Mediatek|HIMASIF</a></small></p>
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