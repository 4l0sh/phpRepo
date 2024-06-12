<?php 
$servername = "mysql";
$username = "root";
$password = "password";
$dbname = "fullstackDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $conn->select_db("ALIEXPRESS");


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
