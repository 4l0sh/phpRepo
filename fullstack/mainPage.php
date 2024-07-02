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

<style>
body {
    font-family: 'Open Sans', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.gridLayout {
    display: grid;
    grid-template-rows: 100px 1fr;
    height: 100vh;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

header button {
    background-color: #444;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

header button:hover {
    background-color: #555;
}

.container {
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h3 {
    margin-top: 0;
    font-size: 18px;
}

#eventForm {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

#eventForm label {
    margin-bottom: 10px;
    font-size: 16px;
}

#eventForm select {
    padding: 10px;
    font-size: 16px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#showBandsBtn {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

#showBandsBtn:hover {
    background-color: #3e8e41;
}

#bandList {
    margin-top: 20px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>