<?php
require('database.php');

if (isset($_POST['eventId'])) {
    $eventId = $_POST['eventId'];

    $sql = "SELECT bands.band FROM bands 
            INNER JOIN bands_has_events ON bands.idbands = bands_has_events.idbands 
            WHERE bands_has_events.idevents = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();

    $bandList = "<h3>Bands playing at the selected event:</h3><ul>";
    while ($row = $result->fetch_assoc()) {
        $bandList .= "<li>{$row['band']}</li>";
    }
    $bandList .= "</ul>";

    echo $bandList;
}
?>