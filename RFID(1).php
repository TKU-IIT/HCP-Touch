<?php
ini_set('display_errors',1);
require_once("config.php");
$CardBalance = mysqli_real_escape_string($con,$_GET['CardBalance']);
$CardType = mysqli_real_escape_string($con,$_GET['CardType']);
$CardNumber = mysqli_real_escape_string($con,$_GET['CardNumber']);
$sql = "INSERT INTO CardInfo (id ,CardNumber, CardBalance, CardType) VALUES (0,'$CardNumber','$CardBalance','$CardType')";
$sql_query = mysqli_query($con,$sql);
if ($sql_query) {
    echo "Complete";
} else {
    echo "Error";
}
?>
