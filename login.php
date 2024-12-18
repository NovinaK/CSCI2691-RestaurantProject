<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify the password
    if (password_verify($pass, $hashed_password)) {
        echo "<script>alert('Successfully logged in!'); 
        window.location.href='home_page.html';</script>";
    } else {
        echo "<script>alert('Invalid username or password. Please try again or sign up to enter.');
         window.location.href='login.html';</script>";
    }
}

$conn->close();
?>
