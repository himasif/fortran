@extends('layouts.admin')

@section('title', 'Nilai Batch')
@section('content')
<div class="page-wrapper">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Jumlah Pendaftar Lomba GEMASTIK</h4>
    </div>
  </div>
</div>

{{-- <div class="container-fluid"> --}}
    <section id="lomba" class="">
      

   
        <div class="lomba container text-center">
            <div class="row justify-content-md-center">
              <br>
              @foreach ($lomba as $item)
            <div class="card col col-lg-3">
                <div class="card-header">
                  <h4> <b> {{ $item->nama }}</b></h4>
                </div>
                <div class="card-body">
                  <h5><b> {{ $item->jumlah }}/7</b></h5>
                </div>
                <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
                  <a href="edit-jumlah/{{ $item->id }}"><button type="button" class="btn btn-outline-dark">Edit</button></a>
                </div>
              </div>
              @endforeach 
            </div>
        </div>
        <br>
       
        <style>
          .card{
            padding: 0px;
            
          }
          .card-header{
            
        
          }
          .card-header h4{
            font-size: 25px;
            font-family: poppins;
          
          }
          .card-body{
            /* background-color: blue; */
          }
          .card-body h5{
            font-size: 35px;
            font-family: poppins;
            color: darkorchid;
          }
        </style>
        </section>
  
{{-- </div> --}}

@endsection