<?php 
include '../config/header.php';
include '../config/connect.php';
include '../config/functions.php';
$id = $_GET['approve'];
$bookingdata = new DB_con();
if (isset($_POST['submit'])) {
    $disapprove = $_POST['disapprove'];
    $sql = $bookingdata->disapprove($id,$disapprove);
    if ($sql) {
        $sql1 = $bookingdata->disapprovestatus($id);
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
        title: "สำเร็จ!",
        text: "ยกเลิกการจองเรียบร้อย!",
        type: "success",
        icon: "success"
        });';
        echo '}, 500 );</script>';
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
        window.location.href = "/thebarber/";';
        echo '}, 3000 );</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
        title: "ผิดพลาด!",
        text: "กรุณาลองใหม่!",
        type: "warning",
        icon: "error"
        });';
        echo '}, 500 );</script>';
    }
    }
?> 

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
			
				
						
								
						
            <div id="testimonials" class="parallax section db -off" style="background-image:url('uploads/parallax_20.jpg');">
            
                <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <h3>ยกเลิกการจอง</h3>
                    </div><!-- end title -->
                    <?php
                    $inputDate = date('H:i');
                    $strCurrDate = strtotime($inputDate);
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" name="frmMain">
                    <div class="row">
                        <div class="col-md-12 col-md">
                            <div class="contact_form">
                            <font color="black">
                                            <p>หมายเหตุ</p>
                                            <input type="text" name="disapprove" id="disapprove" class="form-control" value="" placeholder="กรอกหมายเหตุ" required>
                                    </font>
                                   <button type="submit" id="submit" name="submit" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">ยกเลิกการจอง</button>
                                
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
                </form>
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
    <script src="../assets/js/all.js"></script>
	<script src="../assets/js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../assets/js/custom.js"></script>
    

    <!-- Menu Toggle Script -->
  

</body>
</html>
