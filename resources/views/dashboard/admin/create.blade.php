@extends('layouts.master')

@section('content-header')
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Insert Data Admin</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
      </div>
    </div>
            @if(session()->has('success'))
            <div class="alert alert-success col-lg-10" role="alert">
            {{ session ('success') }}
            </div>
            @endif

  <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <form method="post" action="/dashboard/admin" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    required autofocus value="{{ old('username') }}">

                      @error('username')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    required autofocus value="{{ old('email') }}">

                      @error('email')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    required autofocus value="{{ old('password') }}">

                      @error('password')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>


                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/dashboard/admin">
                    <button class="btn btn-success" type="button">Back</button></a>

        </div>
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div class="mb-3">
                <label for="status" class="form-label">Jabatan</label>
                <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
             name="status" data-placeholder="Pilih Status JABATAN" required>
                <option selected></option>
                <option value="PGS">PGS</option>
                <option value="HR">HR</option>
                <option value="ADMIN">ADMIN</option>
            </select>
          </div>

            <div class="mb-3">
                <label for="PT" class="form-label">PT</label>
                <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
             name="PT" data-placeholder="Pilih Status PT" required>
                <option selected></option>
                <option value="PT SWA">PT SWA</option>
                <option value="PT DAN">PT DAN</option>
                <option value="PT DIN">PT DIN</option>
                <option value="PT DWT">PT DWT</option>
                <option value="PT KPAS">PT KPAS</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="estate" class="form-label">Estate</label>
            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
         name="estate" data-placeholder="Pilih Status estate" required>
            <option selected></option>
            <option value="JABDAN 1">JABDAN 1</option>
            <option value="JABDAN 2">JABDAN 2</option>
            <option value="LJ 1">LJ 1</option>
            <option value="LJ 2">LJ 2</option>
            <option value="LK 1">LK 1</option>
            <option value="LK 2">LK 2</option>
            <option value="LK 3">LK 3</option>
                </select>
           </div>


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
{{--
      <h5>Custom Color Variants</h5>
      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label>Minimal (.select2-danger)</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label>Multiple (.select2-purple)</label>
            <div class="select2-purple">
              <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
            </div>
          </div>
          <!-- /.form-group -->
        </div> --}}
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->

</form>
</div>

@endsection
