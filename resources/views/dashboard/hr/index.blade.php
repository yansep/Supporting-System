
<!DOCTYPE html>
<html>

<body>
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
                <h3 class="card-title"><b>DATA ALL SKU</b></h3>
              </div>


              {{-- <div class="row mt-4">
                  <div class="col">
                    <form method="post" class="form-inline">
                        <input type="date" name="tgl_mulai" class="form-control">
                        <input type="date" name="tgl_selesai" class="form-control ml-3">
                        <button type="submit" name="filter_tgl" class="btn btn-info ml-3">
                            filter</button>
                    </form>
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

          <table id="example1" class="table table-bordered table-striped" style = text-align:center
          role="table" aria-busy="false" aria-colcount="14">
            <thead>

            <tr>
                <th scope="col"><input type="checkbox" id="chkCheckAll"></th>
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">NAMA</th>
                <th scope="col">TOTAL</th>
                <th scope="col">PT</th>
                <th scope="col">ESTATE</th>
                <th colspan="2" scope="col">Proses</th>
                <th scope="col">Proses CMA</th>
                <th scope="col">Download</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

                @foreach($recruitskus as $key => $recruitsku)
                <tr>
                    <td><input type="checkbox" name="ids"
                        class="checkBoxClass" value="{{$recruitsku->id}}"/></td>

                    <td>{{ $recruitskus->firstItem() + $key}}</td>
                    <td  style = text-align:left>{{ $recruitsku->nik }}</td>
                    <td  style = text-align:left>{{ $recruitsku->nama }}</td>
                    <td style = text-align:left>@currency($recruitsku->kolom1 + $recruitsku->kolom2)</td>
                    <td style = text-align:left>{{ $recruitsku->user->PT }}</td>
                    <td style = text-align:left>{{ $recruitsku->user->estate }}</td>
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

                                  @elseif ($recruitsku->status == "Approve" && $recruitsku->npk != null
                                  && $recruitsku->kolom2 == null)
                                <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                @elseif ($recruitsku->status == "Approve" && $recruitsku->npk == null
                                  && $recruitsku->kolom2 == null && $recruitsku->ketklaim == "Invoice")
                                <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                  @elseif ($recruitsku->status == "Approve"
                                    && $recruitsku->statusgahead == "Approve" && $recruitsku->npk == null  )
                                  <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>

                                  @elseif ($recruitsku->status == "Approve" && $recruitsku->kolom1 == null
                                  && $recruitsku->kolom2 == null)
                                <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>


                                  @elseif ($recruitsku->status == "Approve"
                                  && $recruitsku->statusgahead == "Approve" && $recruitsku->npk != null ||
                                  $recruitsku->status == "Approve"
                                  && $recruitsku->statuspgs == "HR Staff memproses Lampiran" && $recruitsku->npk != null)
                                <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                  @elseif ($recruitsku->status == "Approve" &&
                                  $recruitsku->statuspgs == null)
                                  <a><i class="fa fa-check-circle fa-lg" style="color: rgb(0, 110, 0)"></i></a>

                                  @elseif ($recruitsku->statuspgs == "HR Staff memproses Lampiran" ||
                                    $recruitsku->statuspgs == null && $recruitsku->statushrhead == null
                                    && $recruitsku->statusgahead == null && $recruitsku->statuscma == null )
                                  <a><i class="fa fa-exclamation-circle fa-lg" style="color: rgb(241, 226, 8)"></i></a>
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


                            @if ($recruitsku->statuspgs == "HR Staff memproses Lampiran")
                                <td>
                                  <a href="/dashboard/downloadpdf/{{ $recruitsku->id}}" target="_blank" class="badge btn-success">Download Data</a>
                                </td>
                            @else
                                <td>
                                 <b> -</b>
                                </td>
                            @endif





                  <td>
                    <a href="/dashboard/hr/{{ $recruitsku->id}}"><i class="fa fa-eye fa-lg"></i></span></a>&nbsp;&nbsp;

                    <a href="/dashboard/hr/{{$recruitsku->id}}/edit"><i class="fas fa-edit fa-lg"
                        style="color: rgb(59, 29, 1)"></i></a>

                    @if ($recruitsku->status == null && $recruitsku->statuspgs == null
                        && $recruitsku->statushrhead == null && $recruitsku->statusgahead == null
                        && $recruitsku->statuscma == null)

                    <form action="/dashboard/hr/{{$recruitsku->id}}" method="post" class="d-inline">
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
              <a href="/dashboard/print" target="_blank" class="btn btn-primary">Print PDF</a>
            </div>&nbsp;&nbsp;&nbsp;

            <div class="col-md-4-end">
              {{ $recruitskus->links() }}
            </div>
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


<script>
    $(function(e) {
        $("#chkCheckAll").cllik(function(){
        $(".checkBoxClass").prop('checked',$(this).prop('checked'));
        })
    });
</script>


</body>
</html>
