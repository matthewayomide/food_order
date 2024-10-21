<?php
// Start Session
session_start();


 //  Creat Constants to store Non Changing Values
define('SITEURL','http://localhost/food_order/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food_order');

 $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); // Database Connections
 $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());  // Selecting Database
 // $res = mysqli_query($conn, $sql)  or die(mysqli_error());

?>