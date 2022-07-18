@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">

      <!-- /.card -->

      <div class="card">

        <div class="card-header">
          <h3 class="card-title"><b>DATA SKU</b></h3>
        </div>
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

        <!-- /.card-header -->
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <label>PT</label>
                    <select id="filter-organisasi" class="form-control">
                    <option value="">Pilih PT</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>ESTATE</label>
                    <select id="filter-organisasi" class="form-control">
                    <option value="">Pilih Estate</option>
                    <option value="1">Estate Jabdan 1</option>
                    <option value="2">Estate Jabdan 2</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Approve</label>
                    <select id="filter-organisasi" class="form-control">
                    <option value="">Pilih Estate</option>
                    <option value="1">Estate Jabdan 1</option>
                    <option value="2">Estate Jabdan 2</option>
                    </select>
                </div>
            </div>
            <div class="divider"></div>

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
            </div><br>

          <table id="example1" class="table table-bordered table-striped" style = text-align:center role="table" aria-busy="false" aria-colcount="14">
            <thead>

            <tr>
                <th  scope="col">No</th>
                <th  scope="col">NIK</th>
                <th scope="col">NAMA</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th colspan="2" scope="col">Proses</th>
                <th scope="col">Proses CMA</th>
                <th scope="col">Tanggal Di Buat</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

                @foreach($recruitskus as $key => $recruitsku)
                <tr>
                  <td aria-colindex="11" role="cell" class="align-middle text-left text-nowrap nameOfTheClass">{{ $recruitskus->firstItem() + $key }}</td>
                  <td style = text-align:left aria-colindex="11" role="cell" class="align-middle text-left text-nowrap nameOfTheClass">{{ $recruitsku->nik }}</td>
                  <td style = text-align:left>{{ $recruitsku->nama }}</td>
                  <td style = text-align:left>{{ $recruitsku->ketklaim }}</td>
                  <td style = text-align:left>{{ $recruitsku->statuskaryawan }}</td>
        <td>
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
               && $recruitsku->ketklaim == "Invoice" && $recruitsku->npk == null)
               Progres Di Hr Staff (Pemberian NPK)

               @elseif($recruitsku->status == "Approve" && $recruitsku->statushrhead == "Approve"
               && $recruitsku->statuspgs == null)
               Progres Di PGS

               @elseif($recruitsku->status == "Approve" && $recruitsku->npk != null
               && $recruitsku->statushrhead == null)
               Progres Di HR Head

               @elseif($recruitsku->status == "Prosess di Reaject Oleh HR Staff")
               Prosess di Reject Oleh HR Staff

               @elseif($recruitsku->statusgahead == "Prosess di Reaject GA")
               Prosess di Reject GA

               @elseif($recruitsku->statushrhead == "Prosess di Reaject HR Head")
               Prosess di Reaject HR Head

               @elseif($recruitsku->statuspgs == "Prosess di Reaject PGS")
               Prosess di Reaject PGS

               @elseif($recruitsku->statuscma == "REJECT")
               Prosess di Reaject CMA

               @elseif($recruitsku->status != null && $recruitsku->statushrhead != null
               && $recruitsku->statuspgs == null  && $recruitsku->statuscma == null)
               Progres Di PGS

               @elseif($recruitsku->statuspgs == "HR Staff memproses Lampiran"
               && $recruitsku->kolom1 == null)
               {{$recruitsku->statuspgs}}

               @elseif($recruitsku->status != null && $recruitsku->statushrhead != null
               && $recruitsku->statuspgs != null  && $recruitsku->statuscma == null)
               Progres Di CMA

               @elseif($recruitsku->status != null && $recruitsku->statushrhead != null
               && $recruitsku->statuspgs != null  && $recruitsku->statuscma != null)
               {{$recruitsku->statuscma}}
            @endif
        </td>


                  <td>
                    @if ($recruitsku->status == "Prosess di Reaject Oleh HR Staff" ||
                              $recruitsku->statuspgs == "Prosess di Reaject PGS"
                           || $recruitsku->statushrhead == "Prosess di Reaject HR Head"
                           || $recruitsku->statusgahead == "Prosess di Reaject GA"
                           || $recruitsku->statuscma == "REJECT")
                      <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                    @elseif($recruitsku->statuspgs == null)
                    <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>


                      @elseif ($recruitsku->statuspgs == "HR Staff memproses Lampiran")
                       <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>
                    @endif
                  </td>

                  <td>
                    @if ($recruitsku->status == null && $recruitsku->statuspgs == null
                        && $recruitsku->statushrhead == null && $recruitsku->statusgahead == null
                        && $recruitsku->statuscma == null)
                       <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                      @elseif($recruitsku->status == "Prosess di Reaject Oleh HR Staff" ||
                              $recruitsku->statuspgs == "Prosess di Reaject PGS"
                           || $recruitsku->statushrhead == "Prosess di Reaject HR Head"
                           || $recruitsku->statusgahead == "Prosess di Reaject GA"
                           || $recruitsku->statuscma == "REJECT")
                      <a><i class="fa fa-times-circle fa-lg" style="color: rgb(180, 12, 12)"></i></a>

                      @elseif ($recruitsku->statuscma == "APPROVE")
                      <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                      @elseif ($recruitsku->status != null || $recruitsku->statuspgs != null
                        || $recruitsku->statushrhead != null || $recruitsku->statusgahead != null)
                       <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>


                    @endif
                  </td>




                  <td>{{ $recruitsku->created_at }}</td>
                  <td>
                    <a href="/dashboard/sku/{{ $recruitsku->id}}"><i class="fa fa-eye fa-lg"></i></span></a>&nbsp;&nbsp;

                    <a href="/dashboard/sku/{{$recruitsku->id}}/edit"><i class="fas fa-edit fa-lg"
                        style="color: rgb(59, 29, 1)"></i></a>

                    @if ($recruitsku->status == null && $recruitsku->statuspgs == null
                        && $recruitsku->statushrhead == null && $recruitsku->statusgahead == null
                        && $recruitsku->statuscma == null ||
                            $recruitsku->status == "Prosess di Reaject Oleh HR Staff"
                           || $recruitsku->statuspgs == "Prosess di Reaject PGS"
                           || $recruitsku->statushrhead == "Prosess di Reaject HR Head"
                           || $recruitsku->statusgahead == "Prosess di Reaject GA"
                           || $recruitsku->statuscma == "REJECT")

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
