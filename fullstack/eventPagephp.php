<?php
require('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bndInput = mysqli_real_escape_string($conn, $_POST['bndname']);
    $eventDate = mysqli_real_escape_string($conn, $_POST['date']);
    $eventPrice = mysqli_real_escape_string($conn, $_POST['amount']);

    $bndQuery = "INSERT INTO events (naam, datum, prijs) VALUES ('$bndInput', '$eventDate', '$eventPrice')";

    if (mysqli_query($conn, $bndQuery)) {
        header("Location: eventPage.php?back");
        exit();
    }
}
?>