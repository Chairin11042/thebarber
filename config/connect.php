<?php
//ส่งค่าไปที่ function
$host='localhost';
$user='root';
$password='';
$dbname='thebarber';

$info = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'dbname' => 'thebarber'
);
$conn = mysqli_connect($info['host'], $info['user'], $info['password'], $info['dbname']) or die('Error connection database!');
mysqli_set_charset($conn, 'utf8');