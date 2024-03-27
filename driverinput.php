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

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $aadhar_number = $_POST['aadhar_number'];
    $license_number = $_POST['license_number'];
    $password = $_POST['password'];

   
    $sql = "INSERT INTO drivers (name, email, phone, address, aadhar_number, license_number, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $phone, $address, $aadhar_number, $license_number, $password);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
        header("Location: profiled.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();

}
?>
