<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FORTRAN {{ \Config::get('app.angkatan')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/card.css')}}">
  </head>
  <body>
    <section id="home">
      <div class="home">
        <div class="home-bg-black">
          <!-- JUST BACKGROUND -->
        </div>
      </div>

      <div class="container-fluid col-md-12">
        <div class="nilai-home-head content">
          <h2>{{$mahasiswa->nama}}</h2>
        </div>
        <div class="row content">
          <div class="col-md-4">
            <div class="card-blue-nilai card-nilai">
              <div class="card-header-nilai">
                INDIVIDU
              </div>
              <div class="card-body-nilai">
                <ul class="">
                  @foreach($kategori_individu as $kategori)
                  <li>{{$kategori->kategori}} : {{$nilai_kategori[$kategori->idKategori]}}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-red-nilai card-nilai">
              <div class="card-header-nilai">
                KELOMPOK
              </div>
              <div class="card-body-nilai">
                <ul class="">
                  @foreach($kategori_kelompok as $kategori)
                  <li>{{$kategori->kategori}} : {{$nilai_kategori[$kategori->idKategori]}}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-yellow-nilai card-nilai">
              <div class="card-header-nilai">
                ANGKATAN
              </div>
              <div class="card-body-nilai">
                <ul class="">
                  @foreach($kategori_angkatan as $kategori)
                  <li>{{$kategori->kategori}} : {{$nilai_kategori[$kategori->idKategori]}}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @php
    $i=1
    @endphp

    <section>
      <div class="container">
        <div class="col-md-12 list-nilai">
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
    </section>
    <footer class="footer text-center">
      Created by Mediatek <a href="https://github.com/himasif" class="link-footer">Himasif</a>
    </footer>
  </body>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
</html>