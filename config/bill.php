<?php 
  include "connect.php"; 
  error_reporting(0);
  session_start();
  
    $id = $_GET['approve'];

    $sqlcust = "SELECT * , booking.id as bid FROM booking,tblusers,service WHERE service.id=booking.services and booking.custid=tblusers.id and booking.id=$id ";
    $resultcust = $conn->query($sqlcust);
    $rowcust = $resultcust ->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
    <link href="/thebarber/assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ใบเสร็จ
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
 <!-- CSS Files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="dist/css/lightbox.min.css">
</head>

<body class="">
  <div class="wrapper ">
      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">

<div class="card-body">
<div class="container">
<div class="table-responsive">

<center><b><h2 class="text-info">ใบเสร็จ</h2></b></center><br>

 <table  table class="table">
  <tr>
    <th class="text-info">เลขที่ใบเสร็จ</th>
    <th class="text-info">วันที่</th>
    <th class="text-info">ชื่อลูกค้า</th>
    </tr> 
    <td><?php echo $rowcust["bid"];?></td>
    <td><?php echo $rowcust["date_create"];?></td>
    <td><?php echo $rowcust["fullname"];?></td>
    </td>
  </tr>
</table>
<table class="table table-bordered" id="padmin">
                      <thead class=" text-info">
                        <th class="text-info">ชื่อรายการ</th>
                        <th class="text-info">ราคา</th>
                        <th class="text-info">เวลา</th>
                        </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $rowcust['s_name'];?></td>
                          <td><?php echo $rowcust['s_price'];?></td>
                          <td><?php echo $rowcust['s_time'];?></td>
                        </tr>
                        <?php if($rowcust['services2']>0) : ?>
                        <tr>
                        <?php
                        $strSQL2 = "SELECT * FROM service";
                        $objQuery2 = $conn->query($strSQL2);
                        while($objResult2 = mysqli_fetch_assoc($objQuery2))
                        {
                        ?>
                        <?php if($objResult2['id']==$rowcust['services2']) : ?>
                        <td><?php echo $objResult2['s_name']; ?></td>
                        <?php endif; ?>
                        <?php
                        }
                        ?>
                        <?php if($rowcust['services2']==0) : ?>
                        <td>ไม่มีบริการ</td>
                        <?php endif; ?>
                        <?php
                        $strSQLp = "SELECT * FROM service";
                        $objQueryp = $conn->query($strSQLp);
                        $s2p = 0;
                        while($objResultp = mysqli_fetch_assoc($objQueryp))
                        {
                          $s2p = $objResultp['s_price'];
                        ?>
                        <?php if($objResultp['id']==$rowcust['services2']) : ?>
                        <td><?php echo $objResultp['s_price']; ?></td>
                        <?php endif; ?>
                        <?php
                        }
                        ?>
                        <?php if($rowcust['services2']==0) : ?>
                        <td>ไม่มีบริการ</td>
                        <?php endif; ?>
                        <?php
                        $strSQL2 = "SELECT * FROM service";
                        $objQuery2 = $conn->query($strSQL2);
                        while($objResult2 = mysqli_fetch_assoc($objQuery2))
                        {
                        ?>
                        <?php if($objResult2['id']==$rowcust['services2']) : ?>
                        <td><?php echo $objResult2['s_time']; ?></td>
                        <?php endif; ?>
                        <?php
                        }
                        ?>
                        <?php if($rowcust['services2']==0) : ?>
                        <td>ไม่มีบริการ</td>
                        <?php endif; ?>
                        </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                    <tr class = ""><td colspan="3" align = 'right'><b><center>จำนวน</center></b></td>
                    <?php if($rowcust['services2']==0) : ?>
                    <td><p align = "right"><?php echo number_format( 1).' รายการ'; ?></p></td>
                    <?php endif; ?>
                    <?php if($rowcust['services2']>=1) : ?>
                    <td><p align = "right"><?php echo number_format( 2).' รายการ'; ?></p></td>
                    <?php endif; ?>
                    </tr>
                    <tr class = ""><td colspan="3" align = 'right'><b><center>จำนวนเงินรวม</center></b></td>
                    <td><p align = "right"><?php echo number_format( $rowcust['s_price']+$s2p).' บาท.-'; ?></p></td>
                    </tr>
                    </table>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="dist/js/lightbox-plus-jquery.min.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <!-- CSS Files -->
  <!-- remove -->
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>