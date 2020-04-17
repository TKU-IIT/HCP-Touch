<?php
//$fp=fopen('result.txt','w');
//fwrite($fp,"hi");
//fclose($fp);
    // Connect to mysqli
    include("dbconnect.php");
$cardnumber = mysqli_real_escape_string($conn,$_GET['cardnumber']);
$current = mysqli_real_escape_string($conn,$_GET['current']);
$SENSORED_VALUE = mysqli_real_escape_string($conn,$_GET['SENSORED_VALUE']);
    // Prepare the SQL statement

    // Go to the review_data.php (optional)
    //header("Location: review_data.php");



    $query =  "INSERT INTO card (id, cardnumber, SENSORED_VALUE) VALUES (0, '$cardnumber', '$SENSORED_VALUE')";
     $query2 =  "INSERT INTO current (id, current) VALUES (0, '$current')";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    // Go to the review_data.php (optional)
    //header("Location: review_data.php");

if ($conn->query($query) === TRUE&&$conn->query($query2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
