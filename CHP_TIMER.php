<?php
$time = 0;
$time1= $time+1;
session_start();
$_SESSION['time'] = $time1+1;
echo $time;

?>
