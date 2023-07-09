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
    <form method="post" action="/dashboard/hr/{{ $recruitskus->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <input type="hidden" name="recruitsku_id" value="{{$recruitskus->id}}">
        </div>

            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#menu1"><b>DATA SKU</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2"><b>DATA KELUARGA</b></a>
                    </li>
                    @if($recruitskus->perjalanan->kab_asal == "Di iSi HC Site")
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3"><b>TAMBAH DATA PERJALANAN</b></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3"><b>DATA PERJALANAN</b></a>
                        </li>
                    @endif
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
                    @if ($recruitskus->statusgahead == "Approve" && $recruitskus->ketklaim == "Invoice"
                        && $recruitskus->statushrhead == "-")
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
                                    <button type="button" class="btn btn-primary" id="tambah">Tambah Data Perjalanan</button>
                                    <button type="button" class="btn btn-danger" id="hapus">Hapus</button>
                                    <a href="/dashboard/sku"><button class="btn btn-success" type="button">Back</button></a>
                        </div>
                    @else
                        <div id="menu3" class="container tab-pane fade"><br>
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
                                                                <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal[{{$perjalanan->id}}]"
                                                                autofocus value="{{ old('kab_asal', $perjalanan->kab_asal) }}"><br>
                                                            </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="org_transport" class="form-label">Transport X/Org</label>
                                                                    <input type="text" readonly class="form-control" id="org_transport" name="org_transport[{{$perjalanan->id}}]"
                                                                    autofocus value="{{ old('org_transport', $perjalanan->org_transport) }}">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <br><br><br><br>
                                                            </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                                    <input type="text" readonly class="form-control" id="org_cefetaria" name="org_cefetaria[{{$perjalanan->id}}]"
                                                                    autofocus value="{{ old('org_cefetaria', $perjalanan->org_cefetaria) }}">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <br><br><br>
                                                            </div>
                                                            @if ($recruitskus->status == "-" && $recruitskus->statuspgs == "-"
                                                                        && $recruitskus->statushrhead == "-" && $recruitskus->statusgahead == "-"
                                                                        && $recruitskus->statuscma == "-")
                                                                        <div class="mb-3">
                                                                            <label for="status" class="form-label">Proses</label>
                                                                            <input type="text" readonly class="form-control" id="status" name="status"
                                                                            autofocus value= "Data Belum Di Proses">
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

                                                                @elseif ($recruitskus->status != "-" || $recruitskus->statuspgs != "-"
                                                                        || $recruitskus->statushrhead != "-" || $recruitskus->statusgahead != "-")

                                                                        <div class="mb-3">
                                                                            <label for="status" class="form-label">Proses</label>
                                                                            <input type="text" readonly class="form-control" id="status" name="status"
                                                                            autofocus value= "Data Sedang Proses">
                                                                        </div>
                                                                        <br>
                                                            @endif

                                                            <article class= "my-3">
                                                                {!! $recruitskus->ketstatus !!}
                                                            </article>

                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div>
                                                            <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                                                            <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba[{{$perjalanan->id}}]"
                                                            autofocus value="{{ old('kab_tiba', $perjalanan->kab_tiba) }}"><br>
                                                        </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="kolom1" class="form-label">Transport</label>
                                                                    <input type="text" readonly class="form-control" id="kolom1" name="kolom1[{{$perjalanan->id}}]"
                                                                    autofocus value="{{ old('kolom1', $perjalanan->kolom1) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="total_transport" class="form-label">Total Transport</label>
                                                                    <input type="text" readonly class="form-control" id="total_transport" name="total_transport[{{$perjalanan->id}}]"
                                                                    autofocus value="{{ old('total_transport', $perjalanan->total_transport) }}">
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="kolom2" class="form-label">Cafetaria</label>
                                                                    <input type="text" readonly class="form-control" id="kolom2" name="kolom2[{{$perjalanan->id}}]"
                                                                    autofocus value="{{ old('kolom2', $perjalanan->kolom2) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                                    <input type="text" readonly class="form-control" id="total_cafetaria" name="total_cafetaria[{{$perjalanan->id}}]"
                                                                    autofocus value="{{ old('total_cafetaria', $perjalanan->total_cafetaria) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div>
                                                                    <label for="total" class="form-label">Total Pengeluaran</label>
                                                                    <input type="text" readonly class="form-control" id="total" name="total[{{$perjalanan->id}}]"
                                                                    autofocus value="{{ old('total', $perjalanan->total) }}">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    @endif

                    <div id="menu4" class="container tab-pane fade"><br>
                    {{-- PROSES --}}
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
                                                <div class="col-md-6">
                                                    @if ($recruitskus->ketklaim == "Invoice" && $recruitskus->statusgahead == "Approve"
                                                        && $recruitskus->statushrhead == "-")
                                                        <div class="mb-3">
                                                            <label for="npk" class="form-label">NPK REKRUT BARU</label>
                                                            <input type="number" placeholder="Masukan NPK" class="form-control @error('npk')
                                                            is-invalid @enderror" id="npk" name="npk"
                                                            required autofocus value="{{ old('npk', $recruitskus->npk) }}">

                                                                @error('npk')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                        </div>
                                                    @elseif ($recruitskus->ketklaim == "Invoice" && $recruitskus->statusgahead == "-")
                                                        <div class="mb-3">
                                                            <label for="npk" class="form-label">NPK REKRUT BARU</label>
                                                            <input type="number" placeholder="Masukan NPK" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                                                            required autofocus readonly value="{{ old('npk', $recruitskus->npk) }}">
                                                        </div>


                                                        {{-- Non Invoice --}}
                                                        @elseif ($recruitskus->ketklaim == "Non Invoice" && $recruitskus->statushrhead == "-")
                                                            <div class="mb-3">
                                                                <label for="npk" class="form-label">NPK REKRUT BARU</label>
                                                                <input type="number" placeholder="Masukan NPK" class="form-control @error('npk')
                                                                is-invalid @enderror" id="npk" name="npk"
                                                                required autofocus value="{{ old('npk', $recruitskus->npk) }}">

                                                                @error('npk')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                        {{-- Jika Sedang Proses --}}
                                                        @elseif ($recruitskus->statushrhead != "-")
                                                            <div class="mb-3">
                                                                <label for="npk" class="form-label">NPK REKRUT BARU</label>
                                                                <input type="number" placeholder="Masukan NPK" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk"
                                                                required readonly autofocus value="{{ old('npk', $recruitskus->npk) }}">
                                                            </div>
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal_verif" class="form-label">Tanggal</label>
                                                        <input type="text" class="form-control @error('tanggal_verif') is-invalid @enderror" id="tanggal_verif"
                                                        name="tanggal_verif" readonly required autofocus value="{{ Carbon\Carbon::parse($tanggal_verif)->isoFormat('dddd, D MMMM Y') }}">
                                                </div>
                                                </div>

                                            {{-- Proses Approve HR SATFF 1--}}
                                            @if ($recruitskus->status == "-")
                                                        <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Prosses</label>
                                                                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                                                                        <option selected value="">--PILIH--</option>
                                                                        <option value="Approve" <?= $recruitskus->status == "Approve" ?
                                                                        "selected" : ""?>>Approve</option>
                                                                        <option value="Reject" <?= $recruitskus->status == "Reject" ?
                                                                        "selected" : ""?>>Reject</option>
                                                                    </select>
                                                                </div>

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

                                                {{--Prosess di Reject PGS--}}
                                                @elseif ($recruitskus->statuspgs == "Reject")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Proses</label>
                                                                <input type="text" readonly class="form-control" id="status" name="status"
                                                                autofocus value="Prosess di Reject PGS">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                                <input readonly type="text" readonly class="form-control" id="keterangan" name="keterangan"
                                                                autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                                                            </div>
                                                        </div>

                                                {{--Prosess di Approve Invoice--}}
                                                @elseif ($recruitskus->statusgahead == "Approve" && $recruitskus->ketklaim == "Invoice"
                                                        && $recruitskus->statushrhead == "-" && $recruitskus->npk == null)
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                                                                <option selected value="">--PILIH--</option>
                                                                <option value="Approve" <?= $recruitskus->status == "Approve" ?
                                                                "selected" : ""?>>Approve</option>
                                                                <option value="Reject" <?= $recruitskus->status == "Reject" ?
                                                                "selected" : ""?>>Reject</option>
                                                                </select>
                                                            </div>
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

                                                {{-- Approve kedua / ketiga --}}
                                                @elseif ($recruitskus->status == "Approve" && $recruitskus->statuspgs == "Approve")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Telah Selesai Memproses Lampiran?</label>
                                                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                                                                <option selected value="">--PILIH--</option>
                                                                <option value="Approvee" <?= $recruitskus->status == "Approvee" ?
                                                                "selected" : ""?>>Selesai</option>
                                                                <option value="Reject" <?= $recruitskus->status == "Reject" ?
                                                                "selected" : ""?>>Batal (Akan kembali ke PGS)</option>
                                                            </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                                <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                                                id="keterangan" name="keterangan"
                                                                placeholder="Isi Keterangan Bila Dibatalkan" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                                                                @error('keterangan')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                {{-- Approve kedua / ketiga --}}
                                                @elseif ($recruitskus->status == "Approvee" && $recruitskus->statuscma == "-")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Telah Selesai Memproses Lampiran?</label>
                                                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                                                                <option selected value="">--PILIH--</option>
                                                                <option value="Approvee" <?= $recruitskus->status == "Approvee" ?
                                                                "selected" : ""?>>Selesai</option>
                                                                <option value="Reject" <?= $recruitskus->status == "Reject" ?
                                                                "selected" : ""?>>Batal (Akan kembali ke PGS)</option>
                                                            </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                                <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                                                id="keterangan" name="keterangan"
                                                                placeholder="Isi Keterangan Bila Dibatalkan" rows="3">{{old('keterangan', $recruitskus->keterangan)}}</textarea>
                                                                @error('keterangan')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
                                                        && $recruitskus->statushrhead == "Approve" && $recruitskus->statuspgs == "-")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                                autofocus value="Menunggu Verifikasi PGS">
                                                            </div>
                                                        </div>

                                                @elseif ($recruitskus->status == "Approve" && $recruitskus->npk != null
                                                        && $recruitskus->statushrhead == "Reject" && $recruitskus->statuspgs == "-")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                                autofocus value="Prosess di Reject HR Head">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
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
                                                        </div>

                                                @elseif ($recruitskus->status == "Approve" && $recruitskus->ketklaim == "Non Invoice"
                                                        && $recruitskus->kolom1 == null)
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                    <label for="status" class="form-label">Prosses</label>
                                                                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                                                                    <option selected value="">--PILIH--</option>
                                                                    <option value="Approve" <?= $recruitskus->status == "Approve" ?
                                                                        "selected" : ""?>>Approve</option>
                                                                    <option value="Reject" <?= $recruitskus->status == "Reject" ?
                                                                        "selected" : ""?>>Reject</option>
                                                                    </select>
                                                            </div>
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

                                                @elseif ($recruitskus->status == "Approve" && $recruitskus->statushrhead == "-")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status" required>
                                                                <option selected value="">--PILIH--</option>
                                                                <option value="Approve" <?= $recruitskus->status == "Approve" ?
                                                                    "selected" : ""?>>Approve</option>
                                                                <option value="Reject" <?= $recruitskus->status == "Reject" ?
                                                                    "selected" : ""?>>Reject</option>
                                                                </select>
                                                            </div>
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

                                                @elseif ($recruitskus->status == "Approve" && $recruitskus->ketklaim == "Invoice"
                                                        && $recruitskus->npk == null)
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                                autofocus value="Menunggu Verifikasi GA">
                                                            </div>
                                                        </div>

                                                @elseif ($recruitskus->status == "Approvee" && $recruitskus->npk != null
                                                        && $recruitskus->statushrhead == "Approve" && $recruitskus->statuspgs == "Approve"
                                                        && $recruitskus->statuscma == "-")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                                autofocus value="Menunggu Verifikasi CMA">
                                                            </div>
                                                        </div>

                                                @elseif ($recruitskus->status == "Approvee" && $recruitskus->npk != null
                                                        && $recruitskus->statushrhead == "Approve" && $recruitskus->statuspgs == "Approve"
                                                        && $recruitskus->statuscma == "Approve")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                                autofocus value="Approve CMA">
                                                            </div>
                                                        </div>

                                                @elseif ($recruitskus->status == "Reject")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                                autofocus value="Prosess di Reject Oleh HR Staff">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
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
                                                        </div>

                                                @elseif ($recruitskus->statusgahead == "Reject")
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Prosses</label>
                                                                <input type="text" readonly class="form-control" id="total" name="total"
                                                                    autofocus value="Prosess di Reject GA">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                                <input type="text" readonly class="form-control" id="keterangan" name="keterangan"
                                                                autofocus value="{{ old('keterangan', $recruitskus->keterangan) }}">
                                                            </div>
                                                        </div>
                                            @endif

                                            {{-- Proses Download --}}

                                                <div class="col-md-6">
                                                    {{-- <a href="/dashboard/print">
                                                    <button class="btn btn-success" download="" type="button">Download</button></a> --}}
                                                    {{-- <a href="/dashboard/hr/"><button class="btn btn-warning" type="button">Back</button></a> --}}
                                                </div>


                                    </div>

                                </div>
                            </div>
                                    @if($recruitskus->statushrhead == "-" && $recruitskus->statuspgs == "-")
                                        <button type="submit" class="btn btn-primary">Prosses</button>
                                    @elseif ($recruitskus->statushrhead == "Approve" && $recruitskus->statuspgs == "Approve" &&
                                            $recruitskus->statuscma == "-")
                                        <button type="submit" class="btn btn-primary">Prosses</button>
                                    @endif
                                    <a href="/dashboard/hr/">
                                        <button class="btn btn-success" type="button">Back</button></a>
                    </div>

                    {{-- <div class="container pl-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/dashboard/sku">
                        <button class="btn btn-success" type="button">Back</button></a>
                    </div> --}}
                </div>
            </div>

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
    </form>

@endsection


<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="plugins/jquery.masknumber.js"></script>
  <script src="dist/js/jquery.masknumber.js"></script>
  <script src="plugins/jquery/jquery.masknumber.js"></script>

  <!-- page script -->

</html>

