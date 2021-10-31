@extends('layouts.admin')

@section('title', 'Nilai Kelompok')
@section('content')
<div class="page-wrapper">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Input Nilai Kelompok</h4>
    </div>
  </div>
</div>

<div class="container-fluid">

  @foreach($kategori as $val)
  <input type="hidden" id="nilai_kategori_{{$val->idKategori}}" value="{{$val->nilai_kategori}}">
  @endforeach


  <div class="card">
    <form action="{{ route('set_input_kelompok') }}" class="form-horizontal" method="post">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group row">
          <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tanggal <small class="text-muted">dd/mm/yyyy</small></label>
          <div class="col-sm-9">
            <input type="text" class="form-control date-inputmask" id="date-mask" placeholder="Masukan Tanggal" name="tanggal" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Nama Kelompok</label>
          <div class="col-md-9">
            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="kelompok">
              <option>Select</option>
              @foreach($kelompok as $value)
              <option value="{{$value->idKelompok}}">{{$value->namaKelompok}}</option>
              @endforeach
            </select>
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
            <input type="number" class="form-control" placeholder="Masukan Nilai" name="nilai" id="nilai" required>
          </div>
        </div>
      </div>
      <div class="border-top">
        <div class="card-body">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>

  <!-- TABLES -->
  <input type="hidden" name="nothing" value="{{$i=1}}">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nilai Kelompok</h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" style="width:100%; table-layout: fixed;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Kelompok</th>
                  <th>Kategori</th>
                  <th>Keterangan</th>
                  <th>Nilai</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

                @foreach($data as $value)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$value->tanggal}}</td>
                  <td>{{$value->namaKelompok}}</td>
                  <td>{{$value->kategori}}</td>
                  <td>{{$value->keterangan}}</td>
                  <td>{{$value->nilai}}</td>
                  <td>
                    <form action="{{ route('delete_kelompok') }}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="tanggal" value="{{$value->tanggal}}"/>
                      <input type="hidden" name="idKelompok" value="{{$value->idKelompok}}"/>
                      <input type="hidden" name="idKategori" value="{{$value->idKategori}}"/>
                      <input type="hidden" name="keterangan" value="{{$value->keterangan}}"/>
                      <button type="submit" class="btn btn-danger">delete</button>
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


</div>
@endsection