<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PK Sheokand</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">

<?php 
include('config.php');
if(!isset($_GET['bill_no'])&& !isset($_GET['bank_id'])){

}
$bill_no = $_GET['bill_no'];
//$bank_id = $_GET['bank_id'];

$sql ="SELECT b.bank_name, b.village, a.gst, a.grand_total,a.bill_status FROM `bank` a, bank_details b where a.bank_id = b.s_no AND a.bill_no = $bill_no ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);


?>




  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
     
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <form>
                <div class="row">
                  
                  <div class="col-12">
                    <h4>
                    <i class="fas fa-gavel"></i> Adv. PK SHEOKAND
                      <small class="float-right">Date: <?php echo date("d/m/Y") ?></small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    From
                    <address>
                      <strong>PK SHEOKAND</strong><br>
                      Ch. No. 25 Civil Court<br>
                      Narwana<br>
                      Mobile No.: 9896252028<br>
                      Email: pksheokand84@gmail.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    To
                    <address>
                      <strong>Br. Manager</strong><br>
                      <p><?php echo $data['bank_name']; ?></p>
                      <p><?php echo $data['village']; ?></p>
                      <!-- <input type="text" class="form-control" placeholder="Phone No."><br> -->
                      
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Bill No. 00<?php echo $bill_no; ?></b><br>
                    <br>
                    <b>PAN No.</b> CVJPK0710M<br>
                    <!-- <b>Payment Due:</b> 2/22/2014<br> -->
                    <b>Pay to Account:</b> 2194000102003473
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped" >
                      <thead>
                        <tr>
                          <th>SL.No.</th>
                          <th>Ac/No. </th>
                          <th>Bill Type </th>
                          <th>Name</th>
                          <th>Fathrer's Name</th>
                          <th>Village</th>
                          <th>Due Amt.</th>
                          <th>Due Date</th>
                          <th>Layar Fee</th>
                          <th>Clerkage & Pocket <br> Expencies</th>
                          <th>Total Fee</th>
                          
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <?php 
                          $sql = "SELECT * FROM `bill` WHERE bill_no=$bill_no";
                          $res = mysqli_query($con, $sql);
                          $i=1;
                          while ($row=mysqli_fetch_assoc($res)){

                          
                        ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row['ac_no']; ?></td>
                          <td><?php echo $row['bill_type']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['f_name']; ?></td>
                          <td><?php echo $row['village']; ?></td>
                          <td><?php echo $row['due_amt']; ?></td>
                          <td><?php echo $row['due_date']; ?></td>
                          <td><?php echo $row['lawyer_fee']; ?></td>
                          <td><?php echo $row['expencies']; ?></td>
                          <td><?php echo $row['total_fee']; ?></td>
                        
                          
                          
                        </tr>

                        <?php } ?>
                        <!-- <tr>
                          <td>1</td>
                          <td>Need for Speed IV</td>
                          <td>247-925-726</td>
                          <td>Wes Anderson umami biodiesel</td>
                          <td>$50.00</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Monsters DVD</td>
                          <td>735-845-642</td>
                          <td>Terry Richardson helvetica tousled street art master</td>
                          <td>$10.70</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Grown Ups Blue Ray</td>
                          <td>422-568-642</td>
                          <td>Tousled lomo letterpress</td>
                          <td>$25.99</td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-6">
                    <!-- <p class="lead">Payment Methods:</p>
                    <img src="dist/img/credit/visa.png" alt="Visa">
                    <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="dist/img/credit/american-express.png" alt="American Express">
                    <img src="dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                      plugg
                      dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p> -->
                  </div>
                  <!-- /.col -->
                  <div class="col-6">
                    <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <!-- <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                          </tr> -->
                          <!-- <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                          </tr> -->
                          <tr>
                            <th>GST </th>
                            <td><?php echo $data['gst']; ?>%</td>
                          </tr>
                          <tr>
                            <th>Grand Total:</th>
                            <td>Rs. <?php echo $data['grand_total']; ?></td>
                          </tr>
                          <tr>
                            <th>Bill Status</th>
                            <td><?php echo $data['bill_status']; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                </form>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

  </div>
  <!-- ./wrapper -->

  <!-- Page specific script -->

 <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- Sweetalert2 -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- dropzonejs -->
  <script src="plugins/dropzone/min/dropzone.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>



</body>

</html>