@extends('layouts.admin')

@section('title', 'Detail Mahasiswa')
@section('content')
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
                  <form class="" action="{{ route('delete_mahasiswa', $nilai->nim) }}" method="post">
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
@endsection
