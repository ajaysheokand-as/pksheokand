<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PK SHEOKAND</title>

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
  <!-- daterange picker -->
  <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">

  <?php 
  include('config.php');
  $sql = "SELECT bill_no FROM `bank` ORDER BY bill_no DESC LIMIT 1";
  $result = mysqli_query($con,$sql);
  $bill_no = mysqli_fetch_assoc($result)['bill_no']+1;

  ?>


  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Bill</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
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
                <form action="add_bank.php" method="POST">
                <div class="row">
                  
                  <div class="col-12">
                    <h4>
                    <i class="fas fa-gavel"></i> Adv. PK SHEOKAND
                      <small class="float-right"> Date: <?php echo date("d/m/Y") ?></small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-3 invoice-col">
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
                      <input type="text" name="bank_name" class="form-control" placeholder="Bank Name"> <br>
                      <input type="text" name="village" class="form-control" placeholder="Village">
                      <button type="submit" id="add" class="btn btn-primary">Add</button><br>
                      
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-5 invoice-col">
                    <b>Bill No. 00<?php echo($bill_no) ?></b><br>
                    <br>
                    <b>PAN No.</b> CVJPK0710M<br>
                    <!-- <b>Payment Due:</b> 2/22/2014<br> -->
                    <b>Pay to Account:</b> 2194000102003473
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </form>

              <form id="tableform">
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <select  name="bank_id" id="bank_id" class="form-control">
                            <?php
                                
                                 $sql = "SELECT * FROM `bank_details`";
                                  $result = mysqli_query($con,$sql);
                                  while ($row=mysqli_fetch_assoc($result)){

                                  
                            ?>
                          <option value="<?php echo($row['s_no']) ?>"><?php echo($row['bank_name']." ".$row['village']); ?></option>
                          <?php } ?>
                        </select>
                        <input type="text" name="bill_no" id="bill_no" value="<?php echo($bill_no); ?>" hidden >
                    <table class="table table-striped">
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
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <tr>
                          <td>1</td>
                          <td ><input type="text" id="ac_no" name="ac_no" class="form-control" placeholder="Ac/No."></td>
                          <td><select  name="bill_type" class="form-control">
                            <!-- iska ke name hn chan or btaa ok eska dt -->
                          <option value="Notice">Notice</option>
                          <option value="HRA">HRA</option>
                          <option value="Execution">Execution</option>
                          <option value="TSR">TSR</option>
                          <option value="Other">Other</option>
                        </select></td>
                          <td ><input type="text" id="name" name="name" class="form-control" placeholder="Name"></td>
                          <td ><input type="text" id="f_name" name="f_name" class="form-control" placeholder="FName"></td>
                          <td ><input type="text" id="village" name="village" class="form-control" placeholder="Village"></td>
                          <td ><input type="text" id="DueAmt" name="due_amt" class="form-control" placeholder="Due Amt"></td>
                          <td ><input type="date" id="DueDate" name="due_date" class="form-control" ></td>
                          <td ><input type="text" id="LawyerFee" name="lawyer_fee" class="form-control" placeholder="Lawyer Fee" value="0"></td>
                          <td ><input type="text" id="Expencies" name="expencies" class="form-control" placeholder="Clerkage & Pocket Expencies" value="0"></td>
                          <td ><input type="text" id="TotalFee" name="total_fee" class="form-control" value="0" readonly=""></td>
                          <td ><button type="button" id="addbtn" class="btn btn-primary">Add</button></td>
                          
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
                <!-- /.row -->

                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-6">
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
                            <th>GST (in %) </th>
                            <td><input type="text-sm" id="gst" class="form-control" value="0" name=""></td>
                          </tr>
                          <tr>
                            <th>Grand Total:</th>
                            <td>Rs. <label id="grand_total">0</label></td>
                          </tr>
                          <tr>
                            <th>Bill Status</th>
                            <td><div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="paid" id="paid" >
                          <label class="form-check-label">Paid</label>
                          
                        </div>
                        <!-- <div class="form-check">
                          <input class="form-check-input" type="radio" name="paid" checked="" value="Unpaid">
                          <label class="form-check-label">Unpaid</label>
                        </div> -->
                        
                          </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a   class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <button type="button" id="print" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Save & Print </button>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                      <i class="fas fa-download"></i> Generate PDF
                    </button>
                  </div>
                </div>
               
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


   
   
  </script>

  <!-- Page specific script -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
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
  <!-- daterangepicker -->
  <!-- <script src="plugins/moment/moment.min.js"></script> -->
  <!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
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

  <!-- Script to add fee -->
  <script >
    //To Total the Fee
    $(document).ready(function() {
      var grand_total = 0;
      var i=1;
       $('#LawyerFee,#Expencies').on("change",function(){
        //var a=5;
        
    var lawyerfee= parseInt($('#LawyerFee').val());
    var expencies =parseInt($('#Expencies').val());
    var total = lawyerfee+expencies;
    $('#TotalFee').val(total);

       })

       $('#addbtn').on("click",()=>{
        var formdata = $('form#tableform').serializeArray();
        const n={};
        formdata.map((data,i)=>{
          n[data.name]=data.value
        });
        // console.log(n)
        $(document).ajaxSend(() => {
      $("#addbtn").prop("disabled", true);
      $("#addbtn").html("Adding...");
    });
        $.ajax({
          url: "api/bankuserdata.php",
          method: "POST",
          data: JSON.stringify(n),
          contentType: "application/json",
          dataType: "json",
          success: function(result) {

            if(result.success == true) 
            {
              var tr = "<tr>"
                          tr += "<td >"+(i++)+"</td>" 
                          tr += "<td >"+n.ac_no+"</td>"
                          tr += "<td >"+n.bill_type+"</td>"
                          tr += "<td >"+n.name+"</td>"
                          tr += "<td >"+n.f_name+"</td>"
                          tr += "<td >"+n.village+"</td>"
                          tr += "<td >"+n.due_amt+"</td>"
                          tr += "<td >"+n.due_date+"</td>"
                          tr += "<td >"+n.lawyer_fee+"</td>"
                          tr += "<td >"+n.expencies+"</td>"
                          tr += "<td >"+n.total_fee+"</td>"
                          tr += "<td >"+0+"</td>"
                         
                          tr += "</tr>"


        $('#tbody').append(tr)
        grand_total +=parseInt(n.total_fee)
        $('#grand_total').html(grand_total)
            }
          },
        });
        $(document).ajaxError((res) => {
      console.error(res);

      $("#addbtn").attr("disabled", false);
      $("#addbtn").html("Add");
    });
    $(document).ajaxComplete((res) => {
      $("#addbtn").attr("disabled", false);
      $("#addbtn").html("Add");
    });
       })
    
});

