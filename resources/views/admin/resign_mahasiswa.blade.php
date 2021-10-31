@extends('layouts.admin')

@section('title', 'Resign Mahasiswa')
@section('content')
<div class="page-wrapper">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Input NIM Mahasiswa Resign</h4>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card">
    <form action="{{ route('set_resign') }}" class="form-vertical" method="post">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group row">
          <label for="lname" class="col-sm-3 text-right control-label col-form-label">Masukan NIM Mahasiswa yang resign</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="lname" placeholder="Masukan NIM" name="nim">
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

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Mahasiswa Resign</h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" style="width:100%; table-layout: fixed;">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                </tr>
              </thead>

              <tbody>

                @foreach($data as $value)
                <tr>
                  <td>{{$value->nim}}</td>
                  <td>{{$value->nama}}</td>
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