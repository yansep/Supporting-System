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
                <form method="post" action="/dashboard/hr/{{ $recruitskus->id }}" enctype="multipart/form-data">
              @method('put')
              @csrf

              <div class="mb-3">
                <label for="nik" class="form-label" >NIK</label>
                <input type="number" readonly class="form-control" id="nik" name="nik"
                 autofocus value="{{ old('nik', $recruitskus->nik) }}">
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" readonly class="form-control" id="nama" name="nama"
                 autofocus value="{{ old('nama', $recruitskus->nama) }}">
              </div>

              <div class="mb-3">
                <label for="asal" class="form-label">Asal Rekrut</label>
                <input type="text" readonly class="form-control" id="asal" name="asal"
                 autofocus value="{{ old('asal', $recruitskus->asal) }}">
              </div>

              <div class="mb-3">
                <label for="created_at" class="form-label">Tanggal Di Buat</label>
                <input type="text" readonly class="form-control" id="created_at" name="created_at"
                 autofocus value="{{ old('created_at', $recruitskus->created_at) }}">
              </div>

              <div class="mb-3">
                <label for="ketklaim" class="form-label">Keterangan</label>
                <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                 autofocus value="{{ old('ketklaim', $recruitskus->ketklaim) }}">
              </div>
        </div>
        <a href="/dashboard/hr/">
            <button class="btn btn-success" type="button">Back</button></a>
    </div>




    {{-- ------------------------------------------------------- --}}

        <div class="col-md-6">

            <div class="mb-3">
                <label for="statuskaryawan" class="form-label">Status Tanggunagan Karyawan</label>
                <input type="text" readonly class="form-control" id="statuskaryawan" name="statuskaryawan"
                 autofocus value="{{ old('statuskaryawan', $recruitskus->statuskaryawan) }}">
              </div>

                @if ($recruitskus->status == "Prosess di Reaject Oleh HR Staff" ||
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
                      </div>

                @elseif ($recruitskus->status == null && $recruitskus->statuspgs == null
                        && $recruitskus->statushrhead == null && $recruitskus->statusgahead == null
                        && $recruitskus->statuscma == null)
                                <div class="mb-3">
                                    <label for="status" class="form-label">Proses</label>
                                    <input type="text" readonly class="form-control" id="status" name="status"
                                    autofocus value= "Data Belum Di Proses">
                                </div>

                @elseif ($recruitskus->status != null || $recruitskus->statuspgs != null
                        || $recruitskus->statushrhead != null || $recruitskus->statusgahead != null)
                                <div class="mb-3">
                                  <label for="status" class="form-label">Proses</label>
                                  <input type="text" readonly class="form-control" id="status" name="status"
                                   autofocus value= "Data Sedang Proses">
                                </div>

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
