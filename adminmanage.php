<?php 
error_reporting(0);
include 'config/header.php';
include 'config/connect.php';
include 'config/functions.php';

?> 

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
			
				
						
								
						
            <div id="testimonials" class="parallax section db -off" style="background-image:url('uploads/parallax_20.jpg');">
            
                <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <h3>ยินดีต้อนรับสู่บริการจองคิวออนไลน์</h3>
                        <hr class="grd1">
                        <h4>เลือกข้อมูลและตรวจสอบให้ครบถ้วนก่อนทำการจองนะครับ.</h4>
                        </div>
                    </div><!-- end title -->
                    <?php
                    $inputDate = date('H:i');
                    $strCurrDate = strtotime($inputDate);
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-md">
                            <div class="contact_form">
                            <font color="black">
                            <?php if($role_id!=0) : ?>
                                <table class="table table-hover">
                                    <thead class="primary">
                                        <th>ลำดับ</th>
                                        <th>ชื่อลูกค้า</th>
                                        <th>บริการ</th>
                                        <th>บริการ (ต่อ)</th>
                                        <th>ช่างผู้รับงาน</th>
                                        <th>วันที่ </th>
                                        <th>เวลา</th>
                                        <th>หมายเหตุ</th>
                                        <th>หมายเหตุ (ยกเลิก)</th>
                                        <th></th>
                                    </thead>
                                    <?php
                                    $products = new DB_con();
                                    $sql = $products->fetchbooking();
                                    $i = 0;
                                    while($row = mysqli_fetch_array($sql)) 
                                    {   $i++;
                                        $inputDate = $row['time'];
                                        $strCurrDate = strtotime($inputDate);
                                        $enddate = date("H:i", mktime(
                                        date("H",$strCurrDate)+0, 
                                        date("i",$strCurrDate)-$row['s_time'], 
                                        date("s",$strCurrDate)+0, 
                                        date("m",$strCurrDate)+0  , 
                                        date("d",$strCurrDate)+0, 
                                        date("Y",$strCurrDate)+0));
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>คุณ <?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['s_name']; ?></td>
                                        <?php
                                        $strSQL2 = "SELECT * FROM service";
                                        $objQuery2 = $conn->query($strSQL2);
                                        while($objResult2 = mysqli_fetch_assoc($objQuery2))
                                        {
                                        ?>
                                        <?php if($objResult2['id']==$row['services2']) : ?>
                                        <td><?php echo $objResult2['s_name']; ?></td>
                                        <?php endif; ?>
                                        <?php
                                        }
                                        ?>
                                        <?php if($row['services2']==0) : ?>
                                        <td>ไม่มีบริการ</td>
                                        <?php endif; ?>
                                        <?php
                                        $strSQL = "SELECT * FROM tblusers where role_id=2";
                                        $objQuery = $conn->query($strSQL);
                                        while($objResult = mysqli_fetch_assoc($objQuery))
                                        {
                                        ?>
                                        <?php if($objResult['id']==$row['techid']) : ?>
                                        <td><?php echo  $objResult['fullname']?></td>
                                        <?php endif; ?>
                                        <?php
                                        }
                                        ?>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['thistime']; ?> ถึง <?php echo $row['time']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <?php if($row['disapprove']!="") : ?>
                                        <td><?php echo $row['disapprove']; ?></td>
                                        <?php endif; ?>
                                        <?php if($row['disapprove']=="") : ?>
                                        <td>-</td>
                                        <?php endif; ?>
                                        <td>

                                        <?php if($row['status_id']==0) : ?>
                                        <a class="btn btn-success btn-round"  href="config/approve.php?approve=<?php echo $row['bid']; ?>" role="button">
                                        อนุมัติ</a>
                                        <?php endif; ?>

                                        <?php if($row['status_id']==0) : ?>
                                        <a class="btn btn-warning btn-round"  href="config/disapproval.php?approve=<?php echo $row['bid']; ?>" role="button">
                                        ไม่อนุมัติ</a>
                                        <?php endif; ?>
                                        <?php if($row['status_id']!=0) : ?>
                                        <?php if($row['status_id']!=2) : ?>
                                        <?php if($row['status_id']!=3) : ?>
                                        <a class="btn btn-danger btn-round"  href="config/closework.php?approve=<?php echo $row['bid']; ?>" role="button">
                                        ปิดงาน</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                            <?php if($row['disapprove']=="") : ?>
                                        <td>-</td>
                                        <td><a class="btn btn-danger btn-round"  href="config/bill.php?approve=<?php echo $row['bid']; ?>" role="button">
                                        ใบเสร็จ</a></td>
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <?php endif; ?>
                                <?php if($role_id==0) : ?>
                                <table class="table table-hover">
                                    <thead class="primary">
                                        <th>ลำดับ</th>
                                        <th>ชื่อลูกค้า</th>
                                        <th>บริการ</th>
                                        <th>บริการ (ต่อ)</th>
                                        <th>ช่างผู้รับงาน</th>
                                        <th>วันที่ </th>
                                        <th>เวลา</th>
                                        <th>หมายเหตุการจอง</th>
                                        <th>หมายเหตุ (ไม่อนุมัติ)</th>
                                        <th></th>
                                    </thead>
                                    <?php
                                    $products = new DB_con();
                                    $uid=$_SESSION['id'];
                                    $sql = $products->fetchbooking_user($uid);
                                    $i = 0;
                                    while($row = mysqli_fetch_array($sql)) 
                                    {   $i++;
                                        $inputDate = $row['time'];
                                        $strCurrDate = strtotime($inputDate);
                                        $enddate = date("H:i", mktime(
                                        date("H",$strCurrDate)+0, 
                                        date("i",$strCurrDate)-$row['s_time'], 
                                        date("s",$strCurrDate)+0, 
                                        date("m",$strCurrDate)+0  , 
                                        date("d",$strCurrDate)+0, 
                                        date("Y",$strCurrDate)+0));
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>คุณ <?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['s_name']; ?></td>
                                        <?php
                                        $strSQL2 = "SELECT * FROM service";
                                        $objQuery2 = $conn->query($strSQL2);
                                        while($objResult2 = mysqli_fetch_assoc($objQuery2))
                                        {
                                        ?>
                                        <?php if($objResult2['id']==$row['services2']) : ?>
                                        <td><?php echo $objResult2['s_name']; ?></td>
                                        <?php endif; ?>
                                        <?php
                                        }
                                        ?>
                                        <?php if($row['services2']==0) : ?>
                                        <td>ไม่มีบริการ</td>
                                        <?php endif; ?>
                                        <?php
                                        $strSQL = "SELECT * FROM tblusers where role_id=2";
                                        $objQuery = $conn->query($strSQL);
                                        while($objResult = mysqli_fetch_assoc($objQuery))
                                        {
                                        ?>
                                        <?php if($objResult['id']==$row['techid']) : ?>
                                        <td><?php echo  $objResult['fullname']?></td>
                                        <?php endif; ?>
                                        <?php
                                        }
                                        ?>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $enddate; ?> ถึง <?php echo $row['time']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <?php if($row['disapprove']!="") : ?>
                                        <td><?php echo $row['disapprove']; ?></td>
                                        <?php endif; ?>
                                        <?php if($row['disapprove']=="") : ?>
                                        <td>-</td>
                                        <td><a class="btn btn-danger btn-round"  href="config/bill.php?approve=<?php echo $row['bid']; ?>" role="button">
                                        ใบเสร็จ</a></td>
                                        <?php endif; ?>
                                         <?php if($row['status_id']=="0") : ?>
                                        <td>-</td>
                                        <td><a class="btn btn-danger btn-round"  href="config/canclebooking.php?approve=<?php echo $row['bid']; ?>" role="button">
                                        ยกเลิกการจอง</a></td>
                                        <?php endif; ?>
                                         <?php if($row['status_id']=="1") : ?>
                                        <td>-</td>
                                        <td><a class="btn btn-success btn-round"  href="#" role="button">
                                        อนุมัติรายการแล้ว</a></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <?php endif; ?>
                                    </font>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis4">

                </div><!-- end container -->
            </div><!-- end section -->
        </div>
    </div><!-- end wrapper -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
    <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <script type="text/javascript">
    
        var timepicker = new TimePicker('time', {
        lang: 'en',
        theme: 'dark'
        });
        timepicker.on('change', function(evt) {
        
        var value = (evt.hour || '00') + ':' + (evt.minute || '00');
        evt.element.value = value;
            
        });
    </script>
    <!-- ALL JS FILES -->
    <script src="assets/js/all.js"></script>
	<script src="assets/js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="assets/js/custom.js"></script>
    

    <!-- Menu Toggle Script -->
  

</body>
</html>
