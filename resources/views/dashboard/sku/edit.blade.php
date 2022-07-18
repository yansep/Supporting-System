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

@if ($recruitskus->status == null && $recruitskus->statuspgs == null
&& $recruitskus->statushrhead == null && $recruitskus->statusgahead == null
&& $recruitskus->statuscma == null)

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
                    required autofocus value="{{ old('nik', $recruitskus->nik) }}">

                      @error('nik')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>

                @if ($recruitskus->npk != null)
                  <div class="mb-3">
                    <label for="npk" class="form-label">NPK</label>
                    <input type="text" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                    readonly autofocus value="{{ old('npk', $recruitskus->npk) }}">

                      @error('npk')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>
                @endif


                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama', $recruitskus->nama) }}">

                      @error('nama')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="asal" class="form-label">Asal Rekrut</label>
                    <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal"
                    required autofocus value="{{ old('asal', $recruitskus->asal) }}">

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
                     <option value="Invoice" <?= $recruitskus->ketklaim == "Invoice" ?
                        "selected" : ""?>> Invoice</option>
                     <option value="Non Invoice" <?= $recruitskus->ketklaim == "Non Invoice" ?
                        "selected" : ""?>> Non Invoice</option>
                   </select><br>
                    </div>

          <br><br><button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="statuskaryawan" class="form-label">Status Tanggungan Karyawan</label>
                <select class="form-control select2"
                aria-label="Default select example" style="width: 100%;" id="statuskaryawan"
                name="statuskaryawan" required>
                <option value="TK"<?= $recruitskus->statuskaryawan == "TK" ?
                    "selected" : ""?>>TK</option>
                <option value="k0"<?= $recruitskus->statuskaryawan == "k0" ?
                    "selected" : ""?>>k0</option>
                    <option value="k1"<?= $recruitskus->statuskaryawan == "k1" ?
                        "selected" : ""?>>k1</option>
                        <option value="k2"<?= $recruitskus->statuskaryawan == "k2" ?
                            "selected" : ""?>>k2</option>
                            <option value="k3"<?= $recruitskus->statuskaryawan == "k3" ?
                                "selected" : ""?>>k3</option>
                </select>
                </div>



            <div class="mb-3">
                <label for="k0" class="form-label">Nama Istri</label>
                <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
                required autofocus value="{{  old('k0', $recruitskus->k0) }}">

                @error('k0')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="k1" class="form-label">Nama Anak 1</label>
                <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
                required autofocus value="{{ old('k1', $recruitskus->k1) }}">

                @error('k1')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="k2" class="form-label">Nama Anak 2</label>
                <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
                required autofocus value="{{ old('k2', $recruitskus->k2)}}">

                @error('k2')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="k3" class="form-label">Nama Anak 3</label>
                <input type="text" class="form-control @error('k3') is-invalid @enderror" id="k3" name="k3"
                required autofocus value="{{ old('k3', $recruitskus->k3) }}">

                @error('k3')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- /.col -->
    </div>

    @elseif($recruitskus->status != null || $recruitskus->statuspgs != null
    || $recruitskus->statushrhead != null || $recruitskus->statusgahead != null
    || $recruitskus->statuscma != null)

