<?php
require('database.php');
$conn->select_db("fullstackDB");
$events = "";
$query = "select * from events inner join bands on events.idevents = bands.idbands;";
$stmt = $conn->prepare($query);
foreach ($stmt = $conn as $row){
    $events = "<option value='{$row["band"]} '>{$row['genre']} {$row['datum']} {$row['naam']} </option>";
}
$conn->query($query);
?>

<html>
    <head>
        <title>Main Page</title>
    </head>
    <body>
        <h3>Our events</h3>
        <form method="post">
            <div><label >bands</label>
        <select name="events" id="menu"> <?echo $events; ?></select>
    </div>
    <input type="submit" name="submit">
        </form>
    </body>
</html>