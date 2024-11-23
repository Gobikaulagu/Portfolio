<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pcontact";

// Create connection
$conn = new mysqli("localhost", "root", "", "pcontact");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
  
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_form (name, email, message)
            VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page after successful submission
        header("Location: index.html");
        exit();
    } else {
        // Handle errors if submission fails
        $response = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>





