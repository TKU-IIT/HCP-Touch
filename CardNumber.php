<?php
ini_set('display_errors',1);
require_once("config.php");
$CardNumber = mysqli_real_escape_string($con,$_GET['CardNumber']);
$sql = "UPDATE CardInfo SET CardNumber = '$CardNumber' WHERE id =1";
$sql_query = mysqli_query($con,$sql);
if ($sql_query) {
    echo "Complete";
} else {
    echo "Error";
}
?>
