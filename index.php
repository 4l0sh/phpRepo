<?php
$servername = "mysql";
$username = "root";
$password = "password";
$dbname = "DB";

// meer rechtern

// $username = "student";
// $password = "veiligwachtwoord";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// $conn->select_db("ALIEXPRESS");


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "the bluetooth device is   Connected Succesfully";


// $alawi = array('leeftijd' => 19, 'naam' => "Ali" );

// echo $alawi['leeftijd'];


// // $students = select * from student where studentnr = 1111;
// // echo $students;

// $cars = array (
//   array("Volvo"=>200),
//   array("BMW"=>150),
//   array("Saab"=>500),
//   array("Land Rover" =>170)
// );
// foreach($cars as $car) {
//   foreach($car as $make => $quantity) {
//     echo  "<br>".  $make . ": " . $quantity;
//   }

  // $sql = "select * from student;";
// }

// include 'index.php';

// echo $_POST['name'];

// $sql = "select * from student;";
// $result = mysqli_query($conn, $sql);
// $resultcheck = mysqli_num_rows($result);

// if($resultcheck > 0) {
//   while($row = mysqli_fetch_assoc($result)) {
//     echo $row['achternaam' ] . "<br>";
//   }
// }



?>