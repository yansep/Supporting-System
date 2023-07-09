<!DOCTYPE html>
<html>
    <body>
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
            <div class="row">
                <div class="col-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success col-lg-10" role="alert">
                            {{ session ('success') }}
                            </div>
                        @endif

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h2 class="card-title"><b>DATA ALL SKU</b></h2>
                            </div><br>
                            {{-- <form > --}}
                                    {{-- <form class="row" action="/" method="get">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label>PT</label>
                                                <select class="form-control" name="status">
                                                    <option value="">All Proses</option>
                                                    <option value="Approve" selected="{{ isset($_GET['status']) && $_GET['status'] == 'Approve' }}">Yang Telah Di Approve</option>
                                                    <option value="Approvee" selected="{{ isset($_GET['status']) && $_GET['status'] == 'Approvee' }}">Yang Telah Di Cetak</option>
                                                </select>
                                            </div>

                                            <div class="input-group">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form> --}}
                                    {{-- <div class="row">
                                            @csrf
                                            <div class="col-md-3">
                                                <label>Approve</label>
                                                <select id="filter-organisasi" class="form-control">
                                                <option value="">Pilih Approve</option>
                                                <option value="1">Approve</option>
                                                <option value="2">Progres</option>
                                                <option value="3">Reject</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label>ESTATE</label>
                                                <select id="filter-organisasi" class="form-control">
                                                <option value="">All Categori</option>
                                                <option value="2">Estate Jabdan 2</option>
                                                <option value="1">Estate Jabdan 1</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label>PT</label>
                                                <select class="form-control" name="lokasi_id">
                                                <option value="">All PT</option>
                                                @foreach ($lokasis as $lokasi)
                                                @if ($lokasi_id==$lokasi->id)
                                                    <option value="{{ $lokasi->id }}" selected>{{ $lokasi->nama }}</option>
                                                @else
                                                    <option value="{{ $lokasi->id }}">{{ $lokasi->nama }}</option>
                                                @endif
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label>PT</label>
                                                <input class="form-control" type="date" name="start" value="{{ $start }}"/>
                                            </div>

                                            <div class="col-md-3">
                                                <label>PT</label>
                                                <input  class="form-control" type="date" name="end" value="{{ $end }}"/>
                                            </div>

                                            <div class="col-md-3">
                                                <button class="btn btn-primary">Refresh</button>
                                            </div>
                                    </div>
                            </form> --}}

                            <form class="row row-cols-lg-auto g-1">
                                <div class="col">
                                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                    name="lokasi_estate_id">
                                        <option value="">All Estate</option>
                                        @foreach ($lokasi_estates as $lokasi_estate)
                                        @if ($lokasi_estate_id==$lokasi_estate->id)
                                            <option value="{{ $lokasi_estate->id }}" selected>{{ $lokasi_estate->nama }}</option>
                                        @else
                                            <option value="{{ $lokasi_estate->id }}">{{ $lokasi_estate->nama }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                        name="ketklaim">
                                        <option value="">All Status</option>
                                        <option value="Invoice">Invoice</option>
                                        <option value="Non Invoice">Non Invoice</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <select class="form-control select2" style="width: 100%;" aria-label="Default select example"
                                        name="status">
                                        <option value="">All Status</option>
                                        <option value="-">Belum Approve</option>
                                        <option value="Approve">Approve</option>
                                        <option value = "Approvee">Approve & Selesai Lampiran</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <input class="form-control" type="date" name="start" value="{{ $start }}"/>
                                </div>

                                <div class="col">
                                    <input class="form-control" type="date" name="end" value="{{ $end }}"/>
                                </div><br>

                                <div class="col">
                                    <input type="text" class="form-control"  name="q" placeholder="Search .." value="{{ $q }}" />
                                </div>

                                <div class="col">
                                    <button class="btn btn-success">Refresh</button>
                                </div>

                                {{-- <div class="col">
                                    <label>Status</label>
                                        <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="status">
                                                <option value="">All Status</option>
                                                <option value="Approve" selected>Approve</option>

                                        </select>
                                </div>  --}}

                            </form>
                                    <div class="divider"></div>

                                    {{-- <div class="row justify-content-end">
                                        <div class="col-sm-10 col-md-6">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <form action="?" class="col-auto ms-auto">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="text" name="search" placeholder="Search .." value="{{ $search }}" class="form-control">
                                                        <button class="btn btn-primary" type="submit">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><br> --}}
                                    <form method="post" action="{{route('downloadpdf')}}">
                                    @csrf
                                    <table id="example1" class="table table-bordered table-striped" style = text-align:center
                                        role="table" aria-busy="false" aria-colcount="14">
                                        <thead>
                                            <tr>
                                                <th scope="col"><input type="checkbox" id="chkCheckAll"></th>
                                                <th scope="col">No</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">NAMA</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">TOTAL</th>
                                                <th scope="col">ESTATE</th>
                                                <th colspan="2" scope="col">Proses</th>
                                                <th scope="col">Proses CMA</th>
                                                <th scope="col">Tgl Verifikasi Terakhir</th>
                                                <th scope="col">Tgl Dibuat</th>
                                                <th scope="col">Download</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($recruitskus as $key => $recruitsku)
                                                <tr>
                                                    <td><input type="checkbox" name="ids[]"
                                                        class="checkBoxClass" value="{{$recruitsku->id}}"></td>

                                                    <td>{{ $recruitskus->firstItem() + $key}}</td>
                                                    <td  style = text-align:left>   {{ $recruitsku->nik }}</td>
                                                    <td  style = text-align:left>   {{ $recruitsku->nama }}</td>
                                                    <td>                            {{ $recruitsku->ketklaim }}</td>
                                                     {{-- <td style = text-align:left>-</td> --}}
                                                    <td style = text-align:left>{{ $recruitsku->perjalanan->total }}</td>
                                                    <td>{{ $recruitsku->user->lokasi_estate->nama }}</td>
                                                    <td>
                                                        @if ($recruitsku->status == "-" && $recruitsku->statuspgs == "-"
                                                            && $recruitsku->statushrhead == "-" && $recruitsku->statusgahead == "-"
                                                            && $recruitsku->statuscma == "-")
                                                        Data Belum Di Proses

                                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statusgahead == "-"
                                                        && $recruitsku->ketklaim == "Invoice")
                                                        Progres Di GA

                                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statusgahead == "-"
                                                        && $recruitsku->ketklaim == "Non Invoice" && $recruitsku->npk == null)
                                                        Progres Di Hr Staff (Pemberian NPK)

                                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statusgahead == "Approve"
                                                        && $recruitsku->ketklaim == "Invoice" && $recruitsku->npk == null)
                                                        Progres Di Hr Staff (Pemberian NPK)

                                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statushrhead == "Approve"
                                                        && $recruitsku->statuspgs == "-")
                                                        Progres Di PGS

                                                        @elseif($recruitsku->status == "Approve" && $recruitsku->npk != null
                                                        && $recruitsku->statushrhead == "-")
                                                        Progres Di HR Head

                                                        @elseif($recruitsku->status == "Reject")
                                                        Prosess di Reject Oleh HR Staff

                                                        @elseif($recruitsku->statusgahead == "Reject")
                                                        Prosess di Reject GA

                                                        @elseif($recruitsku->statushrhead == "Reject")
                                                        Prosess di Reject HR Head

                                                        @elseif($recruitsku->statuspgs == "Reject")
                                                        Prosess di Reject PGS

                                                        @elseif($recruitsku->statuscma == "Reject")
                                                        Prosess di Reject CMA

                                                        @elseif($recruitsku->status != "-" && $recruitsku->statushrhead != "-"
                                                        && $recruitsku->statuspgs == "-"  && $recruitsku->statuscma == "-")
                                                        Progres Di PGS

                                                        @elseif($recruitsku->statuspgs == "Reject"
                                                        && $recruitsku->kolom1 == null)
                                                        Prosess di Reject PGS

                                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statuspgs == "Approve"
                                                        && $recruitsku->npk != null)
                                                        Progres Di Hr Staff (Pembuatan Lampiran)

                                                        @elseif($recruitsku->status == "Approvee" && $recruitsku->statushrhead == "Approve"
                                                        && $recruitsku->statuspgs == "Approve"  && $recruitsku->statuscma == "-")
                                                        Progres Di CMA

                                                        @elseif($recruitsku->status != "-" && $recruitsku->statushrhead != "-"
                                                        && $recruitsku->statuspgs != "-"  && $recruitsku->statuscma != "-")
                                                        {{$recruitsku->statuscma}}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($recruitsku->status == "-" && $recruitsku->statuspgs == "-" ||
                                                             $recruitsku->status == "Approve" && $recruitsku->statuspgs == "Approve")
                                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                                                        @elseif($recruitsku->status == "Reject" ||
                                                                $recruitsku->statuspgs == "Reject"
                                                            || $recruitsku->statushrhead == "Reject"
                                                            || $recruitsku->statusgahead == "Reject"
                                                            || $recruitsku->statuscma == "Reject")
                                                        <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                                                        @elseif ($recruitsku->status == "Approve" && $recruitsku->npk != null
                                                                && $recruitsku->ketklaim == "Non Invoice")
                                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                                        @elseif ($recruitsku->status == "Approve" && $recruitsku->npk == null
                                                        && $recruitsku->ketklaim == "Invoice" && $recruitsku->statusgahead == "-")
                                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                                        @elseif ($recruitsku->status == "Approve" && $recruitsku->npk == null
                                                        && $recruitsku->ketklaim == "Invoice" && $recruitsku->statusgahead == "Approve")
                                                         <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></i></a>

                                                         @elseif ($recruitsku->status == "Approve" && $recruitsku->npk != null
                                                        && $recruitsku->ketklaim == "Invoice")
                                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                                        @elseif ($recruitsku->status == "Approve" && $recruitsku->statusgahead == "Approve"
                                                                && $recruitsku->ketklaim == "Invoice" && $recruitsku->npk == null)
                                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></i></a>

                                                        @elseif ($recruitsku->status == "Approvee" && $recruitsku->statuspgs == "Approve")
                                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($recruitsku->statuscma == "-")
                                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                                                        @elseif($recruitsku->status == "Reject" ||
                                                                $recruitsku->statuspgs == "Reject"
                                                            || $recruitsku->statushrhead == "Reject"
                                                            || $recruitsku->statusgahead == "Reject"
                                                            || $recruitsku->statuscma == "Reject")
                                                        <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                                                        @elseif ($recruitsku->statuscma == "Approve")
                                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>
                                                        @endif
                                                    </td>

                                                    <td>{{ $recruitsku->tanggal_verif }}</td>
                                                    <td>{{ $recruitsku->created_at }}</td>

                                                    @if ($recruitsku->statuspgs == "Approve" && $recruitsku->status == "Approvee"
                                                                            || $recruitsku->statuscma == "Approve")
                                                        <td>
                                                            <a href="/dashboard/mergepdf/{{ $recruitsku->id}}" target="_blank" class="badge btn-success">Download Data</a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <b>-</b>
                                                        </td>
                                                    @endif

                                                    <td>
                                                        <a href="/dashboard/hr/{{ $recruitsku->id}}"><i class="fa fa-eye fa-lg"></i></span></a>&nbsp;&nbsp;

                                                        <a href="/dashboard/hr/{{$recruitsku->id}}/edit"><i class="fas fa-edit fa-lg"
                                                            style="color: rgb(59, 29, 1)"></i></a>

                                                            {{-- @if ($recruitsku->status == null && $recruitsku->statuspgs == null
                                                                && $recruitsku->statushrhead == null && $recruitsku->statusgahead == null
                                                                && $recruitsku->statuscma == null)

                                                                <form action="/dashboard/hr/{{$recruitsku->id}}" method="post" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf --}}
                                                                    {{-- <button class="border-0" onclick="return confirm('Yakin Data ini di hapus?')"> --}}
                                                                        {{-- <button class="border-0"><i class="fa fa-trash-alt fa-lg" style="color: rgb(255, 0, 21)"
                                                                        onclick="return confirm('Yakin Data ini di hapus?')"></i></button> --}}
                                                                    {{-- </button> --}}
                                                                {{-- </form>
                                                            @endif --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- <div class="card-footer">

                                            <div class="d-flex justify-content-end pull-right">
                                                {{ $recruitskus->links() }}
                                            </div>
                                            <div class="d-flex justify-content-left pull-left">
                                                <a href="/dashboard/print" target="_blank" class="btn btn-primary">Print PDF</a>
                                            </div>
                                    </div> --}}

                                    <div class="row justify-content-end">
                                        <div class="col-md-4-end">
                                        <button type="submit" class="btn btn-primary">Print PDF</a>
                                        </div>&nbsp;&nbsp;&nbsp;

                                        <div class="col-md-4-end">
                                        {{ $recruitskus->links() }}
                                        </div>
                                    </div>
                                </div>
                                </form>
                    </div>
                <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        @endsection
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script>
            $(function(e) {
                $("#chkCheckAll").cllik(function(){
                $(".checkBoxClass").prop('checked',$(this).prop('checked'));
                })
            });
        </script>


    </body>
</html>
