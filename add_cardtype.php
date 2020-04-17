<?php


$cardnumber = mysqli_real_escape_string($conn,$_GET['cardnumber']);

$SENSORED_VALUE = mysqli_real_escape_string($conn,$_GET['SENSORED_VALUE']);
    // Prepare the SQL statement
    $query =  "INSERT INTO card (id, cardnumber, SENSORED_VALUE) VALUES (0, '$cardnumber', '$SENSORED_VALUE')";    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    // Go to the review_data.php (optional)
    //header("Location: review_data.php");
	
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>