<?php
require('database.php')

?>

<html>
    <head>
        <title>Events</title>
        <!-- <link rel="stylesheet" href="fullstack.css"> -->
        <style>
    /* Reset and basic styles */
body, html {
    background-color: #1e1e1e;
    color: #ffffff;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.gridlayout {
    display: grid;
    grid-template-rows: auto 1fr;
    min-height: 100vh;
}

.welcomeText, .title {
    text-align: center;
}

.container {
    padding: 20px;
}

form {
    max-width: 500px;
    margin: 300px auto; 
    padding: 20px;
    background-color: #333333;
    color: #ffffff;
    border-radius: 5px;
}

label {
    color: #ffffff;
    display: block;
    margin-bottom: 10px;
}

input[type="text"], input[type="number"], input[type="date"] {
    width: calc(100% - 40px);
    padding: 10px;
    margin-bottom: 10px;
    background-color: #555555;
    color: #ffffff;
    border: none;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #8a2be2; /* Purple-ish color */
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 5px;
    display: inline-block;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #6a1a9a; /* Darker hover color */
}

/* Specific styles for different sections/pages */

/* Additional specific styles can be added here as needed */

</style>
    </head>
    <body class="gridlayout">
        <h1 class="welcomeText">Please enter here your information.</h1>
        <h2 class="title">Cafe</h2>

        <form id="bndForm" action="eventPagephp.php" method="POST">
            <input id="bndInput" required type="text"  name="bndname" placeholder="Event name here">
            <input type="date" id="eventDate" required name="date">
            <input id="eventPrice" required type="number" name="amount" placeholder="€19,99">
            <input id="eventSubmit" type="submit" value="submit">
        </form>

        <a href="mainPage.php">Main Page</a>

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
