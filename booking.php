<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ambucare";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $patientName = $conn->real_escape_string($_POST['patient_name']);
    $phoneNumber = $conn->real_escape_string($_POST['phone_number']);
    $pickupLocation = $conn->real_escape_string($_POST['pickup_location']);
    $aadharPanNumber = $conn->real_escape_string($_POST['aadhar_number']);

    $sql = "INSERT INTO ambulance_bookings (patient_name, phone_number, pickup_location, aadhar_number)
    VALUES ('$patientName', '$phoneNumber', '$pickupLocation', '$aadharPanNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "Ambulance booked successfully.";
        header("Location: confirmation.php");
exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
