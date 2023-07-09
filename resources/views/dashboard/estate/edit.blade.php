@extends('layouts.master')

@section('content-header')
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Edit Data Estate</h3>

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
            <form method="post" action="/dashboard/estate/{{ $lokasi_estates->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Estate</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama', $lokasi_estates->nama) }}">

                      @error('nama')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                </div>

                <div class="mb-3">
                    <label for="PT" class="form-label">PT</label>
                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                    name="lokasi_id" data-placeholder="Pilih Status PT" required>
                    <option selected></option>
                    @foreach($lokasis as $lokasi_id)
                        <option value="{{ $lokasi_id->id }}"
                        @if($lokasi_id->id == $lokasi_estates->lokasi_id) selected
                        @endif>{{ $lokasi_id->nama }}</option>
                    @endforeach
                    </select>
                </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/dashboard/estate">
                    <button class="btn btn-success" type="button">Back</button></a>

        </div>
    </div>

        <div class="col-md-6">

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
