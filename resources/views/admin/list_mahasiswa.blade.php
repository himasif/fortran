@extends('layouts.admin')

@section('title', 'List Mahasiswa')
@section('content')
<div class="page-wrapper">

<!-- THIS IS THE BODY -->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List Peserta Fortran {{\Config::get('app.angkatan')}}</h5>
          @php
          $i=1;
          @endphp
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Kelompok</th>
                <th scope="col">Nilai</th>
                <th scope="col">Detail</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $mahasiswa)
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$mahasiswa->nama}}</td>
                <td>{{$mahasiswa->nim}}</td>
                <td>{{App\Kelompok::find($mahasiswa->idKelompok)->namaKelompok}}</td>
                <td>{{$mahasiswa->nilaiAkhir}}</td>
                <td>
                  <a href="{{ route('get_mahasiswa', $mahasiswa->nim) }}" class="btn btn-primary">Details</a>
                    <!-- <button type="submit" class="btn btn-warning">Detail</button> -->
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
@endsection