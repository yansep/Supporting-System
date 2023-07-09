@extends('layouts.master')

@section('content-header')
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Edit Data SKU</h3>

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
            <form method="post" action="/dashboard/admin/{{ $users->id }}" enctype="multipart/form-data">

                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    required autofocus value="{{ old('username', $users->username) }}">

                      @error('username')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="npk" class="form-label">NPK</label>
                    <input type="text" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                    required autofocus value="{{ old('npk', $users->npk)}}">

                      @error('npk')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    required autofocus value="{{ old('password', $users->password) }}">

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

        <div class="col-md-6">
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                name="role_id" data-placeholder="Pilih Status Jabatan" required>
                <option selected></option>
                @foreach($roles as $role_id)
                    <option value="{{ $role_id->id }}"
                    @if($role_id->id == $users->role_id) selected
                    @endif>{{ $role_id->nama }}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                    <label for="PT" class="form-label">PT</label>
                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                    name="lokasi_id" data-placeholder="Pilih Status PT" required>
                    <option selected></option>
                    @foreach($lokasis as $lokasi_id)
                        <option value="{{ $lokasi_id->id }}"
                        @if($lokasi_id->id == $users->lokasi_id) selected
                        @endif>{{ $lokasi_id->nama }}</option>
                    @endforeach
                    </select>
          </div>


          <div>
            <label for="provinsi" class="form-label">Estate</label>
            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
            name="lokasi_estate_id" data-placeholder="Pilih Provinsi" required>
            <option selected>Pilih Provinsi....</option>
                @foreach($lokasi_estates as $lokasi_estate_id)
                <option value="{{ $lokasi_estate_id->id }}"
                    @if($lokasi_estate_id->id == $users->lokasi_estate_id) selected
                    @endif>{{ $lokasi_estate_id->nama }}</option>
                @endforeach
            </select><br>
        </div>


        </div>
        <!-- /.col -->
    </div>
</div>




</div>
      <!-- /.row -->
</div>
    <!-- /.card-body -->

</form>
</div>

@endsection
