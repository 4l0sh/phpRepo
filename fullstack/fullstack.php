<?php
require("database.php");
$conn->select_db("fullstackDB");
?>


<html>
    <head>
        <title>Fullstack</title>
        <link rel="stylesheet" href="">
    </head>
    <body class="gridlayout">
    <form action="fullstack.php" method="post">
                <input type="text"  name="name">
                <input type="text" name="genre">
                <input type="submit" value="submit">
                <input type="button" value="clear">
            </form>
    </body>
</html>

<?php
$inputText = $_POST['name'];
$inputGenre = $_POST['genre'];

$sql = "INSERT INTO bands (band, genre) VALUES ('$inputText', '$inputGenre');";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);



if($resultcheck > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $nme = $row[''];
        echo "band name added succesfully";
        
    }
 }else{
    echo "Er is een fout opgetreden";
 }

?>