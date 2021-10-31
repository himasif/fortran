@extends('layouts.admin')

@section('title', 'Nilai Individu')
@section('content')
<div class="page-wrapper">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Input Nilai Individu</h4>
    </div>
  </div>
</div>

<div class="container-fluid">

  @foreach($kategori as $val)
  <input type="hidden" id="nilai_kategori_{{$val->idKategori}}" value="{{$val->nilai_kategori}}">
  @endforeach

  <div class="card">
    <form action="{{ route('set_input_individu') }}" class="form-horizontal" method="post">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group row">
          <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tanggal <small class="text-muted">dd/mm/yyyy</small></label>
          <div class="col-sm-9">
            <input type="text" class="form-control date-inputmask" id="date-mask" placeholder="Masukan Tanggal" name="tanggal" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 text-right control-label col-form-label">Kategori</label>
          <div class="col-md-9">
            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="kategori" onchange="nilaiValue(this)">
              <option>Pilih</option>
              @foreach($kategori as $val)
              <option value="{{$val->idKategori}}">{{$val->kategori}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="lname" class="col-sm-3 text-right control-label col-form-label">NIM</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="lname" placeholder="Masukan NIM" name="nim" required>
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
            <input type="number" class="form-control" placeholder="Masukan Nilai" name="nilai" value="0" id="nilai" required>
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

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nilai Mahasiswa</h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" style="width:100%; table-layout: fixed;">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>NIM</th>
                  <th>Nama</th>
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
                  <td>{{$value->tanggal}}</td>
                  <td>{{$value->nim}}</td>
                  <td>{{$value->nama}}</td>
                  <td>{{$value->namaKelompok}}</td>
                  <td>{{$value->kategori}}</td>
                  <td>{{$value->keterangan}}</td>
                  <td>{{$value->nilai}}</td>
                  <td>
                    <!--<form action='editNilai' method="post">-->
                    <!--  {{ csrf_field() }}-->
                    <!--  <input type="hidden" name="id" value="{{$value->idNilai}}"/>-->
                    <!--  <button type="submit" class="btn btn-info">edit</button>-->
                    <!--</form>    -->
                    <form action="{{ route('delete_individu') }}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{$value->idNilai}}"/>
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