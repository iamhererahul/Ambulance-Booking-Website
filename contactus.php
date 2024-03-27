<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ambucare"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $stmt->execute();


    $stmt->close();


    $conn->close();

    echo "Message sent successfully!";
}
?>
