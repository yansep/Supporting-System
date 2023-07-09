@extends('layouts.master')

@section('content-header')
<div class="row">
    <div class="col-12">
        @if(session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
          {{ session ('success') }}
        </div>
        @endif
      <!-- /.card -->

      <div class="card">

        <div class="card-header">

            <div class="card-header">
                <h3 class="card-title"><b>DATA ALL SKU</b></h3>
              </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <form class="row row-cols-lg-auto g-1">
                {{-- <div class="col">
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
                </div> --}}

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
                        name="statuspgs">
                        <option value="">All Status</option>
                        <option value="Approve">Approve</option>
                        <option value="-">Belum Approve</option>
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
            </form>

            <div class="divider"></div>
                    <table id="example1" class="table table-bordered table-striped" style = text-align:center role="table" aria-busy="false" aria-colcount="14">
                        <thead>

                            <tr>
                                <th  scope="col">No</th>
                                <th  scope="col">NIK</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">Keterangan</th>
                                {{-- <th colspan="2" scope="col">Proses</th> --}}
                                <th scope="col">HC Staff</th>
                                <th scope="col">GA HEAD</th>
                                <th scope="col">HC HEAD</th>
                                <th scope="col">PGS</th>
                                <th scope="col">CMA</th>
                                <th scope="col">Tgl Diproses Terakhir</th>
                                <th scope="col">Tgl Di Buat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($recruitskus as $key => $recruitsku)
                                <tr>
                                <td aria-colindex="11" role="cell" class="align-middle text-left text-nowrap nameOfTheClass">
                                    {{ $recruitskus->firstItem() + $key }}</td>
                                <td style = text-align:left aria-colindex="11" role="cell" class="align-middle text-left text-nowrap nameOfTheClass">{{ $recruitsku->nik }}</td>
                                <td style = text-align:left>{{ $recruitsku->nama }}</td>
                                <td style = text-align:left>{{ $recruitsku->ketklaim }}</td>
                                    {{-- <td>
                                                @if ($recruitsku->status == null && $recruitsku->statuspgs == null
                                                && $recruitsku->statushrhead == null && $recruitsku->statusgahead == null
                                                && $recruitsku->statuscma == null)
                                        Data Belum Di Proses

                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statusgahead == null
                                        && $recruitsku->ketklaim == "Invoice")
                                        Progres Di GA

                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statusgahead == null
                                        && $recruitsku->ketklaim == "Non Invoice" && $recruitsku->npk == null)
                                        Progres Di Hr Staff (Pemberian NPK)

                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statusgahead == "Approve"
                                        && $recruitsku->ketklaim == "Invoice"&& $recruitsku->npk == null)
                                        Progres Di Hr Staff (Pemberian NPK)

                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statushrhead == "Approve"
                                        && $recruitsku->statuspgs == null)
                                        Progres Di PGS

                                        @elseif($recruitsku->status == "Approve" && $recruitsku->npk != null
                                        && $recruitsku->statushrhead == null)
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

                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statushrhead == "Approve"
                                        && $recruitsku->statuspgs == null  && $recruitsku->statuscma == null)
                                        Progres Di PGS

                                        @elseif($recruitsku->status == "Approve" && $recruitsku->statushrhead == "Approve"
                                        && $recruitsku->statuspgs == "Approve"  && $recruitsku->statuscma == null)
                                        Hr Staff Proses Lampiran

                                        @elseif($recruitsku->status == "Approvee" && $recruitsku->statushrhead == "Approve"
                                        && $recruitsku->statuspgs == "Approve"  && $recruitsku->statuscma == null)
                                        Progres Di CMA

                                        @elseif($recruitsku->status == "Approvee" && $recruitsku->statushrhead == "Approve"
                                        && $recruitsku->statuspgs == "Approve"  && $recruitsku->statuscma != null)
                                        {{$recruitsku->statuscma}} CMA
                                        @endif
                                    </td> --}}



                                    {{-- PROSES HC STAFF --}}
                                    <td>
                                        @if ($recruitsku->status == "-" && $recruitsku->statuspgs == "-" ||
                                             $recruitsku->status == "Approve" && $recruitsku->statuspgs == "Approve")
                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                                        @elseif($recruitsku->status == "Reject")
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

                                    {{-- PROSES ga head --}}
                                    <td>
                                        @if ($recruitsku->statusgahead == "Reject")
                                        <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                                        @elseif($recruitsku->statusgahead == "-" && $recruitsku->ketklaim == "Invoice")
                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                                        @elseif($recruitsku->statusgahead == "-" && $recruitsku->ketklaim == "Non Invoice")
                                        <a>-</a>

                                        @elseif ($recruitsku->statusgahead == "Approve")
                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>
                                        @endif
                                    </td>

                                    {{-- PROSES hc head --}}
                                    <td>
                                        @if ($recruitsku->statushrhead == "-")
                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                                        @elseif($recruitsku->statushrhead == "Reject")
                                        <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                                        @elseif ($recruitsku->statushrhead == "Approve")
                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>
                                        @endif
                                    </td>

                                    {{-- PROSES PGS --}}
                                    <td>
                                        @if ($recruitsku->statuspgs == "Reject")
                                        <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                                        @elseif($recruitsku->statuspgs == "-")
                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>


                                        @elseif ($recruitsku->statuspgs == "Approve")
                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>
                                        @endif
                                    </td>

                                    {{-- PROSES cma --}}
                                    <td>
                                        @if ($recruitsku->statuscma == "-")
                                        <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                                        @elseif($recruitsku->statuscma == "Reject")
                                        <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                                        @elseif ($recruitsku->statuscma == "Approve")
                                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                        @endif
                                    </td>

                                    <td>{{ $recruitsku->tanggal_verif }}</td>
                                    <td>{{ $recruitsku->created_at }}</td>

                                    <td>

                                        <a href="/dashboard/sku/{{ $recruitsku->id}}"><i class="fa fa-eye fa-lg"></i></span></a>&nbsp;&nbsp;

                                        <a href="/dashboard/sku/{{$recruitsku->id}}/edit"><i class="fas fa-edit fa-lg"
                                            style="color: rgb(59, 29, 1)"></i></a>


                                        @if ($recruitsku->status == "-" && $recruitsku->statuspgs == "-"
                                            && $recruitsku->statushrhead == "-" && $recruitsku->statusgahead == "-"
                                            && $recruitsku->statuscma == "-" ||
                                                $recruitsku->status == "Reject"
                                            || $recruitsku->statuspgs == "Reject"
                                            || $recruitsku->statushrhead == "Reject"
                                            || $recruitsku->statusgahead == "Reject"
                                            || $recruitsku->statuscma == "Reject")

                                            <form action="/dashboard/sku/{{$recruitsku->id}}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                {{-- <button class="border-0" onclick="return confirm('Yakin Data ini di hapus?')"> --}}
                                                <button class="border-0"><i class="fa fa-trash-alt fa-lg" style="color: rgb(255, 0, 21)"
                                                onclick="return confirm('Yakin Data ini di hapus?')"></i></button>
                                                {{-- </button> --}}
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                            <br>
                    <div class="d-flex justify-content-end pull-right">
                        <br>
                        {{ $recruitskus->links() }}

                        <!-- Bootstrap core CSS Showing
                        {{ $recruitskus->firstItem() }}
                        to
                        {{ $recruitskus->lastItem() }}
                        of
                        {{ $recruitskus->total() }}
                        entries-->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
  <!-- /.row -->
@endsection
