<?php
$servername = "mysql";
$username = "student";
$password = "veiligwachtwoord";


// $username = "root";
// $password = "password";
// meer rechtern


// Create connection
$conn = new mysqli($servername, $username, $password);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>