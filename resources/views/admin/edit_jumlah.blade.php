@extends('layouts.admin')

@section('title', 'Nilai Batch')
@section('content')
<div class="page-wrapper">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Edit Jumlah Pendaftar {{ $lomba->nama }}</h4>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="card">
        <form action="update-jumlah/{{ $lomba->id }}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group mb-3">
                <label for="">Jumlah</label>
                <input type="text" name="jumlah" value="{{$lomba->jumlah}}" class="form-control">
            </div>
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="/admin/lomba" class="btn btn-danger float-end">BACK</a>
            </div>
          </div>
        </form>
      </div>
  
</div>

@endsection