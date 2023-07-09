@extends('layouts.master')

@section('content-header')
<div class="row">
    <div class="col-12">
        @if(session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
          {{ session ('success') }}
        </div>
        @endif
      <!-- /.card -->

      <div class="card">

        <div class="card-header">

            <div class="card-header">
                <h1 class="card-title"><b>DATA ALL USER</b></h1>
              </div>
            <br>

          <div class="row justify-content-end">
          <div>
            <a href="/dashboard/admin/create" class="btn btn-primary mb-3">Tambah Data</a>
          </div>
                  <div class="col-sm-10 col-md-6">
                      <div id="example1_filter" class="dataTables_filter">
                        <form action="?" class="col-auto ms-auto">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Search .." value="" class="form-control">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                      </div>
                  </div>

          </div>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped" style = text-align:center role="table" aria-busy="false" aria-colcount="14">
            <thead>

            <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Jabatan</th>
            <th scope="col">PT</th>
            <th scope="col">Estate</th>
            <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

                @foreach($users as $User)
                <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td style = text-align:left>{{ $User->username }}</td>
                  <td>{{ $User->email }}</td>
                  <td>{{ $User->role->nama }}</td>
                  <td>{{ $User->lokasi->nama }}</td>
                  <td>{{ $User->lokasi_estate->nama }}</td>
                  <td>
                    <a href="/dashboard/admin/{{$User->id}}/edit"><i class="fas fa-edit fa-lg"
                        style="color: rgb(59, 29, 1)"></i></a>

                      <form action="/dashboard/admin/{{$User->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="border-0"><i class="fa fa-trash-alt fa-lg" style="color: rgb(255, 0, 21)"
                            onclick="return confirm('Yakin Data ini di hapus?')"></i></button>
                      </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection
