
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
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header"><br>
          <i class="fas fa-globe"></i> Laporan Data SKU
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
          <tr>
            <th scope="col">No</th>
              <th scope="col">NIK</th>
              <th scope="col">NPK</th>
              <th scope="col">NAMA</th>
              <th scope="col">ASAL KAB</th>
              <th scope="col">KETERANGAN INVOICE / NON INVOICE</th>
              <th scope="col">STATUS KARYAWAN</th>
              <th scope="col">NAMA ISTRI</th>
              <th scope="col">NAMA ANAK 1</th>
              <th scope="col">NAMA ANAK 2</th>
              <th scope="col">NAMA ANAK 3</th>
              <th scope="col">PT</th>
              <th scope="col">ESTATE</th>
              <th scope="col">Transport</th>
              <th scope="col">Cafetaria</th>
              <th scope="col">TOTAL</th>
          </tr>
          </thead>

          <tbody>

            @foreach($recruitskus as $recruitsku)
            <tr>
                <td >{{ $loop->iteration }}</td>
                <td  style = text-align:center>{{ $recruitsku->nik }}</td>
                @if ($recruitsku->npk == null )
                <td  style = text-align:center><b>-</b></td>
                @else
                <td  style = text-align:center>{{ $recruitsku->npk }}</td>
                @endif


                <td  style = text-align:center>{{ $recruitsku->nama }}</td>
                <td  style = text-align:center>{{ $recruitsku->asal }}</td>
                <td  style = text-align:center>{{ $recruitsku->ketklaim }}</td>
                <td  style = text-align:center>{{ $recruitsku->statuskaryawan }}</td>

                @if ($recruitsku->k0 == null )
                <td  style = text-align:center><b>-</b></td>
                @else
                <td  style = text-align:center>{{ $recruitsku->k0 }}</td>
                @endif

                @if ($recruitsku->k1 == null )
                <td  style = text-align:center><b>-</b></td>
                @else
                <td  style = text-align:center>{{ $recruitsku->k1 }}</td>
                @endif

                @if ($recruitsku->k2 == null )
                <td  style = text-align:center><b>-</b></td>
                @else
                <td  style = text-align:center>{{ $recruitsku->k2 }}</td>
                @endif

                @if ($recruitsku->k3 == null )
                <td  style = text-align:center><b>-</b></td>
                @else
                <td  style = text-align:center>{{ $recruitsku->k3 }}</td>
                @endif

                <td style = text-align:center>{{ $recruitsku->user->PT }}</td>
                <td style = text-align:center>{{ $recruitsku->user->estate }}</td>

                @if($recruitsku->kolom1 == null)
                <td  style = text-align:center>Data Belum Diisi</td>
                @else
                <td  style = text-align:center>{{ $recruitsku->kolom1 }}</td>
                @endif

                @if($recruitsku->kolom2 == null)
                <td  style = text-align:center>Data Belum Diisi</td>
                @else
                <td  style = text-align:center>{{ $recruitsku->kolom2 }}</td>
                @endif

                @if($recruitsku->total == null)
                <td style = text-align:center>Data Belum Diisi</td>
                @else
                <td  style = text-align:center>{{ $recruitsku->total}}</td>
                @endif

            </tr>
            @endforeach
        </tbody>
        </table>
    </div><br>
    <div class="col-6-center">
        <p class="row justify-content-center"><b>APPROVED BY : </b></p>
    </div>
    <br>

<div class="row">
    <div class="col-3">
        <p class="row justify-content-center"><b>APPROVED BY</b></p><br>
        <p class="row justify-content-center"><b>HR STAFF</b></p>
    </div>

    <div class="col-3">
        <p class="row justify-content-center"><b>APPROVED BY</b></p><br>
        <p class="row justify-content-center"><b>HR HEAD</b></p>
    </div>

    <div class="col-3">
        <p class="row justify-content-center"><b>APPROVED BY</b></p><br>
        <p class="row justify-content-center"><b>GA HEAD</b></p>
    </div>

    <div class="col-3">
        <p class="row justify-content-center"><b>APPROVED BY</b></p><br>
        <p class="row justify-content-center"><b>PGS</b></p>
    </div>
</div>
      </div>
      <!-- /.col -->
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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  window.addEventListener("load", window.print());
</script>
</body>
</html>
