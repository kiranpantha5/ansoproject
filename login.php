<?php
session_start(); // Start a session to store login state
if (isset($_COOKIE['username'])) {
    // Optionally, verify the username in the database here
    $_SESSION['username'] = $_COOKIE['username'];
    header("Location: product.html"); // Redirect to product page
    exit();
}
// After successful login
if ($login_successful) {
    $_SESSION['username'] = $username; // Store username in session
    header("Location: product.html"); // Redirect to the product page
    exit();
}

$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "ansonepal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => "Connection failed: " . $conn->connect_error]));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); // Get the plain text password

    // Prepare and bind for login
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists, now verify the password
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Password is correct, login successful
            $_SESSION['username'] = $username; // Store username in session
            
            // Set cookie for 100 days
            $cookie_name = "username";
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + (100 * 24 * 60 * 60), "/"); // 100 days

            echo json_encode(['success' => true, 'message' => "Login successful!"]);
            exit();
        } else {
            // Password is incorrect
            echo json_encode(['success' => false, 'message' => "Invalid username or password!"]);
            exit();
        }
    } else {
        // Username does not exist
        echo json_encode(['success' => false, 'message' => "Invalid username or password!"]);
        exit();
    }

    $stmt->close(); // Close the statement
}
$conn->close(); // Close the connection
?>
