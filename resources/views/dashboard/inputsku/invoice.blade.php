@extends('layouts.master')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="dist/img/1.png" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light">RECRUITMENT SKU</span>
    </a>
</aside>

@section('content-header')
<form method="post" action="/dashboard/inputsku/invoice" enctype="multipart/form-data">
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
        </ul>
        <div class="tab-content">

            <div id="menu1" class="container tab-pane active">
                    {{-- @if(session()->has('success'))
                            <div class="alert alert-success col-lg-10" role="alert">
                                {{ session ('success') }}
                            </div>
                            @endif <br>

                        <div class="form-group">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                            required autofocus value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama SKU</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            required autofocus value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="provinsi" class="form-label">Provinsi</label>
                                <select class="form-control" style="width: 100%;" aria-label="Default select example"
                                    name="province_id" data-placeholder="Pilih Provinsi" required>
                                <option selected></option>
                                @foreach($province as $pos)
                                    <option value="{{$pos->id}}">{{$pos->name}}</option>
                                @endforeach
                            </select> <br>
                        </div>
                        <div class="form-group">
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

                                            <div class="mb-3">
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

                                        <div class="mb-3">
                                            <label for="regional" class="form-label">Kota / Kabupaten</label>
                                            <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                            name="regency_id" data-placeholder="Pilih Kota Kabupaten" required>
                                            <option selected></option>
                                            @foreach($regency as $pos)
                                            <option value="{{$pos->id}}">{{$pos->name}}</option>
                                            @endforeach
                                            </select><br>
                                        </div>
                                            <br>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div id="menu2" class="container tab-pane">
                    {{-- @if(session()->has('success'))
                        <div class="alert alert-success col-lg-10" role="alert">
                        {{ session ('success') }}
                        </div>
                        @endif
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
                        <div class="form-group">
                            <label for="k0" class="form-label">Nama Istri</label>
                            <input type="text" class="form-control @error('k0') is-invalid @enderror" id="k0" name="k0"
                            autofocus value="{{ old('k0') }}">

                            @error('k0')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="k1" class="form-label">Nama Anak 1</label>
                            <input type="text" class="form-control @error('k1') is-invalid @enderror" id="k1" name="k1"
                            autofocus value="{{ old('k1') }}">

                            @error('k1')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="k2" class="form-label">Nama Anak 2</label>
                            <input type="text" class="form-control @error('k2') is-invalid @enderror" id="k2" name="k2"
                            autofocus value="{{ old('k2') }}">

                            @error('k2')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="k3" class="form-label">Nama Anak 3</label>
                            <input type="text" class="form-control @error('k3') is-invalid @enderror" id="k3" name="k3"
                            autofocus value="{{ old('k3') }}">

                            @error('k3')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
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

            <div id="menu3" class="container tab-pane">
                {{-- @if(session()->has('success'))
                    <div class="alert alert-success col-lg-10" role="alert">
                    {{ session ('success') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="ketklaim" class="form-label">Keterangan Invoice / Non Invoice</label>
                        <input type="text" readonly class="form-control" id="ketklaim" name="ketklaim"
                        autofocus value="Invoice">
                    </div>
                    <div class="form-group">
                        <label for="kab_asal" class="form-label">Kota / Kabupaten</label>
                        <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal"
                        autofocus value="Di iSi HC Site"><br>
                    </div>
                    <div class="form-group">
                        <label for="org_transport" class="form-label">Transport X/Org</label>
                        <input type="text" readonly class="form-control" id="org_transport" name="org_transport"
                        autofocus value="0">
                    </div>
                    <div class="form-group">
                        <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                        <input type="text" readonly class="form-control" id="org_cefetaria" name="org_cefetaria"
                        autofocus value="0">
                    </div>
                    <div class="form-group">
                        <label for="floatingTextarea">Comments</label>
                        <textarea class="form-control" readonly placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                        <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba"
                        autofocus value="Di iSi HC Site"><br>
                    </div>
                    <div class="form-group">
                        <label for="kolom1" class="form-label">Transport</label>
                        <input type="text" readonly class="form-control" id="kolom1" name="kolom1"
                        autofocus value="0">
                    </div>
                    <div class="form-group">
                        <label for="total_transport" class="form-label">Total Transport</label>
                        <input type="text" readonly class="form-control" id="total_transport" name="total_transport"
                        autofocus value="0">
                    </div>
                    <div class="form-group">
                        <label for="kolom2" class="form-label">Cafetaria</label>
                        <input type="text" readonly class="form-control" id="kolom2" name="kolom2"
                        autofocus value="0">
                    </div>
                    <div class="form-group">
                        <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                        <input type="text" readonly class="form-control" id="total_cafetaria" name="total_cafetaria"
                        autofocus value="0">
                    </div>
                    <div class="form-group">
                        <label for="total" class="form-label">Total Pengeluaran</label>
                        <input type="text" readonly class="form-control" id="total" name="total"
                        autofocus value="0">
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
                --}}
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
                                        autofocus value="Invoice">
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
                                        autofocus value="Di iSi HC Site"><br>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label for="org_transport" class="form-label">Transport X/Org</label>
                                            <input type="number" readonly class="form-control" id="org_transport" name="org_transport"
                                            autofocus value="0">
                                        </div>
                                    </div>

                                            <div class="mb-3">
                                                <br><br><br><br>
                                            </div>


                                            <div class="form-group">
                                                <div>
                                                    <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                    <input type="number" readonly class="form-control" id="org_cefetaria" name="org_cefetaria"
                                                    autofocus value="0">
                                                </div>
                                            </div>
                                        <br><br><br><br>

                                        <div class="form-floating">
                                            <label for="floatingTextarea">Comments</label>
                                            <textarea class="form-control" readonly placeholder="Isi Komen disini" id="floatingTextarea"></textarea>
                                        </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div>
                                        <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                                        <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba"
                                        autofocus value="Di iSi HC Site"><br>
                                    </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="kolom1" class="form-label">Transport</label>
                                                <input type="number" readonly class="form-control" id="kolom1" name="kolom1"
                                                autofocus value="0">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_transport" class="form-label">Total Transport</label>
                                                <input type="number" readonly class="form-control" id="total_transport" name="total_transport"
                                                autofocus value="0">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="kolom2" class="form-label">Cafetaria</label>
                                                <input type="number" readonly class="form-control" id="kolom2" name="kolom2"
                                                autofocus value="0">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                <input type="number" readonly class="form-control" id="total_cafetaria" name="total_cafetaria"
                                                autofocus value="0">
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <div>
                                                <label for="total" class="form-label">Total Pengeluaran</label>
                                                <input type="number" readonly class="form-control" id="total" name="total"
                                                autofocus value="0">
                                            </div>
                                        </div>
                                </div>
                            </div>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

        </div>
    </div>
</form>

@endsection
