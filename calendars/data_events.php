<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    
include_once('../config/connect.php');

    $q="SELECT booking.id as bid ,date , time ,services_time,  custid , thistime FROM booking where status_id=1 ";  
    $result = $conn->query($q);
    while($rs=$result->fetch_object())
    {         
        $json_data[]=array(  
            "id"=>$rs->bid,
            "title"=>$rs->thistime." ถึง ".$rs->time,
            "start"=>$rs->date,
            "url"=>"popup_model.php?events=".$rs->bid,
            "allDay"=>$rs->custid      
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );    
    }  

$json= json_encode($json_data);  
if(isset($_GET['callback']) && $_GET['callback']!=""){  
echo $_GET['callback']."(".$json.");";      
}else{  
echo $json;  
}  
?>