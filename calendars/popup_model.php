<?php
    include_once('../config/functions.php');
    include_once('../config/connect.php');
    $rid = $_GET['events'];

    $sql = "SELECT * , booking.id as bid FROM booking,tblusers,service where service.id=booking.services and booking.custid=tblusers.id and booking.id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $inputDate = $mem['time'];
    $strCurrDate = strtotime($inputDate);
    $enddate = date("H:i", mktime(
    date("H",$strCurrDate)+0, 
    date("i",$strCurrDate)-$mem['s_time'], 
    date("s",$strCurrDate)+0, 
    date("m",$strCurrDate)+0  , 
    date("d",$strCurrDate)+0, 
    date("Y",$strCurrDate)+0));
    
?>

<!-- head -->

<body>
    <!-- Sidenav -->
    <?php include '../config/header.php'; ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <!-- Header -->
    <!-- Header -->
  
    <div class="container">
    <div class="row">
        <div class="col">
        <br><br>
<div class="section-title row text-center">
<div class="col-md-8 col-md-offset-2">
<h3>ยินดีต้อนรับสู่บริการจองคิวออนไลน์</h3>
<hr class="grd1">
<h4>เลือกข้อมูลและตรวจสอบให้ครบถ้วนก่อนทำการจองนะครับ.</h4>
</div>
</div><!-- end title -->
          <div class="contact_form">
            <!-- Card header -->
            
            <div class="card-header border-0">
              <h3 class="mb-0">รายละเอียดการจอง</h3>
            </div>
      <div class="table-responsive">
        <table class="table table-dark">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">เลขที่รายการ</th>
                    <th scope="col" class="sort" data-sort="budget">ชื่อ - สกุล</th>
                    <th scope="col" class="sort" data-sort="budget">บริการ 1</th>
                    <th scope="col" class="sort" data-sort="budget">บริการ 2</th>
                    <th scope="col" class="sort" data-sort="budget">ช่างผู้รับงาน</th>
                    <th>วันที่ </th>
                    <th>เวลา</th>
                    <th scope="col" class="sort" data-sort="budget">รายละเอียด</th>                   
                  </tr>
                  <tbody>
                    <td><?php echo $mem['bid'];?></td>
                    <td><?php echo $mem['fullname'];?></td>
                    <td><?php echo $mem['s_name']; ?></td>
                    <?php
                    $strSQL2 = "SELECT * FROM service";
                    $objQuery2 = $conn->query($strSQL2);
                    while($objResult2 = mysqli_fetch_assoc($objQuery2))
                    {
                    ?>
                    <?php if($objResult2['id']==$mem['services2']) : ?>
                    <td><?php echo $objResult2['s_name']; ?></td>
                    <?php endif; ?>
                    <?php
                    }
                    ?>
                    <?php if($mem['services2']==0) : ?>
                    <td>ไม่มีบริการ</td>
                    <?php endif; ?>
                    <?php
                    $strSQL = "SELECT * FROM tblusers where role_id=2";
                    $objQuery = $conn->query($strSQL);
                    while($objResult = mysqli_fetch_assoc($objQuery))
                    {
                    ?>
                    <?php if($objResult['id']==$mem['techid']) : ?>
                    <td><?php echo  $objResult['fullname']?></td>
                    <?php endif; ?>
                    <?php
                    }
                    ?>
                    <td><?php echo $mem['date']; ?></td>
                    <td><?php echo $mem['thistime']; ?> ถึง <?php echo $mem['time']; ?></td>
                    <td><?php echo $mem['description'];?></td>
                  </tr>
                 </tbody>
              
            </table>
           
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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

</body>

</html>
