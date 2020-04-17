<?php
$host = "localhost";    
$user = "root";    
$pass = "jefflin123";    
$db = "choihong";    
$con=mysqli_connect($host, $user, $pass) or die("Could not connect to database"); 
mysqli_select_db($con,$db) or die("Could not connect to database"); 
mysqli_query($con,"SET NAMES utf8")
?>
