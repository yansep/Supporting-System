@extends('layouts.master')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="dist/img/1.png" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light">RECRUITMENT SKU</span>
    </a>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
   integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</aside>

@section('content-header')
<form method="post" action="/dashboard/inputsku/create" enctype="multipart/form-data">
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
              <a class="nav-link" data-toggle="tab" href="#menu4"><b>DATA BIAYA SKU</b></a>
            </li>
      </ul>

      <!-- Tab panes -->
    <div class="tab-content">

        <div id="menu1" class="container tab-pane active"><br>
            {{-- @if(session()->has('success'))
                <div class="alert alert-success col-lg-10" role="alert">
                    {{ session ('success') }}
                </div>
                @endif
                <div class="form-group pl-3 pr-3 pt-2">
                    <label for="npk" class="form-label">NPK</label>
                    <input type="text" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                    required autofocus value="{{ old('npk') }}">
                    @error('npk')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3 pt-2">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                    required autofocus value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="nama" class="form-label">Nama SKU</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    required autofocus value="{{ old('nama') }}">

                    @error('nama')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="dokumen_ktp" class="form-label">Upload KTP</label>
                    <input type="hidden" name="oldDokumen" value="{{ old('dokumen_ktp') }}">
                    <input class="form-control @error('dokumen_ktp') is-invalid @enderror" style="width: 100%;"
                    type="file" required id="dokumen_ktp" name="dokumen_ktp">

                    @error('dokumen_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                    name="province_id" data-placeholder="Pilih Provinsi" required>
                        <option selected></option>
                        @foreach($province as $pos)
                        <option value="{{$pos->id}}">{{$pos->name}}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="regional" class="form-label">Kota / Kabupaten</label>
                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                    name="regency_id" data-placeholder="Pilih Kota Kabupaten" required>
                        <option selected></option>
                        @foreach($regency as $pos)
                                <option value="{{$pos->id}}">{{$pos->name}}</option>
                            @endforeach
                    </select><br>
                </div>
            --}}
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

                                            <div>
                                                    <label for="dokumen_ktp" class="form-label">Upload KTP</label>
                                                    <input type="hidden" name="oldDokumen" value="{{ old('dokumen_ktp') }}">
                                                    <input class="form-control @error('dokumen_ktp') is-invalid @enderror" style="width: 100%;"
                                                    type="file" required id="dokumen_ktp" name="dokumen_ktp">

                                                    @error('dokumen_ktp')
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
                                    <option selected></option>
                                        @foreach($province as $pos)
                                        <option value="{{$pos->id}}">{{$pos->name}}</option>
                                        @endforeach
                                </select><br>
                                </div>

                                <div>
                                    <label for="regional" class="form-label">Kota / Kabupaten</label>
                                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                    name="regency_id" data-placeholder="Pilih Kota Kabupaten" required>
                                        <option selected></option>
                                        @foreach($regency as $pos)
                                                <option value="{{$pos->id}}">{{$pos->name}}</option>
                                            @endforeach
                                    </select><br>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="menu2" class="container tab-pane fade"><br>
            {{-- @if(session()->has('success'))
                <div class="alert alert-success col-lg-10" role="alert">
                {{ session ('success') }}
                </div>
                @endif
                <div class="form-group pl-3 pr-3">
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
                <div class="form-group pl-3 pr-3">
                    <label for="k0" class="form-label">Nama Istri</label>
                    <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
                    autofocus value="{{ old('k0') }}">

                    @error('k0')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="k1" class="form-label">Nama Anak 1</label>
                    <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
                    autofocus value="{{ old('k1') }}">

                    @error('k1')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="k2" class="form-label">Nama Anak 2</label>
                    <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
                    autofocus value="{{ old('k2') }}">

                    @error('k2')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="k3" class="form-label">Nama Anak 3</label>
                    <input type="text" class="form-control @error('k3') is-invalid @enderror" id="k3" name="k3"
                    autofocus value="{{ old('k3') }}">

                    @error('k3')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="dokumen_ktpistri" class="form-label">Upload KTP Suami/Istri (Pasangan yang di bawa)</label>
                    <input type="hidden" name="oldDokumen" value="{{ old('dokumen_ktpistri') }}">
                    <input class="form-control @error('dokumen_ktpistri') is-invalid @enderror" style="width: 100%;"
                    type="file" id="dokumen_ktpistri" name="dokumen_ktpistri">

                    @error('dokumen_ktpistri')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group pl-3 pr-3">
                    <label for="dokumen_kk" class="form-label">Upload KK</label>
                    <input type="hidden" name="oldDokumen" value="{{ old('dokumen_kk') }}">
                    <input class="form-control @error('dokumen_kk') is-invalid @enderror" style="width: 100%;"
                    type="file" id="dokumen_kk" name="dokumen_kk">

                    @error('dokumen_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            --}}
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
                                </div>
                            </div>

                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="dokumen_ktpistri" class="form-label">Upload KTP Suami/Istri (Pasangan yang di bawa)</label>
                                    <input type="hidden" name="oldDokumen" value="{{ old('dokumen_ktpistri') }}">
                                    <input class="form-control @error('dokumen_ktpistri') is-invalid @enderror" style="width: 100%;"
                                    type="file" id="dokumen_ktpistri" name="dokumen_ktpistri">

                                    @error('dokumen_ktpistri')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label for="dokumen_kk" class="form-label">Upload KK</label>
                                    <input type="hidden" name="oldDokumen" value="{{ old('dokumen_kk') }}">
                                    <input class="form-control @error('dokumen_kk') is-invalid @enderror" style="width: 100%;"
                                    type="file" id="dokumen_kk" name="dokumen_kk">

                                    @error('dokumen_kk')
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

        <div id="menu3" class="container tab-pane fade"><br>
            {{-- @if(session()->has('success'))
                <div class="alert alert-success col-lg-10" role="alert">
                {{ session ('success') }}
                </div>
                @endif
                <div class="form-group">
                    <div>
                        <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
                        <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                            autofocus value="Non Invoice">
                    </div>
                </div>
                <div class="form-group">
                    <label for="regional" class="form-label">Kota / Kabupaten Dari</label>
                    <select  class="form-control select2bs4" style="width: 100%;" name="kab_asal[0]"
                    data-placeholder="Pilih Kota Kabupaten Asal" required>
                        <option selected></option>
                        @foreach($regency as $pos)
                                <option value="{{$pos->name}}">{{$pos->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="org_transport" class="form-label">Transport X/Org</label>
                        <input type="text" placeholder="Berapa Orang" class="form-control @error('org_transport')
                        is-invalid @enderror" id="org_transport" name="org_transport[0]" onkeyup="jumlah();"
                        required autofocus value="">

                        @error('org_transport')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                    <input type="number" placeholder="Berapa Orang" class="form-control @error('org_cefetaria')
                    is-invalid @enderror" id="org_cefetaria" name="org_cefetaria[0]" onkeyup="sum()&jumlah1();"
                    required autofocus value="">

                    @error('org_cefetaria')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="floatingTextarea">Comments</label>
                    <textarea class="form-control" placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                </div>
                <div class="form-group">
                    <label for="regional" class="form-label">Kota / Kabupaten Tiba</label>
                        <div class="select2-purple">
                            <select  class="form-control select2bs4" style="width: 100%;"
                            name="kab_tiba[0]" data-placeholder="Pilih Kota Kabupaten Tiba" required>
                                <option selected></option>
                                @foreach($regency as $pos)
                                        <option value="{{$pos->name}}">{{$pos->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group">
                        <label for="kolom1" class="form-label">Biaya Transport/Org</label>
                        <input type="number" placeholder="Rp." class="form-control @error('kolom1')
                        is-invalid @enderror" id="kolom1" name="kolom1[0]" onkeyup="jumlah();"
                        required autofocus value="">

                        @error('kolom1')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="total_transport" class="form-label">Total Transport</label>
                    <input type="text" readonly class="form-control @error('total_transport') is-invalid @enderror"
                    id="total_transport" name="total_transport[0]" autofocus value="" >

                    @error('total_transport')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                    <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                    is-invalid @enderror" id="kolom2" name="kolom2[0]" onkeyup="sum()&jumlah1();"
                    required autofocus value="">

                    @error('kolom2')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                    <input type="text" readonly class="form-control @error('total_cafetaria')
                    is-invalid @enderror" id="total_cafetaria" name="total_cafetaria[0]" autofocus value= "">

                    @error('total_cafetaria')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total" class="form-label">Total Pengeluaran</label>
                    <input type="text" readonly class="form-control @error('total') is-invalid @enderror"
                    id="total" name="total[0]"
                    autofocus value="">

                    @error('total')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            --}}
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><b>Data PERJALANAN SKU</b></h3>

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
                                            autofocus value="Non Invoice">
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-12 col-sm-6">
                                <div>
                                    <label for="regional" class="form-label">Kota / Kabupaten Dari</label>
                                    <select  class="form-control select2bs4" style="width: 100%;" name="kab_asal[0]"
                                    data-placeholder="Pilih Kota Kabupaten Asal" required>
                                        <option selected></option>
                                        @foreach($regency as $pos)
                                                <option value="{{$pos->name}}">{{$pos->name}}</option>
                                            @endforeach
                                    </select>
                                </div><br>

                                <div class="mb-3">
                                        <label for="org_transport" class="form-label">Transport X/Org</label>
                                        <input type="number" placeholder="Berapa Orang" class="form-control @error('org_transport')
                                        is-invalid @enderror" id="org_transport" name="org_transport[0]" onkeyup="jumlah();"
                                        required autofocus value="">

                                        @error('org_transport')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                </div>

                                    <div class="mb-3">
                                        <br><br><br><br>
                                    </div>


                                    <div class="mb-3">
                                        <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                        <input type="number" placeholder="Berapa Orang" class="form-control @error('org_cefetaria')
                                        is-invalid @enderror" id="org_cefetaria" name="org_cefetaria[0]" onkeyup="sum()&jumlah1();"
                                        required autofocus value="">

                                        @error('org_cefetaria')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                <br><br><br><br>

                                <div class="form-floating">
                                    <label for="floatingTextarea">Comments</label>
                                    <textarea class="form-control" placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div>
                                        <label for="regional" class="form-label">Kota / Kabupaten Tiba</label>
                                            <div class="select2-purple">
                                                <select  class="form-control select2bs4" style="width: 100%;"
                                                name="kab_tiba[0]" data-placeholder="Pilih Kota Kabupaten Tiba" required>
                                                    <option selected></option>
                                                    @foreach($regency as $pos)
                                                            <option value="{{$pos->name}}">{{$pos->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                </div><br>


                                <div class="mb-3">
                                        <label for="kolom1" class="form-label">Biaya Transport/Org</label>
                                        <input type="number" placeholder="Rp." class="form-control @error('kolom1')
                                        is-invalid @enderror" id="kolom1" name="kolom1[0]" onkeyup="jumlah();"
                                        required autofocus value="">

                                        @error('kolom1')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="total_transport" class="form-label">Total Transport</label>
                                    <input type="number" readonly class="form-control @error('total_transport') is-invalid @enderror"
                                    id="total_transport" name="total_transport[0]" autofocus value="" >

                                    @error('total_transport')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div><br>

                                <script>
                                    function jumlah() {
                                        var txtFirstNumberValue = document.getElementById('org_transport').value;
                                        var txtSecondNumberValue = document.getElementById('kolom1').value;
                                        var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
                                        if (!isNaN(result)) {
                                            document.getElementById('total_transport').value = result;
                                        }
                                    }
                                </script>


                                <div class="mb-3">
                                    <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                                    <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                                    is-invalid @enderror" id="kolom2" name="kolom2[0]" onkeyup="sum()&jumlah1();"
                                    required autofocus value="">

                                    @error('kolom2')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                    <input type="number" readonly class="form-control @error('total_cafetaria')
                                    is-invalid @enderror" id="total_cafetaria" name="total_cafetaria[0]" autofocus value= "">

                                    @error('total_cafetaria')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div><br>


                                <script>
                                    function jumlah1() {
                                        var txtFirstNumberValue = document.getElementById('org_cefetaria').value;
                                        var txtSecondNumberValue = document.getElementById('kolom2').value;
                                        var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);

                                        if (!isNaN(result)) {
                                            document.getElementById('total_cafetaria').value = result;
                                        }
                                    }
                                </script>


                                <div class="mb-3">
                                    <label for="total" class="form-label">Total Pengeluaran</label>
                                    <input type="number" readonly class="form-control @error('total') is-invalid @enderror"
                                    id="total" name="total[0]"
                                    autofocus value="">

                                    @error('total')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <script>
                                    function sum() {
                                        var txtFirstNumberValue = document.getElementById('kolom1').value;
                                        var txtSecondNumberValue = document.getElementById('org_transport').value;
                                        var txtThirdNumberValue  = document.getElementById('kolom2').value;
                                        var txtFourthNumberValue  = document.getElementById('org_cefetaria').value;

                                        var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) +
                                                        parseFloat(txtThirdNumberValue) * parseFloat(txtFourthNumberValue);

                                        if (!isNaN(result)) {
                                            document.getElementById('total').value = result;
                                        }
                                    }
                                </script>

                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="menu4" class="container tab-pane fade"><br>
            <div id="form_dinamis"></div>
            <div class="container pl-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-primary" id="tambah">Tambah</button>
                <button type="button" class="btn btn-danger" id="hapus">Hapus</button>
            </div>
        </div>
        <div>
            <input type="hidden" readonly class="form-control" id="statuspgs" name="statuspgs"
            autofocus
            readonly value="-">
        </div>
        <div>
            <input type="hidden" readonly class="form-control" id="status" name="status"
            autofocus
            readonly value="-">
        </div>
        <div>
            <input type="hidden" readonly class="form-control" id="statusgahead" name="statusgahead"
            autofocus
            readonly value="-">
        </div>
        <div>
            <input type="hidden" readonly class="form-control" id="statushrhead" name="statushrhead"
            autofocus
            readonly value="-">
        </div>
        <div>
            <input type="hidden" readonly class="form-control" id="statuscma" name="statuscma"
            autofocus
            readonly value="-">
        </div>
        </div>

      </div>
    </div>
</div>

</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
    function jumlah() {
          var txtFirstNumberValue = document.getElementById('org_transport').value;
          var txtSecondNumberValue = document.getElementById('kolom1').value;
          var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
          if (!isNaN(result)) {
             document.getElementById('total_transport').value = result;
          }
    }
    function jumlah1() {
          var txtFirstNumberValue = document.getElementById('org_cefetaria').value;
          var txtSecondNumberValue = document.getElementById('kolom2').value;
          var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);

          if (!isNaN(result)) {
             document.getElementById('total_cafetaria').value = result;
          }
    }

    function sum() {
        var txtFirstNumberValue = document.getElementById('kolom1').value;
        var txtSecondNumberValue = document.getElementById('org_transport').value;
        var txtThirdNumberValue  = document.getElementById('kolom2').value;
        var txtFourthNumberValue  = document.getElementById('org_cefetaria').value;

        var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) +
        parseFloat(txtThirdNumberValue) * parseFloat(txtFourthNumberValue);

        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>

<script>
    $(document).ready(function(){
        var id = 0;
        $('#tambah').click(function(){
            id++;
            $('#form_dinamis').append(`
                <div class="card card-default" id="data_sku`+id+`">
                    <div class="card-header">
                        <h3 class="card-title"><b>Data Biaya SKU</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div>
                                    <label for="regional" class="form-label">Kota / Kabupaten Dari</label>
                                    <select  class="form-control select2bs4" style="width: 100%;" name="kab_asal[`+id+`]"
                                    data-placeholder="Pilih Kota Kabupaten Asal" required>
                                     <option selected></option>
                                                            @foreach($regency as $pos)
                                                                    <option value="{{$pos->name}}">{{$pos->name}}</option>
                                                                @endforeach
                                                        </select>
                                </div><br>
                                <div class="mb-3">
                                            <label for="org_transport" class="form-label">Transport X/Org</label>
                                            <input type="text" placeholder="Berapa Orang" class="form-control @error('org_transport')
                                            is-invalid @enderror" id="org_transport`+ id +`" name="org_transport[`+id+`]" onkeyup="jumlah();"
                                            required autofocus value="">

                                            @error('org_transport')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                                <div class="mb-3">
                                            <br><br><br><br>
                                </div>
                                <div class="mb-3">
                                            <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                            <input type="number" placeholder="Berapa Orang" class="form-control @error('org_cefetaria')
                                            is-invalid @enderror" id="org_cefetaria`+ id +`" name="org_cefetaria[`+id+`]" onkeyup="sum()&jumlah1();"
                                            required autofocus value="">

                                            @error('org_cefetaria')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                                    <br><br><br><br>
                                <div class="form-floating">
                                        <label for="floatingTextarea">Comments</label>
                                        <textarea class="form-control" placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div>
                                                            <label for="regional" class="form-label">Kota / Kabupaten Tiba</label>
                                                                <div class="select2-purple">
                                                                    <select  class="form-control select2bs4" style="width: 100%;"
                                                                    name="kab_tiba[`+id+`]" data-placeholder="Pilih Kota Kabupaten Tiba" required>
                                                                        <option selected></option>
                                                                        @foreach($regency as $pos)
                                                                                <option value="{{$pos->name}}">{{$pos->name}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                </div><br>

                                    <div class="mb-3">
                                            <label for="kolom1" class="form-label">Biaya Transport/Org</label>
                                            <input type="number" placeholder="Rp." class="form-control @error('kolom1')
                                            is-invalid @enderror" id="kolom1`+ id +`" name="kolom1[`+id+`]"
                                            onkeyup="jumlah(`+ id +`);"
                                            required autofocus value="">

                                            @error('kolom1')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="total_transport" class="form-label">Total Transport</label>
                                        <input type="text" readonly class="form-control @error('total_transport') is-invalid @enderror"
                                        id="total_transport`+ id +`" name="total_transport[`+id+`]" autofocus value="" >

                                        @error('total_transport')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div><br>

                                    <div class="mb-3">
                                        <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                                        <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                                        is-invalid @enderror" id="kolom2`+ id +`" name="kolom2[`+id+`]" onkeyup="sum(`+id+`)&jumlah1(`+id+`);"
                                        required autofocus value="">

                                        @error('kolom2')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                        <input type="text" readonly class="form-control @error('total_cafetaria')
                                        is-invalid @enderror" id="total_cafetaria`+ id +`" name="total_cafetaria[`+id+`]" autofocus value= "">

                                        @error('total_cafetaria')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div><br>

                                    <div class="mb-3">
                                        <label for="total" class="form-label">Total Pengeluaran</label>
                                        <input type="text" readonly class="form-control @error('total') is-invalid @enderror"
                                        id="total`+ id +`" name="total[`+id+`]"
                                        autofocus value="">

                                        @error('total')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            `)
        })

        $('#hapus').click(function(){
            $('#data_sku' + id).remove();
            id--;

        })
    })
    function jumlah($addon = "") {
                var txtFirstNumberValue = document.getElementById('org_transport'+ $addon).value;
                var txtSecondNumberValue = document.getElementById('kolom1' + $addon).value;
                var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
                if (!isNaN(result)) {
                document.getElementById('total_transport'+ $addon).value = result;
                }
            }


            function jumlah1($addon = "") {
                var txtFirstNumberValue = document.getElementById('org_cefetaria'+ $addon).value;
                var txtSecondNumberValue = document.getElementById('kolom2'+ $addon).value;
                var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);

                if (!isNaN(result)) {
                document.getElementById('total_cafetaria'+ $addon).value = result;
                }
            }

            function sum($addon = "") {
                var txtFirstNumberValue = document.getElementById('kolom1'+ $addon).value;
                var txtSecondNumberValue = document.getElementById('org_transport'+ $addon).value;
                var txtThirdNumberValue  = document.getElementById('kolom2'+ $addon).value;
                var txtFourthNumberValue  = document.getElementById('org_cefetaria'+ $addon).value;

                var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) +
                            parseFloat(txtThirdNumberValue) * parseFloat(txtFourthNumberValue);

                if (!isNaN(result)) {
                document.getElementById('total'+ $addon).value = result;
                }
            }
</script>
@endsection
