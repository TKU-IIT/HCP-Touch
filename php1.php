<?php

$servernameA = "localhost";
$usernameA = "root";
$passwordA = "jefflin123";
$dbname1A="rfid_arduino";


// Create connection
$connA = new mysqli($servernameA, $usernameA, $passwordA, $dbname1A);
$rowSQLA = mysqli_query($connA, "SELECT MAX( id ) AS max FROM `card`;" );
$rowA = mysqli_fetch_array( $rowSQLA );

$largestNumberA = $rowA['max'];
//max
$rowSQL1A = mysqli_query($connA,"SELECT * FROM card WHERE id=" . $largestNumberA . ";");
$row1A = mysqli_fetch_array( $rowSQL1A );
$cn = $row1A['cardnumber'];


//echo "<font color='white' face='arial'size='6'>";
echo $cn;
//echo "</font>";
?>
