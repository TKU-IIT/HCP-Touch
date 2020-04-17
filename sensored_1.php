<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<?php

$servername = "localhost";
$username = "root";
$password = "jefflin123";
$dbname1="rfid_arduino";
$dbname2 = "rfid_rpi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname1);
$conn1 = new mysqli($servername, $username, $password, "rfid_rpi");
$rowSQL = mysqli_query($conn, "SELECT MAX( id ) AS max FROM `card`;" );
$row = mysqli_fetch_array( $rowSQL );

$largestNumber = $row['max'];
//max
$rowSQL1 = mysqli_query($conn,"SELECT * FROM card WHERE id=" . $largestNumber . ";");
$row1 = mysqli_fetch_array( $rowSQL1 );
$cn = $row1['cardnumber'];
//cardnumber
$rowSQL2 = mysqli_query($conn1,"SELECT * FROM card_info WHERE cardnumber=". '"' . $cn . '"' . ";");
$row2= mysqli_fetch_array($rowSQL2);
$ct = $row2['cardtype'];
// $rowSQL2 = mysqli_query($conn1,"SELECT * FROM card_info WHERE cardnumber=" . $cn . ";")  or die(mysqli_error($conn1));
// $row2 = mysqli_fetch_array( $rowSQL2 );
//$ct = $row2['cardtype'];
// $cn1 = $row2['cardnumber'];
// echo $cn1;
echo $ct;
  if($ct=='ADCHP'){
echo '<script>window.location.replace("http://localhost/ADCHP-1.php");</script>';

}else{
	if($ct=='ELCHP'){
	echo '<script>window.location.replace("http://localhost/CHP.php");</script>';}else{
		if($ct=="CYCHP"){
echo '<script>window.location.replace("http://localhost/CHP.php");</script>';	
}else{	echo '<script>window.location.replace("http://localhost/UNKNOWN_CARD.php");</script>';
}
	}
}  

?>


<style type="text/css">

.abcd
 {
  width: 800px;
  height: 480px;
}

input[type="button"]
{

    display:block;
    border: none;
    outline:none;
}
input[type="submit"]
{

    display:block;
    border: none;
    outline:none;
}
input[type="text"]
{

    display:block;
    border: none;
    outline:none;
}
</style>

<div id="screen"></div>
