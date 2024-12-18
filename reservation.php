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
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $requests = $_POST['requests'];

    $sql = "INSERT INTO reservation (name, email, phone, date, time, number_of_guests, special_requests)
            VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests', '$requests')";

    if ($conn->query($sql) === TRUE) {
       echo "<script>alert('Reservation successful!'); 
        window.location.href='home_page.html';</script>";
    } else {
        echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>
