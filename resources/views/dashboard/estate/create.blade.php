@extends('layouts.master')

@section('content-header')
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Insert Data Esatate</h3>

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
            <form method="post" action="/dashboard/estate" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Estate</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama') }}">

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
                    <option selected> </option>
                        @foreach($lokasis as $pos)
                            <option value="{{$pos->id}}">{{$pos->nama}}</option>
                        @endforeach
                    </select>
                </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="/dashboard/PT">
                    <button class="btn btn-success" type="button">Back</button></a>

        </div>
        </div>
        <!-- /.col -->

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
