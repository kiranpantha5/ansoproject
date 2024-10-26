<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ansonepal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$city = $_POST['city'];
$postal_code = $_POST['postal-code'];
$phone = $_POST['phone'];
$payment_method = $_POST['payment'];

// Insert data into `order` table
$sql = "INSERT INTO `order` (fullname, address, city, postal_code, phone, payment_method)
        VALUES ('$fullname', '$address', '$city', '$postal_code', '$phone', '$payment_method')";

if ($conn->query($sql) === TRUE) {
    // Redirect to paymethod.html if successful
    header("Location: paymethod.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
