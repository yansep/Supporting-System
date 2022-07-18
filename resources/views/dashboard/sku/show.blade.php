@extends('layouts.master')

@section('content-header')

<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"> Data SKU</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
      </div>
    </div>

  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <form method="post" action="/dashboard/sku/{{ $recruitskus->id }}" enctype="multipart/form-data">
              @method('put')
              @csrf

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                    readonly autofocus value="{{ old('nik', $recruitskus->nik) }}">
                 </div>


            <div class="mb-3">
                <label for="nama" class="form-label">Nama SKU</label>
                <input type="text" readonly class="form-control" id="nama" name="nama"
                autofocus value="{{ old('nama', $recruitskus->nama) }}">
              </div>

              <div class="mb-3">
                <label for="asal" class="form-label">Asal (Kabupaten)</label>
                <input type="text" readonly class="form-control" id="asal" name="asal"
                autofocus value="{{ old('asal', $recruitskus->asal) }}">
              </div>

            <div>
            <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
            <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
            autofocus value="{{ old('ketklaim', $recruitskus->ketklaim) }}">
            </div>
        </div>
    </div>




    {{-- ------------------------------------------------------- --}}

        <div class="col-md-6">
            <div class="mb-3">
                <label for="statuskaryawan" class="form-label">Status Tanggunagan Karyawan</label>
                <input type="text" readonly class="form-control" id="statuskaryawan" name="statuskaryawan"
                 autofocus value="{{ old('statuskaryawan', $recruitskus->statuskaryawan) }}">
            </div>


            @if($recruitskus->statuskaryawan == "k0")
            <div class="mb-3">
              <label for="k0" class="form-label">Nama Istri</label>
              <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
              readonly autofocus value="{{ old('k0', $recruitskus->k0)  }}">
            </div>

        @elseif($recruitskus->statuskaryawan == "k1")
              <div class="mb-3">
                <label for="k0" class="form-label">Nama Istri</label>
                <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
                readonly autofocus value="{{ old('k0', $recruitskus->k0) }}">
              </div>

              <div class="mb-3">
                    <label for="k1" class="form-label">Nama Anak 1</label>
                    <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
                    readonly autofocus value="{{ old('k1', $recruitskus->k1)}}">
                  </div>

        @elseif($recruitskus->statuskaryawan == "k2")
              <div class="mb-3">
                <label for="k0" class="form-label">Nama Istri</label>
                <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
                readonly autofocus value="{{ old('k0', $recruitskus->k0)}}">
              </div>

              <div class="mb-3">
              <label for="k1" class="form-label">Nama Anak 1</label>
              <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
              readonly autofocus value="{{ old('k1', $recruitskus->k1) }}">
            </div>

            <div class="mb-3">
              <label for="k2" class="form-label">Nama Anak 2</label>
              <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
              readonly autofocus value="{{ old('k2', $recruitskus->k2)}}">
            </div>

        @elseif($recruitskus->statuskaryawan == "k3")
              <div class="mb-3">
                <label for="k0" class="form-label">Nama Istri</label>
                <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
                readonly autofocus value="{{  old('k0', $recruitskus->k0) }}">
              </div>

              <div class="mb-3">
                <label for="k1" class="form-label">Nama Anak 1</label>
                <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
                readonly autofocus value="{{ old('k1', $recruitskus->k1) }}">
              </div>

              <div class="mb-3">
                <label for="k2" class="form-label">Nama Anak 2</label>
                <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
                readonly autofocus value="{{ old('k2', $recruitskus->k2)}}">
              </div>

              <div class="mb-3">
                <label for="k3" class="form-label">Nama Anak 3</label>
                <input type="text" class="form-control @error('k3') is-invalid @enderror" id="k3" name="k3"
                readonly autofocus value="{{ old('k3', $recruitskus->k3)}}">
              </div>
        @endif



        @if ($recruitskus->status == null && $recruitskus->statuspgs == null
          && $recruitskus->statushrhead == null && $recruitskus->statusgahead == null
          && $recruitskus->statuscma == null)
                    <div class="mb-3">
                        <label for="status" class="form-label">Proses</label>
                        <input type="text" readonly class="form-control" id="status" name="status"
                        autofocus value= "Data Belum Di Proses">
                        <br>
                        <a href="/dashboard/sku">
                            <button class="btn btn-success" type="button">Back</button></a>
                    </div>

          @elseif ($recruitskus->status == "Prosess di Reaject Oleh HR Staff" ||
                    $recruitskus->statuspgs == "Prosess di Reaject PGS"
                  || $recruitskus->statushrhead == "Prosess di Reaject HR Head"
                  || $recruitskus->statusgahead == "Prosess di Reaject GA"
                  || $recruitskus->statuscma == "REAJECT")
                  <div class="mb-3">
                    <label for="status" class="form-label">Proses</label>
                    <input type="text" readonly class="form-control" id="status" name="status"
                    autofocus value= "Data Di Reaject">
                  </div>

                  <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                     autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                     <br>
                     <a href="/dashboard/sku">
                        <button class="btn btn-success" type="button">Back</button></a>
                  </div>

          @elseif ($recruitskus->statuscma == "REJECT")
             <div class="mb-3">
              <label for="status" class="form-label">Prosses</label>
                <input type="text" readonly class="form-control" id="total" name="total"
                  autofocus value="Prosess di Reaject CMA">
             </div>
                     <div class="mb-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                       autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                    </div>
                    <br>
                     <a href="/dashboard/sku">
                      <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->status != null || $recruitskus->statuspgs != null
          || $recruitskus->statushrhead != null || $recruitskus->statusgahead != null)
          <div class="mb-3">
            <label for="status" class="form-label">Proses</label>
            <input type="text" readonly class="form-control" id="status" name="status"
             autofocus value= "Data Sedang Proses">
          </div>
          <br>
                     <a href="/dashboard/sku">
                      <button class="btn btn-success" type="button">Back</button></a>
        @endif

          <article class= "my-3">
            {!! $recruitskus->ketstatus !!}
        </article>
    </div>
</div>
</div>
</form>
</div>

@endsection
