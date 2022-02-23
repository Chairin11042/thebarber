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
                            <form method="post">
                            <a class="btn btn-success btn-round"  href="add.php" role="button">
                                       เพิ่มรายการทรงผม</a>
                                <table class="table table-hover">
                                 
                                    <thead class="primary">
                           		  <th>ลำดับ</th>
                                    <th>ชื่อทรงผม</th>
                                        <th>ราคาทรงผม</th>
                                        <th>ระยะเวลาในการตัด</th>
                                        <th></th>
                                        <th></th>
                                       
                                        <th></th>
                                    </thead>
                                    <?php
                                    $products = new DB_con();
                                    $sql = $products->fetchbooking1();
                                    $i = 0;
                                    while($row = mysqli_fetch_array($sql)) 
                                    {   $i++;
                                       
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['s_name']; ?></td>
                                      <td><?php echo $row['s_price']; ?>บาท</td>
                                        <td><?php echo $row['s_time']; ?>นาที</td>
                                          <td><a class="btn btn-danger btn-round"  href="delete.php?Hname=<?php echo $row['s_name']; ?>" onclick="return confirm('คุณต้องการลบรายการนี้ ใช่หรือไม่ ?')" role="button">
                                        ลบรายการทรงผม</a></td>
                                         
                                       <td><a class="btn btn-success btn-round"  href="update.php?HairUp=<?php echo $row['s_name']; ?>" role="button">
                                       แก้ไขรายการทรงผม</a></td>
                                       
                                       
                                       
                                   
                                       

                                       
                                  </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <?php endif; ?>
                               
                                   
                                </table>
                                 </form>  
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
