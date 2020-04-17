<?php
session_start();
$gain = $_SESSION['gain'];
$energyMAH = $_SESSION['energyMAH'];
$ct = $_SESSION['cardtype'];
$cb = $_SESSION['cardbalance'];
$rd = $_SESSION['REGISTERED_DATE'];
$cn = $_SESSION['cardnumber'];
$vol = $_SESSION['vol'];
$current = $_SESSION['current'];
$dt= $_SESSION['duration_time'];
$_SESSION = array();
session_destroy();
$servername = "localhost";
$username = "root";
$password = "jefflin123";
$dbname1="rfid_arduino";
$dbname2 = "rfid_rpi";
$dt=$dt+1;
// Create connection
$conn = new mysqli($servername, $username, $password, "rfid_arduino");
$conn2 = new mysqli($servername, $username, $password, "rfid_arduino");
$conn1 = new mysqli($servername, $username, $password, "rfid_rpi");
$conn1 = new mysqli($servername, $username, $password, $dbname2);
// Check connection
if($current>0){
  if ($conn1->connect_error) {
      die("Connection failed: " . $conn1->connect_error);
  }

  $sql = 'UPDATE card_info SET duration_time=\'' . $dt . '\', current= \'' . $current . '\', voltage=\'' . $vol . '\',' . ' cardnumber=\'' . $cn . '\',  cardbalance=\'' . $cb . '\',  cardtype=\'' . $ct . '\',  REGISTERED_DATE=\'' . $rd . '\',  gain=\'' . $gain .  '\' WHERE cardnumber=\'' . $cn . '\'';

  if ($conn1->query($sql) === TRUE) {

  } else {
      echo "Error: " . $sql . "<br>" . $conn1->error;
  }

  $conn1->close();
}else{
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

$sql = 'UPDATE card_info SET voltage=\'' . $vol . '\',' . ' cardnumber=\'' . $cn . '\',  cardbalance=\'' . $cb . '\',  cardtype=\'' . $ct . '\',  REGISTERED_DATE=\'' . $rd . '\',  gain=\'' . $gain .  '\' WHERE cardnumber=\'' . $cn . '\'';

if ($conn1->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn1->error;
}

$conn1->close();
}

    ?>
