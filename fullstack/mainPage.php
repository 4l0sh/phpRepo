<?php
require('database.php');
$conn->select_db("fullstackDB");

// Query to fetch events and associated bands
$query = "SELECT * FROM events INNER JOIN bands ON events.idevents = bands.idbands";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$events = "";
while ($row = $result->fetch_assoc()) {
    $events .= "<option>{$row['naam']} </option>";
}

// Handle form submission
$bandList = "";
if (isset($_POST['submit'])) {
    $selectedEvent = $_POST['events'];

    // Query to fetch bands for the selected event
    $bandQuery = "SELECT bands.band FROM events 
                  INNER JOIN bands ON events.idevents = bands.idbands 
                  WHERE events.naam = ?";
    $bandStmt = $conn->prepare($bandQuery);
    $bandStmt->bind_param("s", $selectedEvent);
    $bandStmt->execute();
    $bandResult = $bandStmt->get_result();

    $bandList = "<h3>Bands playing at the selected event:</h3><ul>";
    while ($bandRow = $bandResult->fetch_assoc()) {
        $bandList .= "<li>{$bandRow['band']}</li>";
    }
    $bandList .= "</ul>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h3 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            background: #fff;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Our events</h3>
        <form method="post">
            <div>
                <label for="menu">Events</label>
                <select name="events" id="menu">
                    <?php echo $events; ?>
                </select>
            </div>
            <input type="submit" name="submit" value="Show Bands">
        </form>
        <?php echo $bandList; ?>
    </div>
</body>
</html>
