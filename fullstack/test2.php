<?php
require('database.php');

// Query to retrieve events
$eventquery = "select naam from events;";
$eventresult = mysqli_query($conn, $eventquery);

$eventOptions = "";
while($row = mysqli_fetch_assoc($eventresult)) {
    $eventOptions.= '<option value="'. $row['naam']. '">'. $row['naam']. '</option>';
}

// Query to retrieve bands
$bandquery = "select band, idbands from bands;";
$bandresult = mysqli_query($conn, $bandquery);

$bands = array();
$ids = array();
while($row = mysqli_fetch_assoc($bandresult)) {
    $bands[] = $row['band'];
    $ids[$row['band']] = $row['idbands'];
}

?>
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
<html>
    <head>
        <title>Koppel Pagina</title>
    </head>
    <body class="gridLayout">
        <div>
            <form action="test2.php" method="post">
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
  $selectedEvent = mysqli_real_escape_string($conn, $_POST['event']);
  $selectedBands = $_POST['bands'];

  foreach($selectedBands as $band) {
      $band = mysqli_real_escape_string($conn, $band);

      $sql = "SELECT idevents FROM events WHERE naam = '$selectedEvent'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      var_dump($row);

      // $insertquery= "INSERT INTO  bands_has_events (idbands, idevents) values ("","")";

      if ($result) {
          $row = mysqli_fetch_assoc($result);
          $eventID = $row['idevents'];

          // Second query to get the bands
          $joinquery = "SELECT naam, bands.band 
                        FROM bands 
                        INNER JOIN bands_has_events 
                        ON bands.idbands = bands_has_events.idbands 
                        WHERE idevents = '$eventID'";
          mysqli_query($conn, $joinquery);
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  }
}
?>