<div class="card-body">
        <div class="row">
        {{-- sebelah kiri --}}
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


                  @if ($recruitskus->npk != null)
                    <div class="mb-3">
                      <label for="npk" class="form-label">NPK</label>
                      <input type="text" class="form-control @error('npk') is-invalid @enderror"
                      id="npk" name="npk"readonly autofocus value="{{ old('npk', $recruitskus->npk) }}">
                    </div>
                  @endif


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
                </div><br>

                {{-- ===================================== ================================--}}
    @if ($recruitskus->statushrhead == "Approve" && $recruitskus->kolom1 == null)
                <div class="mb-3">
                    <label for="statuspgs" class="form-label">Prosses</label>
                        <select class="form-control select2" style="width: 100%;"
                        aria-label="Default select example" name="statuspgs" required>

                            <option selected value="">--PILIH--</option>
                            <option value="HR Staff memproses Lampiran"
                            <?= $recruitskus->statuspgs == "HR Staff memproses Lampiran" ?
                            "selected" : ""?>>Approve</option>

                            <option value="Prosess di Reaject PGS"
                            <?= $recruitskus->statuspgs == "Prosess di Reject PGS" ?
                            "selected" : ""?>>Reject</option>
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
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

        @elseif ($recruitskus->status == "Approve" && $recruitskus->statusgahead == null
                && $recruitskus->npk == null && $recruitskus->ketklaim == "Invoice" )
                <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                        <input type="text" readonly class="form-control" id="total" name="total"
                        autofocus value="Menunggu Verifikasi GA">
                </div>
                <a href="/dashboard/sku">
                <button class="btn btn-success" type="button">Back</button></a>
            </div>

        @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
                && $recruitskus->statushrhead == "Prosess di Reaject HR Head")
                    <div class="mb-3">
                        <label for="status" class="form-label">Prosses</label>
                        <input type="text" readonly class="form-control" id="total" name="total"
                      autofocus value="Prosess di Reaject HR Head">
                    </div>
                <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                   autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                </div>
                <a href="/dashboard/sku">
                <button class="btn btn-success" type="button">Back</button></a>
            </div>

        @elseif ($recruitskus->status == "Prosess di Reaject Oleh HR Staff")
                <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                    <input type="text" readonly class="form-control" id="total" name="total"
                      autofocus value="Prosess di Reaject Oleh HR Staff">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                     autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                </div>
                  <a href="/dashboard/sku">
                  <button class="btn btn-success" type="button">Back</button></a>
                </div>

        @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null && $recruitskus->kolom1 == null)
                <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                    <input type="text" readonly class="form-control" id="total" name="total"
                    autofocus value="Menunggu Verifikasi HR Head">
                </div>
               <a href="/dashboard/sku">
                <button class="btn btn-success" type="button">Back</button></a>
            </div>

        @elseif ($recruitskus->statuscma == "APPROVE")
                    <div class="mb-3">
                        <label for="status" class="form-label">Prosses</label>
                        <input type="text" readonly class="form-control" id="total" name="total"
                            autofocus value="Approve CMA">
                    </div>
                    <a href="/dashboard/sku">
                    <button class="btn btn-success" type="button">Back</button></a>
                </div>

        @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
                 && $recruitskus->kolom1 != null && $recruitskus->statuscma == null)
                <div class="mb-3">
                        <label for="status" class="form-label">Prosses</label>
                        <input type="text" readonly class="form-control" id="total" name="total"
                        autofocus value="Menunggu Verifikasi CMA">
                </div>
               <a href="/dashboard/sku">
                <button class="btn btn-success" type="button">Back</button></a>
            </div>

        @elseif ($recruitskus->statusgahead == "Prosess di Reaject GA")
                <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                    <input type="text" readonly class="form-control" id="total" name="total"
                    autofocus value="Prosess di Reaject GA">
                </div>
                  <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                     autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                  </div>
                  <a href="/dashboard/sku">
                  <button class="btn btn-success" type="button">Back</button></a>
                </div>

        @elseif ($recruitskus->statuspgs == "Prosess di Reaject PGS")
                <div class="mb-3">
                    <label for="statuspgs" class="form-label">Prosses</label>
                    <select class="form-control select2" style="width: 100%;"
                    aria-label="Default select example" name="statuspgs" required>

                        <option selected value="">--PILIH--</option>
                        <option value="HR Staff memproses Lampiran"
                        <?= $recruitskus->statuspgs == "HR Staff memproses Lampiran" ?
                        "selected" : ""?>>Approve</option>

                        <option value="Prosess di Reaject PGS"
                        <?= $recruitskus->statuspgs == "Prosess di Reaject PGS" ?
                        "selected" : ""?>>Reject</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                     autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                </div>
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
                     <a href="/dashboard/sku">
                      <button class="btn btn-success" type="button">Back</button></a>
                    </div>
    @endif
</div>


        {{-- sebelah kanan --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label for="statuskaryawan" class="form-label">Status Tanggunagan Karyawan</label>
                <input type="text" readonly class="form-control" id="statuskaryawan" name="statuskaryawan"
                 autofocus value="{{ old('statuskaryawan', $recruitskus->statuskaryawan) }}">
              </div>

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
        </div>
</div>


@endif


</div>
      <!-- /.row -->
</div>
    <!-- /.card-body -->

</form>
</div>

@endsection
