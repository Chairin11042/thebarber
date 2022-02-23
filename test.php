<?php

$date_time="2021-03-16 14:11:57";

function dateTime($date_time){
 
 //ใช้ function explode แยกข้อมูลวันที่ กับ เวลา
 $get_date_time = explode(' ',$date_time);
 
 //เรียกใช้ function changeDate สำหรับแสดงวันที่
 $date = changeDage($get_date_time['0']);
 
 //ใช้ funciton substr เพื่อ ตัด ข้อมูลที่เป็น วินาทีออกไปซะ
 $time = substr($get_date_time['1'],0,-3);
 
 return $date." เวลา ".$time;
}
//การเรียกใช้งาน Function
echo dateTime($date_time);
?>