</script>
<script type="text/javascript">
  $(document).ready(()=>{
    $('#print').on("click",(e)=>{
      e.preventDefault();
      // var paid = ;

      const data = {
        bill_no : $('#bill_no').val(),
        bank_id : $('#bank_id').val(),
        gst : $('#gst').val(),
        grand_total : $('#grand_total').html(),
        bill_status : $('#bill_status').prop("checked") ? "Paid" :"Unpaid",
        // // bill_no : $('#bill_no').val(),
        // bill_no : $('#bill_no').val(),
      }
       $(document).ajaxSend(() => {
      $("#print").prop("disabled", true);
      $("#print").html("Processing...");
    });
        $.ajax({
         url: "api/bank_details.php",
          method: "POST",
          data: JSON.stringify(data),
          contentType: "application/json",
          dataType: "json",
          success: function(result) {
            console.log(result);
            if(result.success == true) 
            {
              location.href="printbill.php?bill_no=" +data.bill_no+"&bank_id="+data.bank_id;
            }
          }
    })
         $(document).ajaxError((res) => {
      console.error(res);

      $("#print").attr("disabled", false);
      $("#print").html("Print & Save");
    });
    $(document).ajaxComplete((res) => {
      $("#print").attr("disabled", false);
      $("#print").html("Print & Save");
    });
  })
  });
</script>

</body>

</html>