<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Profile & Booking Details</title>
    <style>
        
        body {
            font-family: 'Times New Roman';
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
       
            height: 100vh;
        }
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            padding: 20px;
            padding-top: 90px;

        
            
        }
        .profile-container, .booking-container {
            
            background-color: black;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 10px;
            display: flex;
            justify-content: space-between;

        }
        .booking-container{
            display:flex;
            justify-content:right;
        }
        h2 {
            text-align: center;
        }
        .profile-image {
            text-align: center;
        }
        .profile-image img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            width: 100%;
            margin-top: 5px;
        }
        input[readonly] {
            background-color: #f4f4f4;
        }
        .booking-details p {
            margin-bottom: 10px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .accept-button {
            background-color: #007bff;
            color: #fff;
        }
        .reject-button {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body>
<h2>Driver Profile</h2>
    <div class="container">
       
        <div class="profile-image">
            <img src="images/default.jpg" alt="">
        </div>
        <div class="profile-details">
            <?php
           
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ambucare";

           
            $conn = new mysqli($servername, $username, $password, $dbname);

          
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

           
            $sql = "SELECT * FROM drivers ORDER BY id DESC LIMIT 1"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='form-group'>";
                    echo "<label for='name'>Name:</label>";
                    echo "<input type='text' id='name' name='name' value='" . $row["name"] . "' readonly>";
                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo "<label for='email'>Email:</label>";
                    echo "<input type='email' id='email' name='email' value='" . $row["email"] . "' readonly>";
                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo "<label for='phone'>Phone:</label>";
                    echo "<input type='text' id='phone' name='phone' value='" . $row["phone"] . "' readonly>";
                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo "<label for='address'>Address:</label>";
                    echo "<input type='text' id='address' name='address' value='" . $row["address"] . "' readonly>";
                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo "<label for='aadhar_number'>Aadhar Number:</label>";
                    echo "<input type='text' id='aadhar_number' name='aadhar_number' value='" . $row["aadhar_number"] . "' readonly>";
                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo "<label for='license_number'>License Number:</label>";
                    echo "<input type='text' id='license_number' name='license_number' value='" . $row["license_number"] . "' readonly>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
        <div class="booking-details-container">
        <h2>Booking Details</h2>
        <div class="booking-details">
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

                   
                    echo "<div class='button-container'>";
                    echo "<button class='accept-button' onclick='acceptBooking()'>Accept</button>";
                    echo "<button class='reject-button' onclick='rejectBooking()'>Reject</button>";
                    echo "</div>";
                }
            } else {
                echo "No booking found.";
            }

            $conn->close();
            ?>
        </div>
    </div>

    

    
    

    <script>
        function acceptBooking() {
          
            alert("Booking accepted!");
           
            window.location.href = "https://www.google.com/maps/search/hopitals+near+me/@18.5432461,73.8462893,13z/data=!3m1!4b1?entry=ttu";
        }

        function rejectBooking() {
         
            alert("Booking rejected!");
           
            document.querySelector('.booking-details').innerHTML = "<p>No booking found.</p>";
            
            document.querySelector('.button-container').style.display = "none";
        }


    </script>
</body>
</html>
