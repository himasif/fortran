@extends('layouts.admin')

@section('title', 'Link')
@section('content')
<div class="page-wrapper">

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Buat Link</h4>
    </div>
  </div>
</div>

<div class="container-fluid">

  <div class="card">
    <form action="{{ route('set_link') }}" class="form-horizontal" method="post">
      {{ csrf_field() }}
      <div class="card-body">
        <div class="form-group row">
          <label for="lname" class="col-sm-3 text-right control-label col-form-label">Judul</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="lname" placeholder="Masukan Judul" name="name" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="lname" class="col-sm-3 text-right control-label col-form-label">Url</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="lname" placeholder="Masukan Url" name="url" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Warna</label>
          <div class="col-sm-9">
            <!-- <input type="color" class="form-control" name="color" required style="width: 50px;"> -->
            <select name="color" style="width: 100%; height:36px;">
              <option value="#700c6c" style="color: white; background: #700c6c;">Dark</option>
              <option value="#cb3cc6" style="color: white; background: #cb3cc6;">Medium</option>
              <option value="#eba1ea" style="color: white; background: #eba1ea;">Light</option>
            </select>
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
          <h5 class="card-title">Data Link</h5>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" style="width:100%; table-layout: fixed;">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Judul</th>
                  <th>Url</th>
                  <th>Warna</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

                @foreach($data as $value)
                <tr>
                  <td>{{$value->created_at}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->url}}</td>
                  <td>{{$value->color}}</td>
                  <td>
                    <!--<form action='editNilai' method="post">-->
                    <!--  {{ csrf_field() }}-->
                    <!--  <input type="hidden" name="id" value="{{$value->idNilai}}"/>-->
                    <!--  <button type="submit" class="btn btn-info">edit</button>-->
                    <!--</form>    -->
                    <form action="{{ route('delete_link') }}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{$value->id}}"/>
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