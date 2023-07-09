@extends('layouts.master')

@section('content-header')
    <form method="post" action="/dashboard/sku/{{ $recruitskus->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf

        @if ($recruitskus->status == null && $recruitskus->statushrhead == null
                && $recruitskus->statusgahead == null && $recruitskus->statuspgs == null
                && $recruitskus->statuscma == null)

                {{-- DATA SKU --}}
                <div class="card card-default">
                    @csrf
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
                                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                                        required autofocus value="{{ old('nik', $recruitskus->nik) }}">

                                                        @error('nik')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

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
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                            name="province_id" data-placeholder="Pilih Provinsi" required>
                                            <option selected>Pilih Provinsi....</option>
                                                @foreach($province as $province_id)
                                                <option value="{{ $province_id->id }}"
                                                    @if($province_id->id == $recruitskus->province_id) selected
                                                    @endif>{{ $province_id->name }}</option>
                                                @endforeach
                                            </select><br>
                                        </div>

                                        <div>
                                            <label for="regional" class="form-label">Kota / Kabupaten</label>
                                            <select  class="form-control select2bs4" style="width: 100%;" name="regency_id" required>
                                                <option selected>Pilih Kota Kabupaten....</option>
                                                @foreach($regency as $regency_id)
                                                    <option value="{{ $regency_id->id }}" @if($regency_id->id == $recruitskus->regency_id) selected
                                                        @endif>{{ $regency_id->name }}</option>
                                                @endforeach
                                            </select><br>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- DATA STATUS KELUARGA --}}
                <div class="card card-default">
                    @csrf
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
                                            <label for="statuskaryawan" class="form-label">Status Tanggungan Karyawan</label>
                                            <select class="form-control select2" data-placeholder="Pilih Status"
                                            aria-label="Default select example" style="width: 100%;"  name="statuskaryawan" required>
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
                                         autofocus  value="{{  old('k0', $recruitskus->k0) }}">

                                          @error('k0')
                                              <div class="invalid-feedback">
                                              {{ $message }}
                                              </div>
                                          @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="k1" class="form-label">Nama Anak 1</label>
                                        <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
                                         autofocus  value="{{  old('k1', $recruitskus->k1) }}">

                                        @error('k1')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="k2" class="form-label">Nama Anak 2</label>
                                            <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
                                            autofocus  value="{{  old('k2', $recruitskus->k2) }}">

                                            @error('k2')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="k3" class="form-label">Nama Anak 3</label>
                                            <input type="text" class="form-control @error('k3') is-invalid @enderror" id="k3" name="k3"
                                            autofocus  value="{{  old('k3', $recruitskus->k3) }}">

                                            @error('k3')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DATA STATUS BIAYA --}}
                <div class="card card-default">
                    @csrf
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
                                    <div class="form-group">
                                        <div>
                                            <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
                                            <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                                            autofocus value="{{ old('ketklaim', $recruitskus->ketklaim) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div>
                                            <label for="kab_asal" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal"
                                            autofocus value=""><br>
                                        </div><br><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="org_transport" class="form-label">Transport X/Org</label>
                                                <input type="text" readonly class="form-control" id="org_transport" name="org_transport"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <br><br><br><br>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                <input type="text" readonly class="form-control" id="org_cefetaria" name="org_cefetaria"
                                                autofocus value="">
                                            </div>
                                        </div><br><br><br><br>

                                        <div class="form-floating">
                                            <label for="floatingTextarea">Comments</label>
                                            <textarea class="form-control" readonly placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div>
                                            <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba"
                                            autofocus value=""><br>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <div>
                                                <label for="kolom1" class="form-label">Transport</label>
                                                <input type="text" readonly class="form-control" id="kolom1" name="kolom1"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_transport" class="form-label">Total Transport</label>
                                                <input type="text" readonly class="form-control" id="total_transport" name="total_transport"
                                                autofocus value="">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="kolom2" class="form-label">Cafetaria</label>
                                                <input type="text" readonly class="form-control" id="kolom2" name="kolom2"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                <input type="text" readonly class="form-control" id="total_cafetaria" name="total_cafetaria"
                                                autofocus value="">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="total" class="form-label">Total Pengeluaran</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/dashboard/sku/index">
                <button class="btn btn-success" type="button">Back</button></a>


            {{-- Jika Proses Reject belum di prosses --}}
        @elseif($recruitskus->status == "Reject" || $recruitskus->statuspgs == "Reject"
                || $recruitskus->statushrhead == "Reject" || $recruitskus->statusgahead == "Reject"
                || $recruitskus->statuscma == "Reject")

                {{-- DATA SKU --}}
                <div class="card card-default">
                    @csrf
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
                                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                        id="nik" name="nik" required autofocus value="{{ old('nik', $recruitskus->nik) }}">

                                                        @error('nik')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

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
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                            name="province_id" data-placeholder="Pilih Provinsi" required>
                                            <option selected>Pilih Provinsi....</option>
                                                @foreach($province as $province_id)
                                                <option value="{{ $province_id->id }}" @if($province_id->id == $recruitskus->province_id) selected
                                                    @endif>{{ $province_id->name }}</option>
                                                @endforeach
                                            </select><br>
                                        </div>

                                        <div>
                                            <label for="regional" class="form-label">Kota / Kabupaten</label>
                                            <select  class="form-control select2bs4" style="width: 100%;" name="regency_id" required>
                                                <option selected>Pilih Kota Kabupaten....</option>
                                                @foreach($regency as $regency_id)
                                                    <option value="{{ $regency_id->id }}" @if($regency_id->id == $recruitskus->regency_id) selected
                                                        @endif>{{ $regency_id->name }}</option>
                                                @endforeach
                                            </select><br>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- DATA STATUS KELUARGA --}}
                <div class="card card-default">
                    @csrf
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
                                            <label for="statuskaryawan" class="form-label">Status Tanggungan Karyawan</label>
                                            <select class="form-control select2" data-placeholder="Pilih Status"
                                            aria-label="Default select example" style="width: 100%;"  name="statuskaryawan" required>
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
                                         autofocus  value="{{  old('k0', $recruitskus->k0) }}">

                                          @error('k0')
                                              <div class="invalid-feedback">
                                              {{ $message }}
                                              </div>
                                          @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="k1" class="form-label">Nama Anak 1</label>
                                        <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
                                         autofocus  value="{{  old('k1', $recruitskus->k1) }}">

                                        @error('k1')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="k2" class="form-label">Nama Anak 2</label>
                                            <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
                                            autofocus  value="{{  old('k2', $recruitskus->k2) }}">

                                            @error('k2')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="k3" class="form-label">Nama Anak 3</label>
                                            <input type="text" class="form-control @error('k3') is-invalid @enderror" id="k3" name="k3"
                                            autofocus  value="{{  old('k3', $recruitskus->k3) }}">

                                            @error('k3')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DATA STATUS BIAYA --}}
                <div class="card card-default">
                    @csrf
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
                                    <div class="form-group">
                                        <div>
                                            <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
                                            <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                                            autofocus value="{{ old('ketklaim', $recruitskus->ketklaim) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div>
                                            <label for="kab_asal" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal"
                                            autofocus value=""><br>
                                        </div><br><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="org_transport" class="form-label">Transport X/Org</label>
                                                <input type="text" readonly class="form-control" id="org_transport" name="org_transport"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <br><br><br><br>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                <input type="text" readonly class="form-control" id="org_cefetaria" name="org_cefetaria"
                                                autofocus value="">
                                            </div>
                                        </div><br><br><br><br>

                                        <div class="form-floating">
                                            <label for="floatingTextarea">Comments</label>
                                            <textarea class="form-control" readonly placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div>
                                            <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba"
                                            autofocus value=""><br>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <div>
                                                <label for="kolom1" class="form-label">Transport</label>
                                                <input type="text" readonly class="form-control" id="kolom1" name="kolom1"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_transport" class="form-label">Total Transport</label>
                                                <input type="text" readonly class="form-control" id="total_transport" name="total_transport"
                                                autofocus value="">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="kolom2" class="form-label">Cafetaria</label>
                                                <input type="text" readonly class="form-control" id="kolom2" name="kolom2"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                <input type="text" readonly class="form-control" id="total_cafetaria" name="total_cafetaria"
                                                autofocus value="">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="total" class="form-label">Total Pengeluaran</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                {{-- PROSES --}}
                <div class="card card-default">
                    @csrf
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

                                 {{-- Prosess di Reject HR Head --}}
                                @if ($recruitskus->status == "Approve" && $recruitskus->npk != null
                                        && $recruitskus->statushrhead == "Reject")
                                        <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Prosses</label>
                                                    <input type="text" readonly class="form-control" id="total" name="total"
                                                    autofocus value="Prosess di Reject HR Head">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="/dashboard/sku">
                                                <button class="btn btn-success" type="button">Back</button></a>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                                                autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                                            </div>
                                        </div>

                                @elseif ($recruitskus->status == "Reject")
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Prosses</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="Prosess di Reject Oleh HR Staff">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                                                    autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                                                </div>
                                            </div>

                                        </div>

                                @elseif ($recruitskus->statusgahead == "Reject")
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Prosses</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="Prosess di Reject GA">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                                                    autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                                                </div>
                                            </div>

                                        </div>

                                @elseif ($recruitskus->statushrhead == "Reject")
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Prosses</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="Prosess di Reject HR Head">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                                                    autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                                                </div>
                                            </div>

                                        </div>

                                @elseif ($recruitskus->statuscma == "Reject")
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Prosses</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="Prosess di Reject CMA">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                                                    autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>


        @elseif( $recruitskus->status == "Approve" || $recruitskus->statushrhead == "Approve"
                || $recruitskus->statusgahead == "Approve" || $recruitskus->statuspgs == "Approve"
                || $recruitskus->statuscma == "Approve"
                )

                {{-- DATA SKU --}}
                <div class="card card-default">
                    @csrf
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

                                                    @if ($recruitskus->npk != null)
                                                        <div class="mb-3">
                                                            <label for="npk" class="form-label">NPK</label>
                                                            <input type="text" class="form-control @error('npk') is-invalid @enderror"
                                                            id="npk" name="npk"readonly autofocus value="{{ old('npk', $recruitskus->npk) }}">
                                                        </div>
                                                    @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        {{-- <div>
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                            name="province_id" data-placeholder="Pilih Provinsi" required readonly
                                            >
                                                @foreach ($province as $province_id)
                                                <option readonly value="{{ $province_id->id }}"
                                                    @if  ($province_id->id == $recruitskus->province_id) selected
                                                    @endif>{{ $province_id->name }}</option>
                                                @endforeach
                                                value="{{ old('province_id', $recruitskus->province->name == $recruitskus->province_id) }}"


                                                @foreach($province as $province_id)
                                                    <option readonly value="{{$province_id->id}}">{{$province_id->name}}</option>
                                                @endforeach
                                            </select><br>
                                        </div> --}}

                                        <div>
                                            <label for="province" class="form-label">Provinsi</label>
                                            <input type="text" readonly class="form-control"
                                            autofocus placeholder=""
                                            readonly value="{{ $recruitskus->province->name }}">
                                            <br>
                                        </div>

                                        <div>
                                            <input type="hidden" readonly class="form-control" id="province_id" name="province_id"
                                            autofocus placeholder="{{ old('province_id',$recruitskus->province_id) }}"
                                            readonly value="{{ old('province_id',$recruitskus->province_id) }}">
                                        </div>

                                        <div>
                                            <input type="hidden" readonly class="form-control" id="regency_id" name="regency_id"
                                            autofocus placeholder="{{ old('regency_id',$recruitskus->regency_id) }}"
                                            readonly value="{{ old('regency_id',$recruitskus->regency_id) }}">
                                        </div>

                                        <div>
                                            <label for="regional" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control"
                                            autofocus value="{{ old('regency_id', $recruitskus->regency->name) }}">
                                            <br>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- DATA STATUS KELUARGA --}}
                <div class="card card-default">
                    @csrf
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

                {{-- DATA STATUS BIAYA --}}
                <div class="card card-default">
                    @csrf
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
                                    <div class="form-group">
                                        <div>
                                            <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
                                            <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                                            autofocus value="{{ old('ketklaim', $recruitskus->ketklaim) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div>
                                            <label for="kab_asal" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal"
                                            autofocus value=""><br>
                                        </div><br><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="org_transport" class="form-label">Transport X/Org</label>
                                                <input type="text" readonly class="form-control" id="org_transport" name="org_transport"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <br><br><br><br>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                <input type="text" readonly class="form-control" id="org_cefetaria" name="org_cefetaria"
                                                autofocus value="">
                                            </div>
                                        </div><br><br><br><br>

                                        <div class="form-floating">
                                            <label for="floatingTextarea">Comments</label>
                                            <textarea class="form-control" readonly placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div>
                                            <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba"
                                            autofocus value=""><br>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <div>
                                                <label for="kolom1" class="form-label">Transport</label>
                                                <input type="text" readonly class="form-control" id="kolom1" name="kolom1"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_transport" class="form-label">Total Transport</label>
                                                <input type="text" readonly class="form-control" id="total_transport" name="total_transport"
                                                autofocus value="">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="kolom2" class="form-label">Cafetaria</label>
                                                <input type="text" readonly class="form-control" id="kolom2" name="kolom2"
                                                autofocus value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                <input type="text" readonly class="form-control" id="total_cafetaria" name="total_cafetaria"
                                                autofocus value="">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="total" class="form-label">Total Pengeluaran</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


                {{-- PROSES --}}
                <div class="card card-default">
                    @csrf
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
                                @if ($recruitskus->statushrhead == "Approve" && $recruitskus->statuspgs == null)
                                {{-- DONE Proses Di PGS--}}
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="statuspgs" class="form-label">Prosses</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                        aria-label="Default select example" name="statuspgs" required>

                                                        <option selected value="">--PILIH--</option>
                                                        <option value="Approve"
                                                        <?= $recruitskus->statuspgs == "Approve" ?
                                                        "selected" : ""?>>Approve</option>

                                                        <option value="Reject"
                                                        <?= $recruitskus->statuspgs == "Reject" ?
                                                        "selected" : ""?>>Reject</option>
                                                    </select>
                                            </div><br><br><br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="/dashboard/sku">
                                            <button class="btn btn-success" type="button">Back</button></a>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tanggal_verif" class="form-label">Tanggal</label>
                                                <input type="text" class="form-control @error('tanggal_verif') is-invalid @enderror" id="tanggal_verif"
                                                name="tanggal_verif" readonly required autofocus value="{{ Carbon\Carbon::parse($tanggal_verif)->isoFormat('dddd, D MMMM Y') }}">
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

                                {{-- DONE Menunggu verif GA--}}
                                @elseif ($recruitskus->status == "Approve" && $recruitskus->statusgahead == null
                                        && $recruitskus->npk == null && $recruitskus->ketklaim == "Invoice" )
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Prosses</label>
                                                    <input type="text" readonly class="form-control" id="total" name="total"
                                                    autofocus value="Menunggu Verifikasi GA">
                                            </div>
                                            <a href="/dashboard/sku">
                                            <button class="btn btn-success" type="button">Back</button></a>
                                        </div>

                                {{-- DONE Menunggu Verifikasi HR Head--}}
                                @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null && $recruitskus->statusgahead == "Approve"
                                        && $recruitskus->statushrhead == null && $recruitskus->ketklaim == "Invoice" ||
                                        $recruitskus->status == "Approve" && $recruitskus->npk != null
                                        && $recruitskus->statushrhead == null )

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Prosses</label>
                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                autofocus value="Menunggu Verifikasi HR Head">
                                            </div>
                                                <a href="/dashboard/sku">
                                                <button class="btn btn-success" type="button">Back</button></a>
                                        </div>

                                {{-- DONE Approve CMA--}}
                                @elseif ($recruitskus->statuscma == "Approve")
                                        <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Prosses</label>
                                                    <input type="text" readonly class="form-control" id="total" name="total"
                                                        autofocus value="Approve CMA">
                                                </div>
                                                <a href="/dashboard/sku">
                                                <button class="btn btn-success" type="button">Back</button></a>
                                        </div>

                                {{-- DONE Menunggu Verifikasi CMA--}}
                                @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
                                         && $recruitskus->kolom1 != null && $recruitskus->statuscma == null
                                         && $recruitskus->statuspgs == "Approve")
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                    <label for="status" class="form-label">Prosses</label>
                                                    <input type="text" readonly class="form-control" id="total" name="total"
                                                    autofocus value="Menunggu Verifikasi CMA">
                                            </div>
                                                <a href="/dashboard/sku">
                                                <button class="btn btn-success" type="button">Back</button></a>
                                        </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

        {{-- @elseif( $recruitskus->status == "Approve" || $recruitskus->statushrhead == "Approve"
                || $recruitskus->statusgahead == "Approve" || $recruitskus->statuspgs == "Approve"
                || $recruitskus->statuscma == "Approve"
                ) --}}
        @endif
    </form>
@endsection
