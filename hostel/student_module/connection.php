

<?php
$servername = "localhost";
$username = "IITGADMIN";
$password = "Admin@123";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo "Connected Unsuccessfully";
}
?>