@extends('layouts.admin')

@section('title', 'Nilai Batch')
@section('content')
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
    <form action="{{ route('set_input_batch') }}" class="form-horizontal" method="post">
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
@endsection