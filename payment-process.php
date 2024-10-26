<?php
session_start(); // Start the session

$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "ansonepal"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare variables
$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

$target_file = $target_dir . basename($_FILES["transaction-statement"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check file size (up to 3 MB)
if ($_FILES["transaction-statement"]["size"] > 3000000) {
    die("Sorry, your file is too large.");
}

// Allow certain file formats
$allowed_file_types = ["jpg", "jpeg", "png", "pdf"];
if (!in_array($imageFileType, $allowed_file_types)) {
    die("Sorry, only JPG, JPEG, PNG & PDF files are allowed.");
}

if (move_uploaded_file($_FILES["transaction-statement"]["tmp_name"], $target_file)) {
    // Database connection and path storage
    $stmt = $conn->prepare("INSERT INTO images (name, phone, image_path) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $name, $phone, $target_file);
        if ($stmt->execute()) {
            // Set session variable after successful upload
            $_SESSION['order_placed'] = true;

            // Redirect to index.php
            header("Location: index.php");
            exit(); // Make sure to call exit after the redirect
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Close the connection
$conn->close();
?>
