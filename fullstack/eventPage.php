<?php
require('database.php')

?>

<html>
    <head>
        <title>Events</title>
        <link rel="stylesheet" href="fullstack.css">
    </head>
    <body class="gridlayout">
        <h1 class="welcomeText">Please enter here your information.</h1>
        <h2 class="title">Cafe</h2>

        <form id="bndForm" action="eventPagephp.php" method="POST">
            <input id="bndInput" required type="text"  name="bndname" placeholder="Band name here">
            <input type="date" id="eventDate" required name="date">
            <input id="eventPrice" required type="number" name="amount" placeholder="€19,99">
            <input id="eventSubmit" type="submit" value="submit">
        </form>

    </body>
</html>


<?php

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $bndInput = mysqli_real_escape_string($conn, $_POST['bndname']);
//     $eventDate = mysqli_real_escape_string($conn, $_POST['date']);
//     $eventPrice = mysqli_real_escape_string($conn, $_POST['amount']);

//     $bndQuery = "INSERT INTO events (naam, datum, prijs) VALUES ('$bndInput', '$eventDate', '$eventPrice')";

//     if(mysqli_query($conn,$bndQuery)){
//         header("Location: eventPage.php?back");
//         exit();
//     }
// }
?>
