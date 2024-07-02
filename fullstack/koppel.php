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
</head>

<style>
    /* Add some basic styling to make the page look modern */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    
    header {
        background-color: #333;
        color: #fff;
        padding: 1em;
        text-align: center;
    }
    
    header h1 {
        margin: 0;
    }
    
    button {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #3e8e41;
    }
    
    form {
        max-width: 500px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    label {
        display: block;
        margin-bottom: 10px;
    }
    
    select, input[type="checkbox"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
    }
    
    input[type="checkbox"] {
        margin: 0 10px 0 0; /* Add some margin to the left of the checkbox */
    }
    
    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    
    input[type="submit"]:hover {
        background-color: #3e8e41;
    }
    
    #bands {
        margin-top: 20px;
    }
    
    #bands h3 {
        margin-top: 0;
    }
</style>
<body>
    <header>
        <h1>CAFE</h1>
        <a href="loginPage.php"><button>Login</button></a>
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
    </form>
</body>
</html>

