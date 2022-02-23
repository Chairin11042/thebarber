<?php 
    session_start();
    error_reporting(0);
    if ($_SESSION['id'] == "") {
        header("location: /thecar/config/signin");
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="js/fullcalendar-2.1.1/fullcalendar.min.css">
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">


    <style type="text/css">
    
	#calendar{
		max-width: 700px;
		margin: 0 auto;
        font-size:13px;
	}        
    </style>
</head>
<body >
    <!-- Sidenav -->
  <?php include '../config/header.php'; 
  include '../config/connect.php'; 
  ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include '../config/nav.php'; ?>  
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
           
          </div>
          <?php include '../config/cardlist.php'; ?>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-6">
    
  
<br><br>
<div class="section-title row text-center">
<div class="col-md-8 col-md-offset-2">
<h3>ยินดีต้อนรับสู่บริการจองคิวออนไลน์</h3>
<hr class="grd1">
<h4>เลือกข้อมูลและตรวจสอบให้ครบถ้วนก่อนทำการจองนะครับ.</h4>
</div>
</div><!-- end title -->
<div class="body1 contact_form mt-10" style="display:block;width:100%;height:100%;">
<h3 class="mb-0">ปฏิทินการจอง</h3>
 <div id='calendar'></div>
 
 </div>
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script type="text/javascript" src="js/fullcalendar-2.1.1/lib/moment.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/lang/th.js"></script>
<script type="text/javascript" src="script.js"></script> 
           
</body>
<?php } ?>
</html>