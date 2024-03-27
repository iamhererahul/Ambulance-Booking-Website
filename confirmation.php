<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details - AmbuCare</title>
    <link rel="stylesheet" href="#">
</head>
<style>

body::-webkit-scrollbar{
    display: none;
}
.top{
    background-color: white;
    color: #000;
}
.navbar {
    background-color: white;
     color: black;
    
    margin: auto;
  
}

.icon {
    width: 200px;
    float: left;
    height: 60px;
}

.logo {
    text-shadow: 0 0 5px black;
    color: black;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
    margin-top: 5px
}

.menu {
    width: 400px;
    float: right;
    height: 70px;
    color: black;
}

ul {
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li {
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;
}

ul li a {
    text-decoration: none;
    color: black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover {
    color: #00ccff;
}

body {
    font-family: 'Times New Roman';
    margin: 0;
    padding: 0;
}

.container {
    width: 600px; 
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

   

}

h2 {
    text-align: center;
}

.container p {
    margin-bottom: 10px;
    
}

.button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }
        .form-container{
            padding-top: 10%;
            

        }

</style>
<body>
<nav class="top">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">AmbuCare</h2>
                </div>
    
                <div class="menu">
                    <ul>
                       
                        <li><a href="scheme.html">SCHEME</a></li>
                        <li><a href="aboutus.html">ABOUT</a></li>
                        <li><a href="contactus.html">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </nav>


<section class="form-container">
    <div class="container">
        <h2>Booking Details</h2>
     <?php
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ambucare";
    
       
        $conn = new mysqli($servername, $username, $password, $dbname);
    
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
       
        $sql = "SELECT * FROM ambulance_bookings ORDER BY id DESC LIMIT 1"; 
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
     
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>Patient Name:</strong> " . $row["patient_name"] . "</p>";
                echo "<p><strong>Phone Number:</strong> " . $row["phone_number"] . "</p>";
                echo "<p><strong>Pick-up Location:</strong> " . $row["pickup_location"] . "</p>";
                echo "<p><strong>Aadhar Number:</strong> " . $row["aadhar_number"] . "</p>";
            }
        } else {
            echo "No booking found.";
        }
    
        $conn->close();
        ?> 
        <p>Your booking is completed. You will receive a confirmation call shortly.</p>
    
         <div class="button-container">
            <a href="home.html">Go back to Home</a>
         </div>
     </div>
</section>

</body>
</html>
