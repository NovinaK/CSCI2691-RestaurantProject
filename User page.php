<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "restaurant_management_system"; // Replace with your database name

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords
    if ($password !== $confirm_password) {
        // Redirect back with an error message
        header("Location: index.php?error=Passwords do not match!");
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, user_email, user_password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_name, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back with a success message
        header("Location: home_page.html?success=User registered successfully!");
    } else {
        // Redirect back with an error message
        header("Location: sign_up.php?error=Error saving user: " . $stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
