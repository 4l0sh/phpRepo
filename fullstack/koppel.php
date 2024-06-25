<?php
require('database.php');

// Query to retrieve bands
$bandquery = "select band from bands;";
$bandresult = mysqli_query($conn, $bandquery);

$options = '';
while($row = mysqli_fetch_assoc($bandresult)) {
    $options.= '<option value="'. $row['band']. '">'. $row['band']. '</option>';
}

// Query to retrieve events
$eventquery = "select naam from events;";
$eventresult = mysqli_query($conn, $eventquery);

$eventOptions = "";
while($row = mysqli_fetch_assoc($eventresult)) {
    $eventOptions.= '<option value="'. $row['naam']. '">'. $row['naam']. '</option>';
}
?>

<html>
    <head>
        <title>Koppel Pagina</title>
    </head>
    <body class="gridLayout">
        <div>
            <form action="koppel.php" method="post">
                <select name="band">
                    <option value="" disabled selected>Select a band</option>
                    <?php echo $options;?>
                </select>
                <select name="event">
                    <option value="" disabled selected>Select an event</option>
                    <?php echo $eventOptions?>
                </select>
                <input type="submit" value="submit">
            </form>
        </div>
    </body>
</html>

<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedBand = $_POST['band'];
    $selectedEvent = $_POST['event'];

    // Insert the selected band and event into the table
    $insertQuery = "INSERT INTO bands_has_events (band, naam) VALUES ('$selectedBand', '$selectedEvent')";
    mysqli_query($conn, $insertQuery);
}
?>