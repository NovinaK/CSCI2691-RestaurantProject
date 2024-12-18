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
    $order_type = $_POST['order_type'];

    $sql = "INSERT INTO `orders` (order_type) VALUES ('$order_type')";

    if ($conn->query($sql) === TRUE) { $order_ID = $conn->insert_id; if ($order_type == "Delivery") { header("Location: location.html"); } else { $total_amount = 100; // Example total amount, replace with actual calculation 
    echo "<div class='message success'>Order placed successfully! Order ID: $order_ID. Total Amount: $total_amount</div>"; } exit(); } else { echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>"; }}
?>
