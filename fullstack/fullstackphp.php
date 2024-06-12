<?php
header("location: fullstack.php?=back");
require('database.php');

$inputText = $_POST['name'];
$inputGenre = $_POST['genre'];

$sql = "INSERT INTO bands (band, genre) VALUES ('$inputText', '$inputGenre');";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);


echo '<div id="text">';
if($resultcheck > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       echo "band added succesfully";
    }
 }
 echo '</div>';

exit();
?>