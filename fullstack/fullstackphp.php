<?php
header("location: fullstack.php?=back");
require('database.php');

echo '<div id="text">';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputText = mysqli_real_escape_string($conn, $_POST['name']);
    $inputGenre = mysqli_real_escape_string($conn, $_POST['genre']);

    $sql = "INSERT INTO bands (band, genre) VALUES ('$inputText', '$inputGenre');";

   echo "Band added succesfully";
    if (mysqli_query($conn, $sql)) {
        echo "Band added successfully";
    }
}

echo '</div>';
exit();
?>
