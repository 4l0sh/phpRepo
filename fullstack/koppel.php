<?php
require("database.php");

// Fetch events
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Fetch bands
$query = "SELECT * FROM bands";
$result2 = $conn->query($query);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Band Event</title>
    <link rel="stylesheet" href="fullstack.css">
</head>
<body>
    <header>
        <h1>CAFE</h1>
        <a href="loginPage.php"><button>Login</button></a>
        <link rel="stylesheet" href="fullstack.css">
    </header>
    <form action="bandEventPagephp.php" method="POST">
        <label for="events">Select Event:</label>
        <select name="event" id="events">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['idevents']}'>{$row['naam']}</option>";
                }
            } else {
                echo "<option>No events found</option>";
            }
            ?>
        </select>
        
        <div id="bands">
            <?php
            if ($result2->num_rows > 0) {
                echo "<h3>Select Bands:</h3>";
                while ($bandRow = $result2->fetch_assoc()) {
                    echo "<input type='checkbox' name='bands[]' value='{$bandRow['idbands']}'> {$bandRow['band']}<br>";
                }
            } else {
                echo "No bands found";
            }
            ?>
        </div>
        
        <input type="submit" value="Submit">

        <a href="mainPage.php"><button id="mpage">Main Page</button></a>
    </form>
</body>
</html>
