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
            {{-- <br>
          <div class="row justify-content-end">
                  <div class="col-sm-10 col-md-6">
                      <div id="example1_filter" class="dataTables_filter">
                  <form action="?" class="col-auto ms-auto">
                      @csrf
                      <div class="input-group">
                          <input type="text" name="search" placeholder="Search .." value="" class="form-control">
                          <button class="btn btn-primary" type="submit">Search</button>
                      </div>
                  </form>
                      </div>
                  </div>
          </div> --}}

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form class="row row-cols-lg-auto g-1">
                @csrf
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
                        name="statushrhead">
                        <option value="">All Status</option>
                        <option value="Approve">Approve</option>
                        <option value = "-">Belum Approve</option>
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
                        <input type="text" name="search" placeholder="Search .." value="" class="form-control">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                    </div>
                </div>
            </div> --}}
            <br>

            <table id="example1" class="table table-bordered table-striped" style = text-align:center role="table" aria-busy="false" aria-colcount="14">
                <thead>

                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIK</th>
                  <th scope="col">NAMA</th>
                  <th scope="col">KETERANGAN</th>
                  <th scope="col">ESTATE</th>
                  <th scope="col">Total</th>
                  <th scope="col">HC Staff</th>
                  <th scope="col">GA HEAD</th>
                  <th scope="col">HC HEAD</th>
                  <th scope="col">PGS</th>
                  <th scope="col">CMA</th>
                  <th scope="col">Tgl Verifikasi Terakhir</th>
                  <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>

                @foreach($recruitskus as $key => $recruitsku)
                <tr>
                    <td>{{ $recruitskus->firstItem() + $key}}</td>
                    {{-- <td >{{ $loop->iteration }}</td> --}}
                    <td style = text-align:left>{{ $recruitsku->nik }}</td>
                    <td style = text-align:left>{{ $recruitsku->nama }}</td>
                    <td style = text-align:left>{{ $recruitsku->ketklaim }}</td>
                    <td style = text-align:left>{{ $recruitsku->user->lokasi_estate->nama }}</td>
                    <td style = text-align:left>@currency ($recruitsku->perjalanan->total) </td>

                    {{-- PROSES HC STAFF --}}
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

                    {{-- PROSES ga head --}}
                    <td>
                        @if ($recruitsku->status == "Reject" ||
                                $recruitsku->statuspgs == "Reject"
                            || $recruitsku->statushrhead == "Reject"
                            || $recruitsku->statusgahead == "Reject"
                            || $recruitsku->statuscma == "Reject")
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

                        @elseif($recruitsku->status == "Reject" ||
                                $recruitsku->statuspgs == "Reject"
                            || $recruitsku->statushrhead == "Reject"
                            || $recruitsku->statusgahead == "Reject"
                            || $recruitsku->statuscma == "Reject")
                        <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                        @elseif ($recruitsku->statushrhead == "Approve")
                        <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>
                        @endif
                    </td>

                    {{-- PROSES PGS --}}
                    <td>
                        @if ($recruitsku->status == "Reject" ||
                                $recruitsku->statuspgs == "Reject"
                            || $recruitsku->statushrhead == "Reject"
                            || $recruitsku->statusgahead == "Reject"
                            || $recruitsku->statuscma == "Reject")
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
                      <td>
                        <a href="/dashboard/hrhead/{{$recruitsku->id}}/edit"><i class="fas fa-edit fa-lg"
                            style="color: rgb(59, 29, 1)"></i></a>
                      </td>
                </tr>
                @endforeach

            </tbody>
          </table>
          <div class="d-flex justify-content-end pull-right">
            {{ $recruitskus->links() }}
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
