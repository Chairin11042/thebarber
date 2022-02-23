<?php 
error_reporting(0);
include 'config/header.php';
include 'config/connect.php';
include 'config/functions.php';
if($_GET["item"] != "")
{
$strSQL = "SELECT * FROM service where id = '".$_GET["item"]."' ";
$objQuery = $conn->query($strSQL);
$objResult2 = $objQuery ->fetch_assoc();
}
$sqlcat = "SELECT * FROM tblusers where role_id = 2 ";
$resultcat2 = $conn->query($sqlcat);
$bookingdata = new DB_con();
if (isset($_POST['submit'])) {
$cid = $_SESSION['id'];
$services = $_POST['services'];
$services2 = $_POST['services2'];
$tech = $_POST['tech'];
$dates = $_POST['dates'];
$enddate2 = $_POST['timess'];
$enddate3 = $_POST['txtNumberC'];
$services_time = $_POST['txtNumberC'];

$inputDate = $enddate2;
$strCurrDate = strtotime($inputDate);
$enddate = date("H:i", mktime(date("H",$strCurrDate)+0, date("i",$strCurrDate)+$enddate3, date("s",$strCurrDate)+0, date("m",$strCurrDate)+0  , date("d",$strCurrDate)+0, date("Y",$strCurrDate)+0));



$description = $_POST['description'];

$sql22 = "SELECT * FROM `booking` WHERE techid=$tech and TIME(time) BETWEEN TIME('$enddate2') and TIME('$enddate') and date='$dates'";
$result2 = $conn->query($sql22);
$row2 = $result2 ->fetch_assoc();
$rowcount=mysqli_num_rows($result2);

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


$sql = $bookingdata->booking($cid,$services,$services2, $tech, $dates,$enddate2,$enddate,$services_time,$description);
if ($sql) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire({
    title: "สำเร็จ!",
    text: "จองคิวเรียบร้อย!",
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

}
?> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script language="JavaScript">
	function resutName(CusID)
	{
		switch(CusID)
		{
			<?php
			$strSQL = "SELECT * FROM service";
            $objQuery = $conn->query($strSQL);
            while($objResult = mysqli_fetch_assoc($objQuery))
			{
			?>
				case "<?php echo $objResult["id"];?>":
				frmMain.txtName.value = "<?php echo $objResult["s_time"];?>";
				break;
               
			<?php
			}
			?>
			default:
			 frmMain.txtName.value = "";
		}
	}
    function resutName2(CusID2)
	{
		switch(CusID2)
		{
			<?php
			$strSQL2 = "SELECT * FROM service";
            $objQuery2 = $conn->query($strSQL2);
            while($objResult2 = mysqli_fetch_assoc($objQuery2))
			{
			?>
				case "<?php echo $objResult2["id"];?>":
				frmMain.txtName2.value = "<?php echo $objResult2["s_time"];?>";
				break;
			<?php
			}
			?>
			default:
			 frmMain.txtName2.value = "";
		}
	}
    function resutName3(CusID3)
	{
		switch(CusID3)
		{
			<?php
			$strSQL = "SELECT * FROM service";
            $objQuery = $conn->query($strSQL);
            while($objResult = mysqli_fetch_assoc($objQuery))
			{
			?>
                case "<?php echo $objResult["id"];?>":
				frmMain.txtPrice.value = "<?php echo $objResult["s_price"];?>";
				break;
			<?php
			}
			?>
			default:
			 frmMain.txtPrice.value = "";
		}
	}
    function resutName4(CusID4)
	{
		switch(CusID4)
		{
			<?php
			$strSQL = "SELECT * FROM service";
            $objQuery = $conn->query($strSQL);
            while($objResult = mysqli_fetch_assoc($objQuery))
			{
			?>
                case "<?php echo $objResult["id"];?>":
				frmMain.txtPrice2.value = "<?php echo $objResult["s_price"];?>";
				break;
			<?php
			}
			?>
			default:
			 frmMain.txtPrice2.value = "";
		}
	}
    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#txtDate').attr('min', minDate);
});
</script>

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
                        <div class="col-md-8 col-md-offset-2">
                            <div class="contact_form">
                                <div id="message"></div>
                                <form action="" method="post" enctype="multipart/form-data" name="frmMain">
                                <div id="price">
                                <font color="black">
                                    <fieldset class="row-fluid">
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <p>ชื่อ - นามสกุล</p>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['fname']; ?>" placeholder="First Name" readonly>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <p>อีเมล</p>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" placeholder="Your Email" readonly>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                            <p>เบอร์ติดต่อ</p>
                                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $_SESSION['tel']; ?>" placeholder="Your Phone" readonly>
                                        </div>
                                        
                                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                            <label class="sr-only">Select Time</label>
                                            <select name="services" id="services" class=" form-control" name="lmName1" OnChange="resutName(this.value);resutName3(this.value);">
                                                <?php
                                                $strSQL = "SELECT * FROM service";
                                                $objQuery = $conn->query($strSQL);
                                                while($objResult = mysqli_fetch_assoc($objQuery))
                                                {
                                                ?>
                                                <option value="<?php echo $objResult["id"];?>"><?php echo $objResult["s_name"];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <input type="text" class="form-control" style="display: none;" id="txtName" name="txtName" value="0"> 
                                            <input type="text" class="form-control" style="display: none;" id="txtPrice" name="txtPrice" value="0"> 
                                        </div>
                                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                            <label class="sr-only">Select Time</label>
                                            <select name="services2" id="services2" class="form-control" name="lmName2" OnChange="resutName2(this.value);resutName4(this.value);">
                                                <?php
                                                $strSQL2 = "SELECT * FROM service";
                                                $objQuery2 = $conn->query($strSQL2);
                                                while($objResult2 = mysqli_fetch_assoc($objQuery2))
                                                {
                                                ?>
                                                <option value="<?php echo $objResult2["id"];?>"><?php echo $objResult2["s_name"];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <input type="text" class="form-control" style="display: none;" id="txtName2" name="txtName2" value="0">
                                            <input type="text" class="form-control" style="display: none;" id="txtPrice2" name="txtPrice2" value="0">
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                        <input type="checkbox" name="stOne" id="stOne" value="1" onClick="toggleSelect()"/> 
                                            <p>เลือก 2 บริการ </p>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="sr-only">Select Time</label>
                                            <select name="tech" id="tech" class="form-control" data-style="btn-white" required>
                                            <option value="">เลือกชาง</option>
                                            <?php while($resultcat = mysqli_fetch_assoc($resultcat2)): ?>
                                                <option value="<?=$resultcat['id']?>"><?=$resultcat['fullname']?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="sr-only">เลือกวัน</label>
                                            <input type="date" name="dates" id="txtDate" class="selectpicker form-control" placeholder="Your Phone" required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="sr-only">เลือกเวลา</label>
                                            <input type="text" id="time" placeholder="เลือกเวลา" name="timess" class="timepicker form-control" required>
                                        </div>
                                       
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                            <p>เวลาในการบริการ</p>
                                            <input type="number" id="txtTotaldate" class="form-control" name="txtNumberC" value="" readonly>
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                            <p>ราคาในการบริการ</p>
                                            <input type="number" id="txtTotalPrice" class="form-control" name="txtprice" value="" readonly>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p>หมายเหตุ</p>
                                            <input type="text" name="description" id="description" class="form-control" value="" placeholder="กรอกหมายเหตุ" >
                                        </div>
                                       
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="submit" id="submit" name="submit" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">จองคิว</button>
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
