<?php
require('database.php');
$bandquery = "select band from bands;";
$bandresult = mysqli_query($conn, $bandquery);

$options = '';
while($row = mysqli_fetch_assoc($bandresult)) {
    $options.= '<option>'. $row['band']. '</option>';
}

$eventquery = "select naam from events;";
$eventresult = mysqli_query($conn, $eventquery);

$eventOptions = "";
while($row = mysqli_fetch_assoc($eventresult)) {
    $eventOptions .= '<option>'. $row['naam']. '</option>';
}
?>

<html>
    <head>
        <title>Koppel Pagina</title>
    </head>
    <body class="gridLayout">
        <div>
            <form action="koppel.php" method="post">
            <select>
            <option value="" disabled selected>Select a band</option>
            <?php echo $options;?>
            </select>
            <select>
                <option value="" disabled selected>Select an event</option>
                <?php echo $eventOptions ?>
            </select>
            <input type="submit" value="submit">
        </form>
        </div>
    </body>
</html>