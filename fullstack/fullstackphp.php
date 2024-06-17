<?php
require('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputText = mysqli_real_escape_string($conn, $_POST['name']);
    $inputGenre = mysqli_real_escape_string($conn, $_POST['genre']);

    $sql = "INSERT INTO bands (band, genre) VALUES ('$inputText', '$inputGenre');";

    if (mysqli_query($conn, $sql)) {
        header("Location: fullstack.php?back");
        exit();

    } else {
        echo '<div id="text">Error adding band: ' . mysqli_error($conn) . '</div>';
    }
} else {
    echo '<div id="text">Invalid request method.</div>';
}


?>
