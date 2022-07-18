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
            <form method="post" action="/dashboard/hrhead/{{ $recruitskus->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" readonly class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                    required autofocus value="{{ old('nik', $recruitskus->nik) }}">
                  </div>

                  <div class="mb-3">
                    <label for="npk" class="form-label">NPK Rekrut</label>
                    <input type="text" readonly placeholder="Masukan NPK" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                  autofocus value="{{ old('npk', $recruitskus->npk) }}">
                  </div>

                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" readonly class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama', $recruitskus->nama) }}">
                  </div>

                  <div class="mb-3">
                    <label for="asal" class="form-label">Asal Rekrut</label>
                    <input type="text" readonly class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal"
                    required autofocus value="{{ old('asal', $recruitskus->asal) }}">
                  </div>

                  <div class="mb-3">
                    <label for="ketklaim" class="form-label">Keterangan</label>
                    <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                     autofocus value="{{ old('ketklaim', $recruitskus->ketklaim) }}">
                  </div>
                </div>

                @if ($recruitskus->statuspgs== "HR Staff memproses Lampiran")
              <div class="mb-3">
                <label for="kolom1" class="form-label">KOLOM 1</label>
                <input type="text" readonly placeholder="Rp." class="form-control @error('kolom1') is-invalid @enderror" id="kolom1" name="kolom1"
                 autofocus value="{{ old('kolom1', $recruitskus->kolom1) }}">
              </div>


              <div class="mb-3">
                <label for="kolom2" class="form-label">KOLOM 2</label>
                <input type="text" readonly placeholder="Rp."  class="form-control @error('kolom2') is-invalid @enderror" id="kolom2" name="kolom2"
                 autofocus value="{{ old('kolom2', $recruitskus->kolom2) }}">
              </div>

              <div class="mb-3">
                <label for="total" class="form-label">TOTAL</label>
                <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total" name="total"
                 autofocus value="{{ old('total', $recruitskus->kolom1 + $recruitskus->kolom2) }}">
              </div>
            @endif
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="statuskaryawan" class="form-label">Status Tanggungan Karyawan</label>
                <input type="text" readonly class="form-control @error('statuskaryawan') is-invalid @enderror" id="statuskaryawan" name="statuskaryawan"
                required autofocus value="{{ old('statuskaryawan', $recruitskus->statuskaryawan) }}">

                  @error('statuskaryawan')
                      <div class="invalid-feedback">
                      {{ $message }}
                      </div>
                  @enderror
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






      <!-----------------------kondisi aprove-------------------------------------------------------------------------->
    @if ($recruitskus->status == "Approve" && $recruitskus->statushrhead == "Approve"
            && $recruitskus->statuspgs == "HR Staff memproses Lampiran"
            && $recruitskus->kolom1 == null)
            <div class="mb-3">
                <label for="ketklaim" class="form-label">Keterangan Invoice</label>
                <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                    autofocus value="HR Staff memverivikasi Lampiran">
            </div>
            <a href="/dashboard/hrhead/">
                <button class="btn btn-success" type="button">Back</button></a>

        @elseif($recruitskus->status == "Approve" && $recruitskus->statushrhead == "Approve"
                && $recruitskus->statuspgs == "HR Staff memproses Lampiran"
                && $recruitskus->kolom1 != null)
                <div class="mb-3">
                    <label for="ketklaim" class="form-label">Keterangan Invoice</label>
                    <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                        autofocus value="Progres CMA">
                </div>
                <a href="/dashboard/hrhead/">
                <button class="btn btn-success" type="button">Back</button></a>

        @elseif ($recruitskus->statuspgs == "Prosess di Reaject PGS")
                <div class="mb-3">
                    <label for="status" class="form-label">Proses</label>
                    <input type="text" readonly class="form-control" id="status" name="status"
                    autofocus value= "Data Di Reaject">
                    </div>
                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input readonly type="text" readonly class="form-control" id="keterangan" name="keterangan"
                autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                </div>
                <a href="/dashboard/hrhead">
                <button class="btn btn-success" type="button">Back</button></a>

        @elseif($recruitskus->status == "Approve" && $recruitskus->statusgahead == "Approve" &&
                $recruitskus->npk != null )
                <div class="mb-3">
                    <label for="statushrhead" class="form-label">Prosses</label>
                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="statushrhead" required>
                    <option selected value="">--PILIH--</option>
                    <option value="Approve" <?= $recruitskus->statushrhead == "Approve" ?
                    "selected" : ""?>>Approve</option>
                    <option value="Prosess di Reaject HR Head" <?= $recruitskus->statushrhead == "Prosess di Reaject HR Head" ?
                    "selected" : ""?>>Reaject</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror"
                    id="keterangan" name="keterangan"
                    placeholder="Isi Keterangan Bila Reject" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                        {{ $message }}
                </div>
                    @enderror
                </div>
                <p>
                    <button type="submit" class="btn btn-primary">Prosses</button>
                </p>

        @elseif($recruitskus->status == "Approve" && $recruitskus->statusgahead == null &&
                $recruitskus->npk != null)
                <div class="mb-3">
                <label for="statushrhead" class="form-label">Prosses</label>
                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="statushrhead" required>
                <option selected value="">--PILIH--</option>
                <option value="Approve" <?= $recruitskus->statushrhead == "Approve" ?
                    "selected" : ""?>>Approve</option>
                <option value="Prosess di Reaject HR Head" <?= $recruitskus->statushrhead == "Prosess di Reaject HR Head" ?
                    "selected" : ""?>>Reaject</option>
                </select>
                </div>
                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror"
                id="keterangan" name="keterangan"
                placeholder="Isi Keterangan Bila Reject" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                @error('keterangan')
                        <div class="invalid-feedback">
                        {{ $message }}
                </div>
                    @enderror
                </div>
                <p>
                <button type="submit" class="btn btn-primary">Prosses</button>
                </p>

        @elseif($recruitskus->status == "Prosess di Reaject Oleh HR Staff")
                <div class="mb-3">
                <label for="status" class="form-label">Prosses</label>
                <input type="text" readonly class="form-control" id="status" name="status"
                autofocus value="{{ old('status', $recruitskus->status) }}">
                </div>
                <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea readonly type="text" class="form-control @error('keterangan') is-invalid @enderror"
                id="keterangan" name="keterangan"
                placeholder="Isi Keterangan Bila Reject" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                </div>
                <a href="/dashboard/hrhead/">
                <button class="btn btn-success" type="button">Back</button></a>


        @elseif($recruitskus->statusgahead == null && $recruitskus->ketklaim == "Invoice")
                <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                    <input type="text" readonly class="form-control" id="status" name="status"
                    autofocus value="Data Belum Di Proses GA">
                </div>
                <a href="/dashboard/hrhead/">
                    <button class="btn btn-success" type="button">Back</button></a>
  @endif

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
