@extends('layouts.master')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="dist/img/1.png" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light">RECRUITMENT SKU</span>
    </a>
</aside>

@section('content-header')
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Insert Data SKU</h3>

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
            <form method="post" action="/dashboard/inputsku/create" enctype="multipart/form-data">
                @csrf

            <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                    required autofocus value="{{ old('nik') }}">

                      @error('nik')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
            </div>


            <div class="mb-3">
                <label for="nama" class="form-label">Nama SKU</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                required autofocus value="{{ old('nama') }}">

                  @error('nama')
                      <div class="invalid-feedback">
                      {{ $message }}
                      </div>
                  @enderror
              </div>

              <div class="mb-3">
                <label for="asal" class="form-label">Asal (Kabupaten)</label>
                <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal"
                required autofocus value="{{ old('asal') }}">

                  @error('asal')
                      <div class="invalid-feedback">
                      {{ $message }}
                      </div>
                  @enderror
              </div>

              <div>
            <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
             name="ketklaim" data-placeholder="Pilih Status Pembayaran" required>
             <option selected></option>
             <option value="Invoice">Invoice</option>
             <option value="Non Invoice">Non Invoice</option>
           </select><br></div>

           <div>
            <label for="dokumen_ktp" class="form-label">Uplod KTP</label>
            <input type="hidden" name="oldDokumen" value="{{ old('dokumen_ktp') }}">
            <input class="form-control @error('dokumen_ktp') is-invalid @enderror" style="width: 100%;"
            type="file" id="dokumen_ktp" name="dokumen_ktp">

          @error('dokumen_ktp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
          </div>
          <br><br><button type="submit" class="btn btn-primary">Submit</button>
        </div>





          <!-- /.form-group
          <div class="form-group">
            <label>Disabled</label>
            <select class="form-control select2" disabled="disabled" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
           /.form-group -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">

          <div class="form-group">
            <label for="statuskaryawan" class="form-label">Status Tanggungan Karyawan</label>
            <select class="form-control select2" data-placeholder="Pilih Status"
            aria-label="Default select example" style="width: 100%;"  name="statuskaryawan" required>
            <option selected></option>
            <option value="TK">TK</option>
            <option value="k0">K0</option>
            <option value="k1">K1</option>
            <option value="k2">K2</option>
            <option value="K3">K3</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="k0" class="form-label">Nama Istri</label>
            <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
             autofocus value="{{ old('k0') }}">

              @error('k0')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
              @enderror
          </div>

          <div class="mb-3">
            <label for="k1" class="form-label">Nama Anak 1</label>
            <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
             autofocus value="{{ old('k1') }}">

            @error('k1')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>



            <div class="mb-3">
                <label for="k2" class="form-label">Nama Anak 2</label>
                <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
                 autofocus value="{{ old('k2') }}">

                @error('k2')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="k3" class="form-label">Nama Anak 3</label>
                <input type="text" class="form-control @error('k3') is-invalid @enderror" id="k3" name="k3"
                 autofocus value="{{ old('k3') }}">

                @error('k3')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <label for="floatingTextarea">Comments</label>
                <textarea class="form-control" placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
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
