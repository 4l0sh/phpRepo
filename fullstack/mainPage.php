<?php
session_start();
require('database.php');
$conn->select_db("fullstackDB");


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
    <link rel="stylesheet" href="fullstack.css">
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
        $(document).ready(function () {
            $('#showBandsBtn').click(function () {
                var selectedEventId = $('#menu').val();
                $.ajax({
                    url: 'mainPagephp.php',
                    type: 'POST',
                    data: { eventId: selectedEventId },
                    success: function (response) {
                        $('#bandList').html(response);
                    },
                    error: function () {
                        alert('Error retrieving bands.');
                    }
                });
            });
        });
    </script>
</body>

</html>