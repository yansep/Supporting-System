@extends('layouts.master')

@section('content-header')

<form method="post" action="/dashboard/cma/{{ $recruitskus->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#menu1"><b>DATA SKU</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2"><b>DATA KELUARGA</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3"><b>DATA PERJALANAN</b></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu4"><b>PROSES</b></a>
                        </li>
                </ul>

                  <!-- Tab panes -->
                <div class="tab-content">

                    <div id="menu1" class="container tab-pane active"><br>
                       {{-- DATA SKU --}}
                        <div class="card card-default">
                            <div class="card-header">
                                 <h3 class="card-title"><b>Data SKU</b></h3>

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


                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                        <div class="mb-3">
                                                            <label for="nik" class="form-label">NIK</label>
                                                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                                            name="nik" readonly required autofocus value="{{ old('nik', $recruitskus->nik) }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                                            required readonly autofocus value="{{ old('nama', $recruitskus->nama) }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="PT" class="form-label">PT</label>
                                                            <input type="text" readonly class="form-control @error('PT') is-invalid @enderror" id="PT" name="PT"
                                                            required autofocus value="{{ old('PT', $recruitskus->user->PT) }}">
                                                        </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div>
                                                    <label for="province_id" class="form-label">Provinsi</label>
                                                    <input type="text" readonly class="form-control" id="province_id" name="province_id"
                                                    autofocus value="{{ old('province_id', $recruitskus->province->name) }}"><br>
                                                </div>

                                                <div>
                                                    <label for="regional" class="form-label">Kota / Kabupaten</label>
                                                    <input type="text" readonly class="form-control" id="regional" name="regional"
                                                    autofocus value="{{ old('regional', $recruitskus->regency->name) }}"><br>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="estate" class="form-label">ESTATE</label>
                                                    <input type="text" readonly class="form-control @error('estate') is-invalid @enderror" id="estate" name="estate"
                                                    required autofocus value="{{ old('estate', $recruitskus->user->estate) }}">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="menu2" class="container tab-pane fade"><br>
                       {{-- DATA STATUS KELUARGA --}}
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title"><b>Data Keluarga SKU</b></h3>

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

                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

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

                                                    <div class="col-md-6">
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
                                                    </div>

                                                    @endif
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="menu3" class="container tab-pane fade"><br>
                         {{-- DATA STATUS BIAYA --}}
                    @foreach ($perjalanan as $p)
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title"><b>Data Biaya SKU</b></h3>
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

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
                                            <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                                            autofocus value="{{ old('ketklaim', $recruitskus->ketklaim) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    </div>
                                </div><br>

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div>
                                                <label for="kab_asal" class="form-label">Kota / Kabupaten</label>
                                                <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal"
                                                autofocus value="{{ old('kab_asal', $p->kab_asal) }}"><br>
                                            </div>

                                            <div class="mb-3">
                                                <label for="org_transport" class="form-label">Transport X/Org</label>
                                                <input type="number" placeholder="Berapa Orang" class="form-control @error('org_transport')
                                                is-invalid @enderror" id="org_transport" name="org_transport" readonly
                                                required autofocus value="{{ old('org_transport', $p->org_transport) }}">
                                            </div><br><br><br><br>

                                            <div class="mb-3">
                                                <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                <input type="number" placeholder="Berapa Orang" class="form-control @error('org_cefetaria')
                                                is-invalid @enderror" id="org_cefetaria" name="org_cefetaria" readonly
                                                required autofocus value="{{ old('org_cefetaria', $p->org_cefetaria) }}">
                                            </div><br><br><br><br>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div>
                                                <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                                                <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba"
                                                autofocus value="{{ old('kab_tiba', $p->kab_tiba) }}"><br>
                                            </div>

                                                <div class="mb-3">
                                                        <label for="kolom1" class="form-label">Biaya Transport/Org</label>
                                                        <input type="number" placeholder="Rp." class="form-control @error('kolom1')
                                                        is-invalid @enderror" id="kolom1" name="kolom1" readonly
                                                        required autofocus value="{{ old('kolom1', $p->kolom1) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="total" class="form-label">Total Transport</label>
                                                    <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total" name="total"
                                                    autofocus value="{{ old('kolom1', $p->total_transport) }}" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                                                    <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                                                    is-invalid @enderror" id="kolom2" name="kolom2" readonly
                                                    required autofocus value="{{ old('kolom2', $p->kolom2) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="total" class="form-label">Total Cafetaria</label>
                                                    <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total" name="total"
                                                    autofocus value="{{ old('kolom1', $p->total_cafetaria) }}" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="total" class="form-label">Total Pengeluaran</label>
                                                    <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total" name="total"
                                                    autofocus value="{{ old('total', $p->total) }}" readonly>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    <div id="menu4" class="container tab-pane fade"><br>
                        {{-- PROSES --}}
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title"><b>PROSES</b></h3>
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

                            <div class="card-body">
                                <div class="row">
                                    {{-- PROSES NPK --}}
                                    @if ($recruitskus->npk != null)
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="npk" class="form-label">NPK</label>
                                                <input type="text" class="form-control @error('npk') is-invalid @enderror"
                                                id="npk" name="npk"readonly autofocus value="{{ old('npk', $recruitskus->npk) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tanggal_verif" class="form-label">Tanggal</label>
                                                <input type="text" class="form-control @error('tanggal_verif') is-invalid @enderror" id="tanggal_verif"
                                                name="tanggal_verif" readonly required autofocus value="{{ Carbon\Carbon::parse($tanggal_verif)->isoFormat('dddd, D MMMM Y') }}">
                                           </div>
                                        </div>
                                    @endif

                                    @if ($recruitskus->status == "Approvee" && $recruitskus->statushrhead == "Approve"
                                        && $recruitskus->statuspgs == "Approve"
                                        && $recruitskus->statuscma == "-" || $recruitskus->statuscma == "Approve")
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="statuscma" class="form-label">Prosses</label>
                                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                                name="statuscma" required>
                                                    <option selected value="">--PILIH--</option>
                                                    <option value="Approve" <?= $recruitskus->statuscma == "Approve" ?
                                                    "selected" : ""?>>Approve</option>
                                                    <option value="Reject" <?= $recruitskus->statuscma == "Reject" ?
                                                    "selected" : ""?>>Reject</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Prosses</button>
                                            <a href="/dashboard/cma/">
                                            <button class="btn btn-success" type="button">Back</button></a>
                                        </div>

                                        <div class="col-md-6">
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

                                        @elseif($recruitskus->statuscma == "Reject")

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="statuscma" class="form-label">Prosses</label>
                                                        <input type="text" readonly class="form-control" autofocus value="Status Rejeact">
                                                        <br>
                                                    </div>
                                                    <a href="/dashboard/cma/">
                                                    <button class="btn btn-success" type="button">Back</button></a>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="keterangan" class="form-label">Keterangan</label>
                                                        <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                                        id="keterangan" readonly name="keterangan"
                                                        placeholder="Isi Keterangan Bila Reject" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                                                    </div>
                                                </div>

                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

</form>
@endsection
