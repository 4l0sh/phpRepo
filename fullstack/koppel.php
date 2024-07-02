<?php
require('database.php');

// Query to retrieve events
$eventquery = "select idevents, naam from events;";
$eventresult = mysqli_query($conn, $eventquery);

$eventOptions = "";
$evids = array();
while($row = mysqli_fetch_assoc($eventresult)) {
    $eventOptions .= '<option value="'. $row['naam']. '">'. $row['naam']. '</option>';
    $evids[$row['naam']] = $row['idevents'];
}

// Query to retrieve bands
$bandquery = "select band, idbands from bands;";
$bandresult = mysqli_query($conn, $bandquery);

$bands = array();
$ids = array();
while($row = mysqli_fetch_assoc($bandresult)) {
    $bands[] = $row['band'];
    $ids[$row['band']] = $row['idbands'];
    // foreach ($evids as $key => $value) {
    //     echo "$key => $value<br>";
    // }
}

?>

<html>
    <head>
        <title>Koppel Pagina</title>
        <!-- <style>
            body {
                background-color: lightblue;
                font-family: sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            .gridLayout {
                background-color: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            h1 {
                font-size: 2em;
                margin-bottom: 20px;
            }

            h2 {
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            select,
            input[type="checkbox"],
            input[type="submit"] {
                margin-bottom: 10px;
                padding: 8px;
                border-radius: 5px;
                border: 1px solid #ccc;
                font-size: 1em;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            } -->
        </style>
    </head>
    <body class="gridLayout">
        <div>
            <form action="koppel.php" method="post">
                <select name="event">
                    <option value="" disabled selected>Select an event</option>
                    <?php echo $eventOptions;?>
                </select>
                <h2>Select Bands:</h2>
                <?php foreach($bands as $band) { ?>
                    <input type="checkbox" name="bands[]" value="<?php echo $band;?>"><?php echo $band;?>
                <?php } ?>
                <input type="submit" value="submit">
            </form>
        </div>
    </body>
</html>

<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedEvent = $_POST['event'];
    $selectedBands = $_POST['bands'];

    foreach($selectedBands as $band) {
        // Get the IDs from the arrays
        $eventId = $evids[$selectedEvent];
        $bandId = $ids[$band];

        // Insert the selected band and event into the table
        $insertQuery = "INSERT INTO bands_has_events (idbands, idevents, band, naam) VALUES ('$bandId', '$eventId', '$bands','$selectedEvent')";
        mysqli_query($conn, $insertQuery);
    }
}
?>