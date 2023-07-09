@extends('layouts.master')

@section('content-header')
    <form method="post" action="/dashboard/sku/{{ $recruitskus->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
            <div class="form-group">
                <input type="hidden" name="recruitsku_id" value="{{$recruitskus->id}}">
            </div>
        @if ($recruitskus->status == "-" && $recruitskus->statushrhead == "-"
                && $recruitskus->statusgahead == "-" && $recruitskus->statuspgs == "-"
                && $recruitskus->statuscma == "-")
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
                        {{-- @if ($recruitskus->ketklaim == "Non Invoice")
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu4"><b>TAMBAH DATA PERJALANAN</b></a>
                        </li>
                        @endif --}}
                    </ul>
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


                        @if ($recruitskus->perjalanan->kab_asal == "Di iSi HC Site")
                            <div id="menu3" class="container tab-pane fade"><br>
                                {{-- DATA STATUS BIAYA --}}
                                @foreach($perjalanan as $perjalanan)
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Data Biaya SKU</b></h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                                                </div>
                                        </div>


                                        <div class="form-group">
                                            <input type="hidden" name="perjalanan_id[{{$perjalanan->id}}]" value="{{$perjalanan->id}}">
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
                                                            <input type="text" readonly class="form-control"
                                                            id="kab_asal" name="kab_asal[{{$perjalanan->id}}]"
                                                            autofocus value="Di iSi HC Site"><br>
                                                        </div>

                                                        <div class="form-group">
                                                            <div>
                                                                <label for="org_transport" class="form-label">Transport X/Org</label>
                                                                <input type="text" readonly class="form-control"
                                                                id="org_transport" name="org_transport[{{$perjalanan->id}}]"
                                                                autofocus value="0">
                                                            </div>
                                                        </div>

                                                                <div class="mb-3">
                                                                    <br><br><br><br>
                                                                </div>


                                                                <div class="form-group">
                                                                    <div>
                                                                        <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                                        <input type="text" readonly class="form-control"
                                                                        id="org_cefetaria" name="org_cefetaria[{{$perjalanan->id}}]"
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
                                                            <input type="text" readonly class="form-control"
                                                            id="kab_tiba" name="kab_tiba[{{$perjalanan->id}}]"
                                                            autofocus value="Di iSi HC Site"><br>
                                                        </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="kolom1" class="form-label">Transport</label>
                                                                    <input type="text" readonly class="form-control"
                                                                    id="kolom1" name="kolom1[{{$perjalanan->id}}]"
                                                                    autofocus value="0">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="total_transport" class="form-label">Total Transport</label>
                                                                    <input type="text" readonly class="form-control"
                                                                    id="total_transport" name="total_transport[{{$perjalanan->id}}]"
                                                                    autofocus value="0">
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="kolom2" class="form-label">Cafetaria</label>
                                                                    <input type="text" readonly class="form-control"
                                                                    id="kolom2" name="kolom2[{{$perjalanan->id}}]"
                                                                    autofocus value="0">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                                    <input type="text" readonly class="form-control" id="total_cafetaria"
                                                                    name="total_cafetaria[{{$perjalanan->id}}]"
                                                                    autofocus value="0">
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="total" class="form-label">Total Pengeluaran</label>
                                                                    <input type="text" readonly class="form-control" id="total"
                                                                    name="total[{{$perjalanan->id}}]"
                                                                    autofocus value="0">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                    <a href="/dashboard/sku">
                                    <button class="btn btn-success" type="button">BACK</button></a>
                            </div>

                        @else
                            <div id="menu3" class="container tab-pane fade"><br>
                                {{-- DATA STATUS BIAYA --}}
                                @foreach($perjalanan as $perjalanan)
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
                                                        <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                                            name="ketklaim" data-placeholder="Pilih Status Pembayaran" required>

                                                            <option value="Invoice" <?= $recruitskus->ketklaim == "Invoice" ?
                                                                "selected" : ""?>> Invoice</option>

                                                            <option value="Non Invoice" <?= $recruitskus->ketklaim == "Non Invoice" ?
                                                                "selected" : ""?>> Non Invoice</option>
                                                        </select><br>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                </div>
                                            </div>

                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div>
                                                            <label for="regional" class="form-label">Kota / Kabupaten Dari</label>
                                                            <select  class="form-control select2bs4" style="width: 100%;" name="kab_asal[{{$perjalanan->id}}]" required>

                                                                <option selected>Pilih Kota Kabupaten....</option>
                                                                @foreach($regency as $regency_id)
                                                                        <option value="{{$regency_id->name}}"
                                                                            @if($regency_id->name == $perjalanan->kab_asal)
                                                                            selected
                                                                            @endif>
                                                                            {{ $regency_id->name }}</option>
                                                                @endforeach

                                                            </select>
                                                            </select>
                                                        </div><br><br>

                                                        <div class="mb-3">
                                                            <label for="org_transport" class="form-label">Transport X/Org</label>
                                                            <input type="number" placeholder="Berapa Orang" class="form-control @error('org_transport')
                                                            is-invalid @enderror" id="org_transport[{{$perjalanan->id}}]" name="org_transport[{{$perjalanan->id}}]" onkeyup="jumlah('{{$perjalanan->id}}');"
                                                            required autofocus value="{{ old('org_transport', $perjalanan->org_transport) }}">

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
                                                            is-invalid @enderror" id="org_cefetaria[{{$perjalanan->id}}]" name="org_cefetaria[{{$perjalanan->id}}]" onkeyup="sum('{{$perjalanan->id}}')&jumlah1('{{$perjalanan->id}}');"
                                                            required autofocus value="{{ old('org_cefetaria', $perjalanan->org_cefetaria) }}">

                                                            @error('org_cefetaria')
                                                                <div class="invalid-feedback">
                                                                {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div><br><br><br><br>

                                                        <div class="form-floating">
                                                            <label for="floatingTextarea">Comments</label>
                                                            <textarea class="form-control" placeholder="Isi Komen disini" id="floatingTextarea" ></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                                <div>
                                                                    <label for="regional" class="form-label">Kota / Kabupaten Tiba</label>
                                                                        <div class="select2-purple">
                                                                            <select  class="form-control select2bs4" style="width: 100%;"
                                                                            name="kab_tiba[{{$perjalanan->id}}]" required>

                                                                                <option selected>Pilih Kota Kabupaten....</option>
                                                                                @foreach($regency as $regency_id)
                                                                                    <option value="{{$regency_id->name}}"
                                                                                        @if($regency_id->name == $perjalanan->kab_tiba)
                                                                                        selected
                                                                                        @endif>{{ $regency_id->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                </div><br><br>

                                                                <div class="mb-3">
                                                                    <label for="kolom1" class="form-label">Biaya Transport/Org</label>
                                                                    <input type="number" placeholder="Rp." class="form-control @error('kolom1')
                                                                    is-invalid @enderror" id="kolom1[{{$perjalanan->id}}]" name="kolom1[{{$perjalanan->id}}]" onkeyup="jumlah('{{$perjalanan->id}}');"
                                                                    required autofocus value="{{ old('kolom1', $perjalanan->kolom1) }}">

                                                                    @error('kolom1')
                                                                        <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                            <div class="mb-3">
                                                                <label for="total_transport" class="form-label">Total Transport</label>
                                                                <input type="text" readonly class="form-control @error('total_transport')
                                                                is-invalid @enderror" id="total_transport[{{$perjalanan->id}}]" name="total_transport[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('kolom1', $perjalanan->total_transport) }}">

                                                                @error('total_transport')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div><br>



                                                            <div class="mb-3">
                                                                <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                                                                <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                                                                is-invalid @enderror" id="kolom2[{{$perjalanan->id}}]" name="kolom2[{{$perjalanan->id}}]" onkeyup="sum('{{$perjalanan->id}}')&jumlah1('{{$perjalanan->id}}');"
                                                                required autofocus value="{{ old('kolom2', $perjalanan->kolom2) }}">

                                                                @error('kolom2')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                                <input type="text" readonly class="form-control @error('total_cafetaria') is-invalid @enderror" id="total_cafetaria[{{$perjalanan->id}}]" name="total_cafetaria[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('kolom1', $perjalanan->total_cafetaria) }}">

                                                                @error('total_cafetaria')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div><br>

                                                            <div class="mb-3">
                                                                <label for="total" class="form-label">Total Pengeluaran</label>
                                                                <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total[{{$perjalanan->id}}]" name="total[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('total', $perjalanan->total) }}">

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
                                @endforeach
                                <div class="card card-default">
                                    <div id="form_dinamis"></div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-primary" id="tambah">Tambah</button>
                                <button type="button" class="btn btn-danger" id="hapus">Hapus</button>
                                <a href="/dashboard/sku"><button class="btn btn-success" type="button">Back</button></a>
                            </div>
                        @endif
                    </div>
                </div>

            {{-- Jika Proses Reject belum di prosses --}}
        @elseif($recruitskus->status == "Reject" || $recruitskus->statuspgs == "Reject"
                || $recruitskus->statushrhead == "Reject" || $recruitskus->statusgahead == "Reject"
                || $recruitskus->statuscma == "Reject")
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

                            <div id="menu2" class="container tab-pane fade"><br>
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
                            </div>

                            <div id="menu3" class="container tab-pane fade"><br>
                            {{-- DATA STATUS BIAYA --}}
                                @foreach($perjalanan as $perjalanan)
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
                                                        <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                                            name="ketklaim" data-placeholder="Pilih Status Pembayaran" required>

                                                            <option value="Invoice" <?= $recruitskus->ketklaim == "Invoice" ?
                                                                "selected" : ""?>> Invoice</option>

                                                            <option value="Non Invoice" <?= $recruitskus->ketklaim == "Non Invoice" ?
                                                                "selected" : ""?>> Non Invoice</option>
                                                        </select><br>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                </div>
                                            </div>

                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div>
                                                            <label for="regional" class="form-label">Kota / Kabupaten Dari</label>
                                                            <select  class="form-control select2bs4"
                                                            style="width: 100%;" name="kab_asal[{{$perjalanan->id}}]" required>

                                                                <option selected>Pilih Kota Kabupaten....</option>
                                                                @foreach($regency as $regency_id)
                                                                        <option value="{{$regency_id->name}}"
                                                                            @if($regency_id->name == $perjalanan->kab_asal)
                                                                            selected
                                                                            @endif>
                                                                            {{ $regency_id->name }}</option>
                                                                @endforeach

                                                            </select>
                                                            </select>
                                                        </div><br><br>

                                                        <div class="mb-3">
                                                            <label for="org_transport" class="form-label">Transport X/Org</label>
                                                            <input type="number" placeholder="Berapa Orang" class="form-control @error('org_transport')
                                                            is-invalid @enderror" id="org_transport[{{$perjalanan->id}}]" name="org_transport[{{$perjalanan->id}}]" onkeyup="jumlah('{{$perjalanan->id}}');"
                                                            required autofocus value="{{ old('org_transport', $perjalanan->org_transport) }}">

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
                                                            is-invalid @enderror" id="org_cefetaria[{{$perjalanan->id}}]" name="org_cefetaria[{{$perjalanan->id}}]" onkeyup="sum('{{$perjalanan->id}}')&jumlah1('{{$perjalanan->id}}');"
                                                            required autofocus value="{{ old('org_cefetaria', $perjalanan->org_cefetaria) }}">

                                                            @error('org_cefetaria')
                                                                <div class="invalid-feedback">
                                                                {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div><br><br><br><br>

                                                        <div class="form-floating">
                                                            <label for="floatingTextarea">Comments</label>
                                                            <textarea class="form-control" placeholder="Isi Komen disini" id="floatingTextarea" ></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                                <div>
                                                                    <label for="regional" class="form-label">Kota / Kabupaten Tiba</label>
                                                                        <div class="select2-purple">
                                                                            <select  class="form-control select2bs4" style="width: 100%;"
                                                                            name="kab_tiba[{{$perjalanan->id}}]" required>

                                                                                <option selected>Pilih Kota Kabupaten....</option>
                                                                                @foreach($regency as $regency_id)
                                                                                    <option value="{{$regency_id->name}}"
                                                                                        @if($regency_id->name == $perjalanan->kab_tiba)
                                                                                        selected
                                                                                        @endif>{{ $regency_id->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                </div><br><br>

                                                                <div class="mb-3">
                                                                    <label for="kolom1" class="form-label">Biaya Transport/Org</label>
                                                                    <input type="number" placeholder="Rp." class="form-control @error('kolom1')
                                                                    is-invalid @enderror" id="kolom1[{{$perjalanan->id}}]" name="kolom1[{{$perjalanan->id}}]" onkeyup="jumlah('{{$perjalanan->id}}');"
                                                                    required autofocus value="{{ old('kolom1', $perjalanan->kolom1) }}">

                                                                    @error('kolom1')
                                                                        <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                            <div class="mb-3">
                                                                <label for="total_transport" class="form-label">Total Transport</label>
                                                                <input type="text" readonly class="form-control @error('total_transport')
                                                                is-invalid @enderror" id="total_transport[{{$perjalanan->id}}]" name="total_transport[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('kolom1', $perjalanan->total_transport) }}">

                                                                @error('total_transport')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div><br>



                                                            <div class="mb-3">
                                                                <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                                                                <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                                                                is-invalid @enderror" id="kolom2[{{$perjalanan->id}}]" name="kolom2[{{$perjalanan->id}}]" onkeyup="sum('{{$perjalanan->id}}')&jumlah1('{{$perjalanan->id}}');"
                                                                required autofocus value="{{ old('kolom2', $perjalanan->kolom2) }}">

                                                                @error('kolom2')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                                <input type="text" readonly class="form-control @error('total_cafetaria')
                                                                is-invalid @enderror" id="total_cafetaria[{{$perjalanan->id}}]" name="total_cafetaria[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('kolom1', $perjalanan->total_cafetaria) }}">

                                                                @error('total_cafetaria')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div><br>

                                                            <div class="mb-3">
                                                                <label for="total" class="form-label">Total Pengeluaran</label>
                                                                <input type="text" readonly class="form-control @error('total') is-invalid
                                                                @enderror" id="total[{{$perjalanan->id}}]" name="total[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('total', $perjalanan->total) }}">

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
                                @endforeach
                                <div class="card card-default">
                                    <div id="form_dinamis"></div>
                                </div>
                                <button type="button" class="btn btn-primary" id="tambah">Tambah</button>
                                <button type="button" class="btn btn-danger" id="hapus">Hapus</button>
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

                                            {{-- Prosess di Reject HR Head --}}
                                            @if ($recruitskus->status == "Approve" && $recruitskus->npk != null
                                                    && $recruitskus->statushrhead == "Reject")
                                                    <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="statushrhead" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="statushrhead" name="statushrhead"
                                                                autofocus value="Prosess di Reject HR Head">
                                                            </div>
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
                                                            <input type="text" readonly class="form-control" id="status" name="status"
                                                            autofocus value="Prosess di Reject Oleh HR Staff" >
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
                                                            <label for="statusgahead" class="form-label">Prosses</label>
                                                            <input type="text" readonly class="form-control" id="statusgahead" name="statusgahead"
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
                                                            <label for="statushrhead" class="form-label">Prosses</label>
                                                            <input type="text" readonly class="form-control" id="statushrhead" name="statushrhead"
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
                                                            <label for="statuscma" class="form-label">Prosses</label>
                                                            <input type="text" readonly class="form-control" id="statuscma" name="statuscma"
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
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tanggal_verif" class="form-label">Tanggal Terakhir Di Proses</label>
                                                    <input type="text" class="form-control @error('tanggal_verif') is-invalid @enderror" id="tanggal_verif"
                                                    name="tanggal_verif" readonly required autofocus value="{{ Carbon\Carbon::parse($tanggal_verif)->isoFormat('dddd, D MMMM Y') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <input type="hidden" readonly class="form-control" id="status" name="status"
                                    autofocus
                                    readonly value="-">
                                </div>
                                <div>
                                    <input type="hidden" readonly class="form-control" id="statuspgs" name="statuspgs"
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
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="hidden" readonly class="form-control" id="keterangan" name="keterangan"
                                    autofocus value="">
                                </div>
                                <button type="submit" class="btn btn-primary">Reset & Submit</button>
                                <a href="/dashboard/sku"><button class="btn btn-success" type="button">Back</button></a>
                            </div>

                        </div>
                    </div>

        @elseif( $recruitskus->status == "Approve" || $recruitskus->statushrhead == "Approve"
                || $recruitskus->statusgahead == "Approve" || $recruitskus->statuspgs == "Approve"
                || $recruitskus->statuscma == "Approve")
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

                            <div id="menu3" class="container tab-pane fade"><br>1
                                {{-- DATA STATUS BIAYA --}}
                                @foreach($perjalanan as $perjalanan)
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
                                                    <br>
                                                </div>
                                            </div><br>

                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div>
                                                            <label for="kab_asal" class="form-label">Kabupaten Penjemputan</label>
                                                            <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal[{{$perjalanan->id}}]"
                                                            autofocus placeholder="{{ old('kab_asal',$perjalanan->kab_asal) }}"
                                                            readonly value="{{ old('kab_asal',$perjalanan->kab_asal) }}">
                                                            <br>
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="org_transport" class="form-label">Transport X/Org</label>
                                                            <input type="number" placeholder="Berapa Orang" class="form-control @error('org_transport')
                                                            is-invalid @enderror" id="org_transport" name="org_transport[{{$perjalanan->id}}]" readonly
                                                            required autofocus value="{{ old('org_transport', $perjalanan->org_transport) }}">
                                                        </div><br>

                                                        <div class="mb-3">
                                                            <br><br><br>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                            <input type="number" placeholder="Berapa Orang" class="form-control @error('org_cefetaria')
                                                            is-invalid @enderror" id="org_cefetaria" name="org_cefetaria[{{$perjalanan->id}}]" readonly
                                                            required autofocus value="{{ old('org_cefetaria', $perjalanan->org_cefetaria) }}">
                                                        </div><br><br><br><br>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div>
                                                            <label for="kab_tiba" class="form-label">Kabupaten / Kota Tiba</label>
                                                            <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba[{{$perjalanan->id}}]"
                                                            autofocus placeholder="{{ old('kab_tiba',$perjalanan->kab_tiba) }}"
                                                            readonly value="{{ old('kab_tiba',$perjalanan->kab_tiba) }}">
                                                        </div><br>

                                                            <div class="mb-3">
                                                                    <label for="kolom1" class="form-label">Biaya Transport/Org</label>
                                                                    <input type="number" placeholder="Rp." class="form-control @error('kolom1')
                                                                    is-invalid @enderror" id="kolom1" name="kolom1[{{$perjalanan->id}}]" readonly
                                                                    required autofocus value="{{ old('kolom1', $perjalanan->kolom1) }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="total_transport" class="form-label">Total Transport</label>
                                                                <input type="text" readonly class="form-control @error('total_transport') is-invalid @enderror"
                                                                id="total_transport" name="total_transport[{{$perjalanan->id}}]"
                                                                autofocus value="{{old('total_transport', $perjalanan->total_transport)}}" readonly>
                                                            </div><br>

                                                            <div class="mb-3">
                                                                <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                                                                <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                                                                is-invalid @enderror" id="kolom2" name="kolom2[{{$perjalanan->id}}]" readonly
                                                                required autofocus value="{{ old('kolom2', $perjalanan->kolom2) }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                                <input type="text" readonly class="form-control @error('total_cafetaria') is-invalid @enderror"
                                                                id="total_cafetaria" name="total_cafetaria[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('kolom2', $perjalanan->total_cafetaria) }}" readonly>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="total" class="form-label">Total Pengeluaran</label>
                                                                <input type="text" readonly class="form-control @error('total') is-invalid @enderror" id="total"
                                                                name="total[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('total', $perjalanan->total) }}" readonly>
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
                                            @if ($recruitskus->statushrhead == "Approve" && $recruitskus->statuscma == "-" &&
                                                 $recruitskus->status == "Approve")
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
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="tanggal_verif" class="form-label">Tanggal</label>
                                                            <input type="text" class="form-control @error('tanggal_verif') is-invalid @enderror" id="tanggal_verif"
                                                            name="tanggal_verif" readonly required autofocus value="{{ Carbon\Carbon::parse($tanggal_verif)->isoFormat('dddd, D MMMM Y') }}">
                                                        </div>
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


                                            {{-- DONE Menunggu verif GA--}}
                                            @elseif ($recruitskus->statusgahead == "-"
                                                    && $recruitskus->status == "Approve" && $recruitskus->ketklaim == "Invoice")
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="statusgahead" name="statusgahead"
                                                                autofocus value="Menunggu Verifikasi GA">
                                                        </div>
                                                    </div>

                                            {{-- DONE Menunggu Verifikasi HR Head--}}
                                            @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null && $recruitskus->statusgahead == "Approve"
                                                    && $recruitskus->statushrhead == "-" && $recruitskus->ketklaim == "Invoice" ||
                                                    $recruitskus->status == "Approve" && $recruitskus->npk != null
                                                    && $recruitskus->statushrhead == "-" )

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Prosses</label>
                                                            <input type="text" readonly class="form-control" id="statushrhead" name="statushrhead"
                                                            autofocus value="Menunggu Verifikasi HR Head">
                                                        </div>
                                                    </div>

                                            {{-- DONE Approve CMA--}}
                                            @elseif ($recruitskus->statuscma == "Approve")
                                                    <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="statuscma" name="statuscma"
                                                                    autofocus value="Approve CMA">
                                                            </div>
                                                    </div>

                                            {{-- DONE Menunggu Verifikasi CMA--}}
                                            @elseif ($recruitskus->status == "Approvee" && $recruitskus->statuscma == "-"
                                                    && $recruitskus->statuspgs == "Approve")
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="statuscma" name="statuscma"
                                                                autofocus value="Menunggu Verifikasi CMA">
                                                        </div>
                                                    </div>
                                            @endif
                                            {{-- <a href="/dashboard/sku">
                                                <button class="btn btn-success" type="button">Back</button></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container pl-4">
                                @if ($recruitskus->status == "-")
                                <button type="submit" class="btn btn-primary">Update</button>
                                @elseif ($recruitskus->statushrhead == "Approve" && $recruitskus->status == "Approve")
                                <button type="submit" class="btn btn-primary">Approve</button>
                                @endif
                                <a href="/dashboard/sku">
                                <button class="btn btn-success" type="button">Back</button></a>
                            </div>
                        </div>
                    </div>
        @endif
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var id = 9999;
            $('#tambah').click(function(){
                id++;
                $('#form_dinamis').append(`
                    <div class="card card-default" id="data_sku`+ id +`">
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
                                        <select  class="form-control select2bs4" style="width: 100%;" name="new_kab_asal[`+id+`]"
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
                                                is-invalid @enderror" id="org_transport[`+ id +`]" name="new_org_transport[`+id+`]" onkeyup="jumlah(`+ id +`);"
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
                                                is-invalid @enderror" id="org_cefetaria[`+ id +`]" name="new_org_cefetaria[`+id+`]" onkeyup="sum(`+ id +`)&jumlah1(`+ id +`);"
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
                                                                        name="new_kab_tiba[`+id+`]" data-placeholder="Pilih Kota Kabupaten Tiba" required>
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
                                                is-invalid @enderror" id="kolom1[`+ id +`]" name="new_kolom1[`+id+`]"
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
                                            id="total_transport[`+ id +`]" name="new_total_transport[`+id+`]" autofocus value="" >

                                            @error('total_transport')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div><br>

                                        <div class="mb-3">
                                            <label for="kolom2" class="form-label">Biaya Cafetaria/org</label>
                                            <input type="number" placeholder="Rp."  class="form-control @error('kolom2')
                                            is-invalid @enderror" id="kolom2[`+ id +`]" name="new_kolom2[`+id+`]" onkeyup="sum(`+id+`)&jumlah1(`+id+`);"
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
                                            is-invalid @enderror" id="total_cafetaria[`+ id +`]" name="new_total_cafetaria[`+id+`]" autofocus value= "">

                                            @error('total_cafetaria')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div><br>

                                        <div class="mb-3">
                                            <label for="total" class="form-label">Total Pengeluaran</label>
                                            <input type="text" readonly class="form-control @error('total') is-invalid @enderror"
                                            id="total[`+ id +`]" name="new_total[`+id+`]"
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
                $('#data_sku' + id + '').remove();
                id--;
            })
        })
        function jumlah($addon = "") {
            var txtFirstNumberValue = document.getElementById('org_transport['+ $addon+']').value;
            var txtSecondNumberValue = document.getElementById('kolom1['+ $addon+']').value;
            var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('total_transport['+ $addon+']').value = result;
            }
        }


        function jumlah1($addon = "") {
            var txtFirstNumberValue = document.getElementById('org_cefetaria['+ $addon+']').value;
            var txtSecondNumberValue = document.getElementById('kolom2['+ $addon+']').value;
            var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);

            if (!isNaN(result)) {
                 document.getElementById('total_cafetaria['+ $addon+']').value = result;
            }
        }

        function sum($addon = "") {
            var txtFirstNumberValue = document.getElementById('kolom1['+ $addon+']').value;
            var txtSecondNumberValue = document.getElementById('org_transport['+ $addon+']').value;
            var txtThirdNumberValue  = document.getElementById('kolom2['+ $addon+']').value;
            var txtFourthNumberValue  = document.getElementById('org_cefetaria['+ $addon+']').value;

            var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) +
            parseFloat(txtThirdNumberValue) * parseFloat(txtFourthNumberValue);

            if (!isNaN(result)) {
                document.getElementById('total['+ $addon+']').value = result;
            }
        }
    </script>
@endsection
