
<?php

$servername = "localhost";
$username = "root";
$password = "jefflin123";

$dbname = "rfid_arduino";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername, $username, $password, $dbname);

?>
<?php
$rowSQL = mysqli_query($conn, "SELECT MAX( id ) AS max FROM `card`;" );
$row = mysqli_fetch_array( $rowSQL );

$largestNumber = $row['max'];
$rowSQL1 = mysqli_query($conn1,"SELECT * FROM card WHERE id=" . $largestNumber . ";");
$row1 = mysqli_fetch_array( $rowSQL1 );
$sv = $row1['SENSORED_VALUE'];
$a=0;
$b=1;
if($sv==$a){echo "true";}if($sv==$b){
header("Location: http://localhost/sensored_1.php"); /* Redirect browser */
exit();

	echo "false";
}

?>
