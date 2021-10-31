@extends('layouts.admin')

@section('title', 'Admin')
@section('content')
<div class="page-wrapper">

<!-- THIS IS THE BODY -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cari Detail Mahasiswa</h5>
          <form class="form-horizontal" action="{{ route('search') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group row">
              <label for="fname" class="col-sm-3 text-left control-label col-form-label">Nama / NIM</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="fname" placeholder="Nama / NIM" name="nama_nim">
              </div>
            </div>
            <div class="form-group row">
              <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Top 10 Teratas</h5>
          @php
          $i=1;
          @endphp
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data_top as $mahasiswa)
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$mahasiswa->nama}}</td>
                <td>{{$mahasiswa->nim}}</td>
                <td>{{$mahasiswa->nilaiAkhir}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Top 10 Terbawah</h5>
          @php
          $i=1;
          @endphp
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data_low as $mahasiswa)
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$mahasiswa->nama}}</td>
                <td>{{$mahasiswa->nim}}</td>
                <td>{{$mahasiswa->nilaiAkhir}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection