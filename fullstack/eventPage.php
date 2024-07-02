<?php
require('database.php')

?>

<html>
    <head>
        <title>Events</title>
        <!-- <link rel="stylesheet" href="fullstack.css"> -->
        <style>
            /* Add some modern styling to make the page look decent */
            body {
                font-family: Open Sans, sans-serif;
                background-image: linear-gradient(to bottom, #808080, #333);
                background-repeat: no-repeat;
                height: 100vh;
                margin: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }
           .container {
                max-width: 400px;
                margin: 40px auto;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ddd;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }
           .welcomeText {
                font-size: 24px;
                font-weight: bold;
                color: #333;
                margin-bottom: 20px;
            }
           .title {
                font-size: 18px;
                font-weight: bold;
                color: #666;
                margin-bottom: 10px;
            }
            #bndForm {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            #bndForm input[type="text"], #bndForm input[type="date"], #bndForm input[type="number"] {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 100%;
                font-size: 16px;
            }
            #bndForm input[type="submit"] {
                background-color: #4CAF50;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            #bndForm input[type="submit"]:hover {
                background-color: #3e8e41;
            }
        </style>
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
