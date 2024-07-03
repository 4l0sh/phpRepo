<?php
session_start();
require('database.php');
$conn->select_db("fullstackDB");

// Query to fetch events
$query = "SELECT * FROM events";
$result = $conn->query($query);

$events = "";
while ($row = $result->fetch_assoc()) {
    $events .= "<option value='{$row['idevents']}'>{$row['naam']}</option>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    margin: 0 auto;
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
<body class="gridLayout">
    <header>
        <h1>CAFE</h1>
        <a href="loginPage.php"><button>login</button></a>
    </header>
    <div class="container">
        <h3>Our events</h3>
        <form id="eventForm">
            <div>
                <label for="menu">Events</label>
                <select name="events" id="menu">
                    <?php echo $events; ?>
                </select>
            </div>
            <button type="button" id="showBandsBtn">Show Bands</button>
        </form>
        <div id="bandList"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#showBandsBtn').click(function() {
                var selectedEventId = $('#menu').val();
                $.ajax({
                    url: 'mainPagephp.php',
                    type: 'POST',
                    data: { eventId: selectedEventId },
                    success: function(response) {
                        $('#bandList').html(response);
                    },
                    error: function() {
                        alert('Error retrieving bands.');
                    }
                });
            });
        });
    </script>
</body>
</html>

