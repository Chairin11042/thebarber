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
<?php 
include 'connect.php';

$id= $_GET['approve'];

$status_id = 1;


$sql = "UPDATE booking SET  
status_id='$status_id' 
WHERE id='$id' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn); //ปิดการเชื่อมต่อ database 


  echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal.fire({
        title: "สำเร็จ!",
        text: "อนุมัติแล้ว !!",
        type: "success",
        icon: "success"
      });';
      echo '}, 1000 );</script>';
  
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { 
          window.location.href = "../";';
      echo '}, 2000 );</script>';
 