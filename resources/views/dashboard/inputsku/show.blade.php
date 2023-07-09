@extends('layouts.master')

@section('content-header')
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
                                                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                                            readonly autofocus value="{{ old('nik', $recruitskus->nik) }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama SKU</label>
                                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                                        readonly autofocus value="{{ old('nama', $recruitskus->nama) }}">
                                                    </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
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
                                    @if ($recruitskus->status == "-" && $recruitskus->statuspgs == "-"
                                                        && $recruitskus->statushrhead == "-" && $recruitskus->statusgahead == "-"
                                                        && $recruitskus->statuscma == "-")
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Proses</label>
                                                            <input type="text" readonly class="form-control" id="status" name="status"
                                                            autofocus value= "Data Belum Di Isi">
                                                            <br>

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
                                                        <a href="/dashboard/sku">
                                                        <button class="btn btn-success" type="button">Back</button></a>

                                                @elseif ($recruitskus->status != "-" || $recruitskus->statuspgs != "-"
                                                        || $recruitskus->statushrhead != "-" || $recruitskus->statusgahead != "-")

                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Proses</label>
                                                            <input type="text" readonly class="form-control" id="status" name="status"
                                                            autofocus value= "Data Sedang Proses">
                                                        </div>
                                                        <br>
                                            @endif
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                            <div>
                                                <label for="kab_asal" class="form-label">Kota / Kabupaten</label>
                                                <input type="text" readonly class="form-control" id="kab_asal" name="kab_asal"
                                                autofocus data-placeholder="Belum Di isi Hc Site"><br>
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <label for="org_transport" class="form-label">Transport X/Org</label>
                                                    <input type="text" readonly class="form-control" id="org_transport" name="org_transport"
                                                    autofocus data-placeholder="Belum Di isi Hc Site">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                        <br><br><br><br>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <label for="org_cefetaria" class="form-label">Cafetaria X/Org</label>
                                                    <input type="text" readonly class="form-control" id="org_cefetaria" name="org_cefetaria"
                                                    autofocus data-placeholder="Belum Di isi Hc Site">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                        <br><br><br>
                                                </div>
                                            </div>


                                            <br>
                                            <article class= "my-3">
                                                {!! $recruitskus->ketstatus !!}
                                            </article>
                                            <a href="/dashboard/sku">
                                            <button class="btn btn-success" type="button">Back</button></a>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div>
                                            <label for="kab_tiba" class="form-label">Kota / Kabupaten</label>
                                            <input type="text" readonly class="form-control" id="kab_tiba" name="kab_tiba"
                                            autofocus data-placeholder="Belum Di isi Hc Site"><br>
                                        </div>

                                            <div class="form-group">
                                                <div>
                                                    <label for="kolom1" class="form-label">Transport</label>
                                                    <input type="text" readonly class="form-control" id="kolom1" name="kolom1"
                                                    autofocus data-placeholder="Belum Di isi Hc Site">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <label for="total_transport" class="form-label">Total Transport</label>
                                                    <input type="text" readonly class="form-control" id="total_transport" name="total_transport"
                                                    autofocus data-placeholder="Belum Di isi Hc Site">
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <div>
                                                    <label for="kolom2" class="form-label">Cafetaria</label>
                                                    <input type="text" readonly class="form-control" id="kolom2" name="kolom2"
                                                    autofocus data-placeholder="Belum Di isi Hc Site">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <label for="total_cafetaria" class="form-label">Total Cafetaria</label>
                                                    <input type="text" readonly class="form-control" id="total_cafetaria" name="total_cafetaria"
                                                    autofocus data-placeholder="Belum Di isi Hc Site">
                                                </div>
                                            </div><br>

                                            <div class="form-group">
                                                <div>
                                                    <label for="total" class="form-label">Total Pengeluaran</label>
                                                    <input type="text" readonly class="form-control" id="total" name="total"
                                                    autofocus data-placeholder="Belum Di isi Hc Site">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
