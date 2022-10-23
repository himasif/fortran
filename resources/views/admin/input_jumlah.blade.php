@extends('layouts.admin')

@section('title', 'Nilai Batch')
@section('content')
<div class="page-wrapper">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Tambah bidang lomba <h4>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <form action="{{ url('/admin/add-jumlah') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="">Nama Bidang</label>
                    <input type="text" name="nama"  class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Jumlah pendaftar</label>
                    <input type="number" name="jumlah" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">maksimal pendaftar</label>
                    <input type="number" name="max" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>   
</div>
  
</div>

@endsection