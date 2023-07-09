
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Data SKU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
</head>
<body>
<div class="mr-5" style="font-size:10px;">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header text-center"><br>
          Laporan Data SKU
          {{-- <small class="float-right">Date: 2/10/2014</small> --}}
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      {{-- <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div> --}}
      <!-- /.col -->
      {{-- <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> --}}
      <!-- /.col -->
    </div><br>
    <!-- /.row -->

    <!-- Table row -->
      <div class="row">
            <div class="col-12 table-responsive">
                <table id="example1" class="table table-bordered table-striped" style = text-align:center
                  role="table" aria-busy="false" aria-colcount="14">
                  <thead>
                  {{-- <tr>
                    <th scope="col" rowspan="2" style = text-align:center>No</th>
                    <th scope="col" colspan="5">URAIAN Transportasi</th>
                    <th scope="col" colspan="3">URAIAN Cafetaria</th>
                    <th scope="col" rowspan="2" style = text-align:center>Total</th>
                  </tr> --}}

                  <tr>
                    <th scope="col" style = text-align:center>No</th>
                    <th scope="col" style = text-align:center>NPK</th>
                    <th scope="col" style = text-align:center>Nik</th>
                    <th scope="col" style = text-align:center>Nama</th>
                    <th scope="col" style = text-align:center>Asal Daerah (KTP)</th>
                    <th scope="col" style = text-align:center>Keterangan</th>
                    <th scope="col" style = text-align:center>Status</th>
                    <th scope="col" style = text-align:center>PT</th>
                    <th scope="col" style = text-align:center>Estate</th>
                    <th scope="col" style = text-align:center>Tgl Dibuat</th>

                  </tr>

                  </thead>

                  <tbody>
                    @foreach($recruitskus as $recruitskus)
                    <tr>
                        <td >{{ $recruitskus->id }}</td>
                        <td  style = text-align:center>{{ $recruitskus->npk }}</td>
                        <td  style = text-align:center>{{ $recruitskus->nik }}</td>
                        <td  style = text-align:center>{{ $recruitskus->nama }}</td>
                        <td  style = text-align:center> {{ $recruitskus->regency->name }}</td>
                        <td  style = text-align:center>{{ $recruitskus->ketklaim }}</td>
                        <td  style = text-align:center>{{ $recruitskus->statuskaryawan }}</td>
                        <td  style = text-align:center>{{ $recruitskus->user->PT }}</td>
                        <td  style = text-align:center>{{ $recruitskus->user->estate}}</td>
                        <td  style = text-align:center>{{ $recruitskus->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div><br><br>

            <div class="col-12 table-responsive">
                <table id="example1" class="table table-bordered table-striped" style = text-align:center
                  role="table" aria-busy="false" aria-colcount="14">
                  <thead>
                  <tr>
                    <th scope="col" rowspan="2" style = text-align:center>No</th>
                    <th scope="col" colspan="5">URAIAN Transportasi</th>
                    <th scope="col" colspan="3">URAIAN Cafetaria</th>
                    <th scope="col" rowspan="2" style = text-align:center>Total</th>
                  </tr>

                  <tr>
                    <th scope="col">Kabupaten Penjemputan</th>
                    <th scope="col">Kabupaten Tiba</th>
                    <th scope="col" style = text-align:center>Jiwa / Qty</th>
                    <th scope="col" style = text-align:center>Biaya / Orang</th>
                    <th scope="col" style = text-align:center>Total Biaya Transportasi</th>
                    <th scope="col">Berapa X Makan</th>
                    <th scope="col">Biaya / Makan</th>
                    <th scope="col" style = text-align:center>Total Biaya Cafetaria</th>
                  </tr>

                  </thead>

                  <tbody>
                    @foreach($perjalanan as $perjalanan)
                    <tr>
                        <td >{{ 1 }}</td>
                        <td  style = text-align:center>{{ $perjalanan->kab_asal }}</td>
                        <td  style = text-align:center>{{ $perjalanan->kab_tiba }}</td>
                        <td  style = text-align:center>{{ $perjalanan->org_transport }}</td>
                        <td  style = text-align:center>@currency( $perjalanan->kolom1 )</td>
                        <td  style = text-align:center>@currency ( $perjalanan->total_transport )</td>
                        <td  style = text-align:center>{{ $perjalanan->org_cefetaria }}</td>
                        <td  style = text-align:center>@currency( $perjalanan->kolom2 )</td>
                        <td  style = text-align:center>@currency ( $perjalanan->total_cafetaria )</td>
                        <td  style = text-align:center>@currency ( $perjalanan->total )</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            
              <div class="col-12">
                <div class="row justify-content-end">
                  <div class="table-responsive-end col-md-4">
                    <table class="table" width="100px">
                      <tr>
                        <td colspan="10" width="600px" style="text-align: right; font-weight:bold;">Subtotal:</td>
                        <td>@currency ($total_biaya) </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <br><br>

              <div class="row justify-content-end">
                <div class="col-">
                    <p class="row justify-content-center"><b>{{ $recruitskus->tanggal_verif }}</b></p>
                </div>
              </div><br>



                @if($recruitskus->ketklaim == 'Non Invoice')
                <table class="table">
                  <tr>
                    <td>
                      <div class="text-center">
                          <p class="row justify-content-center"><b>Di BUAT:</b></p>
                          <p class="row justify-content-center"><b>APPROVED BY SYSTEM</b></p>
                          <p class="row justify-content-center"><b>HC STAFF</b></p>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="row justify-content-center"><b>Di KETAHUI:</b></p>
                        <p class="row justify-content-center"><b>APPROVED BY SYSTEM</b></p>
                        <p class="row justify-content-center"><b>PGS</b></p>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="row justify-content-center"><b>Di SETUJUI:</b></p>
                        <p class="row justify-content-center"><b>APPROVED BY SYSTEM</b></p>
                        <p class="row justify-content-center"><b>HR HEAD</b></p>
                      </div>
                    </td>
                  </tr>
                </table>
                @elseif($recruitskus->ketklaim == 'Invoice')
                <table class="table pl-4">
                  <tr>
                    <td>
                      <div class="text-center">
                        <p class="row justify-content-center"><b>Di BUAT:</b></p>
                        <p class="row justify-content-center"><b>APPROVED BY SYSTEM</b></p>
                        <p class="row justify-content-center"><b>HC STAFF</b></p>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="row justify-content-center"><b>Di KETAHUI:</b></p>
                        <p class="row justify-content-center"><b>APPROVED BY SYSTEM</b></p>
                        <p class="row justify-content-center"><b>PGS</b></p>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="row justify-content-center"><b>Di SETUJUI:</b></p>
                        <p class="row justify-content-center"><b>APPROVED BY SYSTEM</b></p>
                        <p class="row justify-content-center"><b>GA HEAD</b></p>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="row justify-content-center"><b>Di SETUJUI:</b></p>
                        <p class="row justify-content-center"><b>APPROVED BY SYSTEM</b></p>
                        <p class="row justify-content-center"><b>HR HEAD</b></p>
                      </div>
                    </td>
                  </tr>
                </table>
                @endif

                <div class="col-12 table-responsive">
                    <table id="example1" class="table table-bordered table-striped" style = text-align:center
                      role="table" aria-busy="false" aria-colcount="14">
                      <thead>

                      <tr>

                      </tr>

                      </thead>

                      <tbody>
                            <tr>
                                <td  style = text-align:center><a href="/{{ $recruitskus->dokumen_ktp}}" target="_blank"></td>
                            </tr>
                        </tbody>
                    </table>
                </div><br><br>
        <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->

    {{-- <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="/dist/img/credit/visa.png" alt="Visa">
        <img src="/dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="/dist/img/credit/american-express.png" alt="American Express">
        <img src="/dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div> --}}
    <!-- /.row -->
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  window.addEventListener("load", window.print());
</script>
</body>
</html>
