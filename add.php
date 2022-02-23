<?php 
error_reporting(0);
include 'config/header.php';
include 'config/connect.php';
include 'config/functions.php';

$bookingdata = new DB_con();
if (isset($_POST['submit'])) {
$nameH = $_POST['nameH'];
$priceH = $_POST['priceH'];
$timeH = $_POST['timeH'];

if($rowcount>0)

{

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire({
    title: "มีการจองคิวอยู่แล้ว!",
    text: "กรุณาลองใหม่!",
    type: "warning",
    icon: "error"
    });';
    echo '}, 500 );</script>';

}

else{


$sql = $bookingdata->add11($nameH,$priceH,$timeH);
if ($sql) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire({
    title: "สำเร็จ!",
    text: "เพิ่มเรียบร้อย!",
    type: "success",
    icon: "success"
    });';
    echo '}, 500 );</script>';
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { 
    window.location.href = "/thebarber/priceH.php";';
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

}
?> 
}






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
                .
                .
                .
                <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="contact_form">
                                <div id="message"></div>
                                <form action="" method="post" enctype="multipart/form-data" name="frmMain">
                                <div id="price">
                                <font color="black">
                                    <fieldset class="row-fluid">
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <p>ชื่อทรงผม</p>
                                            <input type="text" name="nameH" id="nameH" class="form-control" value="" placeholder="กรุณากรอกชื่อทรงผม" >
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <p>ราคาทรงผม</p>
                                            <input type="text" name="priceH" id="priceH" class="form-control" value="" placeholder="กรุณากรอกราคา">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <p>เวลาในการตัด/นาที</p>
                                            <input type="text" name="timeH" id="timeH" class="form-control" value="" placeholder="กรุณาใส่เวลาในการตัด">
                                        </div>
                                        
                                       
                                       
                                       
                                      
                                 
                                       
                                       
                                       
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="submit" id="submit" name="submit" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">เพิ่มข้อมูล</button>
                                        </div>
                                    </fieldset>
                                    </font>
                                    </div>
                                </form>
                           
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis4">

                </div><!-- end container -->
            </div><!-- end section -->
        </div>
    </div><!-- end wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
	$(document).ready(function(){
    	$('#price').on('change','select',function(){
        	var total=0;
        	$( "select option:selected" ).each(function() {
              	total=parseInt($("#txtName").val()) + parseInt($("#txtName2").val());
            });
            $('#txtTotaldate').val(total);
        });
    });

    $(document).ready(function(){
    	$('#price').on('change','select',function(){
        	var total=0;
        	$( "select option:selected" ).each(function() {
              	total=parseInt($("#txtPrice").val()) + parseInt($("#txtPrice2").val());
            });
            $('#txtTotalPrice').val(total);
        });
    });
</script>
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

        window.onload = toggleSelect(); // to disable select on load if needed

        function toggleSelect()
        {
        var isChecked = document.getElementById("stOne").checked;
        document.getElementById("services2").disabled = !isChecked;
        }
    </script>
    
    <!-- ALL JS FILES -->
    <script src="assets/js/all.js"></script>
	<script src="assets/js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="assets/js/custom.js"></script>
    

    <!-- Menu Toggle Script -->
    <script src="assets/js/all.js"></script>
	<script src="assets/js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="assets/js/custom.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    (function($) {
        "use strict";
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        smoothScroll.init({
            selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
            selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
            speed: 500, // Integer. How fast to complete the scroll in milliseconds
            easing: 'easeInOutCubic', // Easing pattern to use
            offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
            callback: function ( anchor, toggle ) {} // Function to run after scrolling
        });
    })(jQuery);
    </script>

</body>
</html>
