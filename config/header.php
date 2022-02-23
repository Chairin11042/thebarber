<?php
error_reporting(0);
session_start();
$role_id=$_SESSION['role_id']; ?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>ระบบร้านจองคิวร้านทำผม
    </title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/thebarber/assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/thebarber/assets/style.css">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="/thebarber/assets/css/colors.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="/thebarber/assets/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/thebarber/assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/thebarber/assets/css/custom.css">
    <script src="/thebarber/node_modules/sweetalert2/dist/sweetalert2.all.min.js">
    </script>
    
    </script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
    </script>
    <script src="/thebarber/node_modules/sweetalert2/dist/sweetalert2.min.js">
    </script>
    <link rel="stylesheet" href="/thebarber/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="/thebarber/node_modules/sweetalert2/dist/sweetalert2.all.min.js">
    </script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
    </script>
    <script src="/thebarber/node_modules/sweetalert2/dist/sweetalert2.min.js">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/thebarber/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>


</head>
<style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p {
      font-family: 'Kanit', sans-serif;
    }
  </style>
<body class="barber_version">



    <div id="wrapper">

        <!-- Sidebar-wrapper -->
        <div id="sidebar-wrapper">
			<div class="side-top">
				<div class="logo-sidebar">
					<a href="/thebarber/index"><img src="/thebarber/assets/images/logos/logo.png" alt="image"></a>
				</div>
				<ul class="sidebar-nav">
					<li><a class="" href="/thebarber/index">หน้าแรก</a></li>
          <li><a href="/thebarber/calendars">ปฏิทินการจอง</a></li>
          <?php if($_SESSION['role_id']!=2 && $_SESSION['role_id']!=0) : ?>
					<li><a href="/thebarber/booking">จองคิว</a></li>
                    <li><a href="/thebarber/priceH.php">ตารางรายละเอียดทรงผม</a></li>
          <?php endif; ?>
            <li><a href="/thebarber/adminmanage">รายการจองคิว</a></li>
            
 
                    <?php if(empty($_SESSION['id'])) : ?>
                        <li><a href="/thebarber/config/signin">เข้าสู่ระบบ</a></li>
                    <?php endif; ?> 
                    <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                    <li><a href="/thebarber/config/logout">ออกจากระบบ</a></li>
                    <?php endif; ?>  
				</ul>
			</div>
    </div>
        <!-- End Sidebar-wrapper -->