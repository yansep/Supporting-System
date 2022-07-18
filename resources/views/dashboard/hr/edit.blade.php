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
            <form method="post" action="/dashboard/hr/{{ $recruitskus->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" readonly class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                    required autofocus value="{{ old('nik', $recruitskus->nik) }}">
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
    </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="statuskaryawan" class="form-label">Status Tanggungan Karyawan</label>
                <input type="text" readonly class="form-control @error('statuskaryawan') is-invalid @enderror" id="statuskaryawan" name="statuskaryawan"
                required autofocus value="{{ old('statuskaryawan', $recruitskus->statuskaryawan) }}">
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

{{-- -------------------------------------------------------------------------- --}}
            @if ($recruitskus->status == "Approve" && $recruitskus->statusgahead == "Approve")
                <div class="mb-3">
                <label for="npk" class="form-label">NPK Rekrut</label>
                <input type="number" placeholder="Masukan NPK" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                required autofocus value="{{ old('npk', $recruitskus->npk) }}">

                    @error('npk')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>

                 @elseif ($recruitskus->ketklaim == "Non Invoice" && $recruitskus->npk == null)
                    <div class="mb-3">
                        <label for="npk" class="form-label">NPK Rekrut</label>
                        <input type="number" placeholder="Masukan NPK" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                        required autofocus value="{{ old('npk', $recruitskus->npk) }}">

                        @error('npk')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>


                 @elseif ($recruitskus->npk != null)
                    <div class="mb-3">
                        <label for="npk" class="form-label">NPK Rekrut</label>
                        <input type="number" placeholder="Masukan NPK" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                        required readonly autofocus value="{{ old('npk', $recruitskus->npk) }}">
                    </div>
            @endif

            @if ($recruitskus->statuscma != null)
                <div class="mb-3">
                <label for="kolom1" class="form-label">Transport</label>
                <input type="number" placeholder="Rp."  class="form-control @error('kolom1') is-invalid @enderror" id="kolom1" name="kolom1"
                required autofocus readonly value="{{ old('kolom1', $recruitskus->kolom1) }}">
                </div>

                <div class="mb-3">
                <label for="kolom2" class="form-label">Cafetaria</label>
                <input type="number" readonly placeholder="Rp."  class="form-control @error('kolom2') is-invalid @enderror" id="kolom2" name="kolom2"
                required autofocus value="{{ old('kolom2', $recruitskus->kolom2) }}">
                </div>

                <div class="mb-3">
                <label for="total" class="form-label">Total Pengeluaran</label>
                <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total" name="total"
                autofocus value="{{ old('total', $recruitskus->kolom1 + $recruitskus->kolom2) }}">
                </div>

            @elseif($recruitskus->statuscma == null && $recruitskus->statuspgs== "HR Staff memproses Lampiran")
            <div class="mb-3">
              <label for="kolom1" class="form-label">Transport</label>
              <input type="number" placeholder="Rp." class="form-control @error('kolom1')
              is-invalid @enderror" id="kolom1" name="kolom1"
              required autofocus value="{{ old('kolom1', $recruitskus->kolom1) }}">

                @error('kolom1')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="kolom2" class="form-label">Cafetaria</label>
              <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
              is-invalid @enderror" id="kolom2" name="kolom2"
              required autofocus value="{{ old('kolom2', $recruitskus->kolom2) }}">

                @error('kolom2')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="total" class="form-label">Total Pengeluaran</label>
              <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total" name="total"
               autofocus value="{{ old('total', $recruitskus->kolom1 + $recruitskus->kolom2) }}">

                @error('total')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            @endif

            {{-- <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control @error('nik') is-invalid @enderror" id="tanggal" name="tanggal"
               autofocus value="{{ Carbon\Carbon::now($recruitskus->tanggal)->isoFormat('dddd, D MMMM Y') }}" >
               @error('tanggal')
               <div class="invalid-feedback">
               {{ $message }}
               </div>
           @enderror
              </div> --}}

          {{-- ============================================================================ --}}
          @if ($recruitskus->status == null)
                <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                  <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                    <option selected value="">--PILIH--</option>
                    <option value="Approve" <?= $recruitskus->status == "Approve" ?
                      "selected" : ""?>>Approve</option>
                    <option value="Prosess di Reaject Oleh HR Staff" <?= $recruitskus->status == "Prosess Di Reaject HR Staff" ?
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
            <button type="submit" class="btn btn-primary">Prosses</button>  <a href="/dashboard/hr/">
                <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->statuspgs == "Prosess di Reaject PGS")
                <div class="mb-3">
                      <label for="status" class="form-label">Proses</label>
                      <input type="text" readonly class="form-control" id="status" name="status"
                      autofocus value="{{ old('statuspgs', $recruitskus->statuspgs) }}">
                    </div>
                 <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <input readonly type="text" readonly class="form-control" id="keterangan" name="keterangan"
                   autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                </div>
                 <a href="/dashboard/hr">
                  <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->statuspgs == "HR Staff memproses Lampiran" && $recruitskus->statuscma == null)
                {{-- <div class="mb-3">
                    <label for="dokumen" class="form-label">Uplod Voucher</label>
                    <input type="hidden" name="oldDokumen" value="{{ $recruitskus->dokumen }}">
                    <input class="form-control @error('dokumen') is-invalid @enderror"
                    type="file" id="dokumen" name="dokumen">
                  @error('dokumen')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>--}}

                  <div class="mb-3">
                        <label for="status" class="form-label">Prosses</label>
                        <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                        <option selected value="">--PILIH--</option>
                        <option value="Approve" <?= $recruitskus->status == "Approve" ?
                          "selected" : ""?>>Approve</option>
                        <option value="Prosess di Reaject Oleh HR Staff" <?= $recruitskus->status == "Prosess di Reaject Oleh HR Staff" ?
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
                  <button type="submit" class="btn btn-primary">Prosses</button>  <a href="/dashboard/hr/">
                    <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->statusgahead == "Approve" && $recruitskus->ketklaim == "Invoice"
          && $recruitskus->statushrhead == null)
              <div class="mb-3">
                  <label for="status" class="form-label">Prosses</label>
                  <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                  <option selected value="">--PILIH--</option>
                  <option value="Approve" <?= $recruitskus->status == "Approve" ?
                    "selected" : ""?>>Approve</option>
                  <option value="Prosess di Reaject Oleh HR Staff" <?= $recruitskus->status == "Prosess Di Reaject HR Staff" ?
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
              <button type="submit" class="btn btn-primary">Prosses</button>  <a href="/dashboard/hr/">
                  <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
           && $recruitskus->statushrhead == "Approve" && $recruitskus->statuspgs == null)
                  <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                    <input type="text" readonly class="form-control" id="total" name="total"
                    autofocus value="Menunggu Verifikasi PGS">
                  </div>

                  <a href="/dashboard/hr/">
                  <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
                  && $recruitskus->statushrhead == "Prosess di Reaject HR Head" && $recruitskus->statuspgs == null)
                         <div class="mb-3">
                           <label for="status" class="form-label">Prosses</label>
                           <input type="text" readonly class="form-control" id="total" name="total"
                           autofocus value="Prosess di Reaject HR Head">
                         </div>
                         <div class="mb-3">
                          <label for="keterangan" class="form-label">Keterangan</label>
                          <textarea readonly type="text" class="form-control @error('keterangan') is-invalid @enderror"
                          id="keterangan" name="keterangan"
                          placeholder="Isi Keterangan Bila Reject" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                          @error('keterangan')
                                <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                            @enderror
                        </div>
                         <a href="/dashboard/hr/">
                         <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->status == "Approve" && $recruitskus->ketklaim == "Non Invoice"
          && $recruitskus->kolom1 == null)
                <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                      <option selected value="">--PILIH--</option>
                      <option value="Approve" <?= $recruitskus->status == "Approve" ?
                        "selected" : ""?>>Approve</option>
                      <option value="Prosess di Reaject Oleh HR Staff" <?= $recruitskus->status == "Prosess Di Reaject HR Staff" ?
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
                <button type="submit" class="btn btn-primary">Prosses</button>  <a href="/dashboard/hr/">
                  <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->status == "Approve" && $recruitskus->statusgahead == null
          && $recruitskus->statushrhead == null)
                  <div class="mb-3">
                    <label for="status" class="form-label">Prosses</label>
                    <input type="text" readonly class="form-control" id="total" name="total"
                    autofocus value="Menunggu Verifikasi GA">
                  </div>

                  <a href="/dashboard/hr/">
                    <button class="btn btn-success" type="button">Back</button></a>

            @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
            && $recruitskus->statushrhead != null && $recruitskus->statuspgs != null && $recruitskus->statuscma == null)
                <div class="mb-3">
                  <label for="status" class="form-label">Prosses</label>
                  <input type="text" readonly class="form-control" id="total" name="total"
                  autofocus value="Menunggu Verifikasi CMA">
                </div>

                <a href="/dashboard/hr/">
                  <button class="btn btn-success" type="button">Back</button></a>

          @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
              && $recruitskus->statushrhead != null && $recruitskus->statuspgs != null && $recruitskus->statuscma == "Approve")
               <div class="mb-3">
                 <label for="status" class="form-label">Prosses</label>
                 <input type="text" readonly class="form-control" id="total" name="total"
                 autofocus value="Approve CMA">
               </div>

               <a href="/dashboard/hr/">
                <button class="btn btn-success" type="button">Back</button></a>

            @elseif ($recruitskus->status == "Prosess di Reaject Oleh HR Staff")
               <div class="mb-3">
                 <label for="status" class="form-label">Prosses</label>
                 <input type="text" readonly class="form-control" id="total" name="total"
                 autofocus value="Prosess di Reaject Oleh HR Staff">
               </div>
               <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror"
                id="keterangan" readonly name="keterangan"
                placeholder="Isi Keterangan Bila Reject" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                @error('keterangan')
                      <div class="invalid-feedback">
                      {{ $message }}
              </div>
                  @enderror
              </div>
               <a href="/dashboard/hr/">
                <button class="btn btn-success" type="button">Back</button></a>

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
                  <a href="/dashboard/hr">
                  <button class="btn btn-success" type="button">Back</button></a>
          @endif

            @if ($recruitskus->statuspgs == "HR Staff memproses Lampiran")
            <a href=" {{ asset($recruitskus->dokumen) }}">
              <button class="btn btn-success" download="" type="button">Download</button></a>
              <a href="/dashboard/hr/"><button class="btn btn-warning" type="button">Back</button></a>
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
<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="plugins/jquery.masknumber.js"></script>
  <script src="dist/js/jquery.masknumber.js"></script>
  <script src="plugins/jquery/jquery.masknumber.js"></script>

  <!-- page script -->
  <script>
       $(document).ready(function(){
          $("#kolom1").keyup(function(){
              $(this).maskNumber({integer: true, thousands:"."})
          });
      });
  </script>
</html>
