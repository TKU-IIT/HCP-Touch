<?php


$servername = "localhost";
$username = "root";
$password = "jefflin123";

$dbname = "rfid_arduino";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);



function getRedirectUrl ($url) {
    stream_context_set_default(array(
        'http' => array(
            'method' => 'HEAD'
        )
    ));
    $headers = get_headers($url, 1);
    if ($headers !== false && isset($headers['Location'])) {
        return $headers['Location'];
    }
    return false;
}
$rowSQL = mysqli_query($conn, "SELECT MAX( id ) AS max FROM `card`;" );
$row = mysqli_fetch_array( $rowSQL );

$largestNumber = $row['max'];
$rowSQL1 = mysqli_query($conn,"SELECT * FROM card WHERE id=" . $largestNumber . ";");
$row1 = mysqli_fetch_array( $rowSQL1 );
$sv = $row1['SENSORED_VALUE'];
$a=0;
$b=1;
if($sv==$b){
	

	//echo '<body background="CHP-EL.bmp">';

echo '<script>window.location.replace("http://localhost/sensored_1.php");</script>';
	//echo "false";
}

?>