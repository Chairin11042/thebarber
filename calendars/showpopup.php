<?php
    include_once('../config/functions.php');
    include_once('../config/connect.php');
    $rid = $_GET['events'];

    $sql = "SELECT tblcarbooking.id,carname,carmodel,datestart,dateend,descs,tblcarbooking.status_id,product_img_name,fullname FROM tblcarbooking,products,tblusers where tblusers.id=tblcarbooking.cust_id and tblcarbooking.car_id=products.id and tblcarbooking.id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>ระบบจองรถสำนักงาน</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  
</head>

<body>
    
       <div class="container">
        <img class="img-fluid rounded shadow-lg" height="250" width="250" src="/thecar/assets/img/car/<?php echo $mem['product_img_name'];?>">
       </div>
        
        <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">เลขที่รายการ</th>
                    <th scope="col" class="sort" data-sort="budget">ชื่อ - สกุล</th>
                    <th scope="col" class="sort" data-sort="budget">วันที่เริ่มจอง</th>
                    <th scope="col" class="sort" data-sort="budget">วันที่สิ้นสุดการจอง</th>
                    <th scope="col" class="sort" data-sort="budget">หมายเหตุ</th>
                    <th scope="col" class="sort" data-sort="budget">สถานะการจอง</th>                   
                  </tr>
                  <tbody>
                    <td><?php echo $mem['id'];?></td>
                    <td><?php echo $mem['fullname'];?></td>
                    <td><?php echo $mem['datestart'];?></td>
                    <td><?php echo $mem['dateend'];?></td>
                    <td><?php echo $mem['descs'];?></td>
                    <?php if($mem['status_id']==0) : ?>
                    <td><span class="badge badge-secondary" style="background-color:gray;font-weight:"> รออนุมัติ</span></td>
                    <?php endif; ?>
                    <?php if($mem['status_id']==1) : ?>
                    <td><span class="badge badge-secondary" style="background-color:#8BFF00;font-weight:"> อนุมัติแล้ว</span></td>
                    <?php endif; ?>
                    <?php if($mem['status_id']==2) : ?>
                    <td><span class="badge badge-secondary" style="background-color:#FFF000;font-weight:"> ไม่อนุมัติ</span></td>
                    <?php endif; ?>
                    <?php if($mem['status_id']==3) : ?>
                    <td><span class="badge badge-secondary" style="background-color:#FF3BB8 ;font-weight:"> รับคืนแล้ว</span></td>
                    <?php endif; ?>
                  </tr>
                 </tbody>
              
            </table>
           
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</html>
