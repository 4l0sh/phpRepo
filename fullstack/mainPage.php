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

<html>
<head>
    <title>Main Page</title>
</head>
<body>
    <h3>Our events</h3>
    <form method="post">
        <div>
            <label>events</label>
            <select name="events" id="menu">
                <?php echo $events; ?>
            </select>
        </div>
        <input type="submit" name="submit" value="Show Bands">
    </form>
    <?php echo $bandList; ?>
</body>
</html>
