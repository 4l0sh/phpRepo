<?php
require("database.php");
$conn->select_db("fullstackDB");
?>
<script>
    function clearbtn() {

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
    document.getElementById("text").innerHTML = "";
}
};
xmlhttp.open("POST", "clearbtn.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("r=test");
}

</script>

<html>
    <head>
        <title>Fullstack</title>
        <link rel="stylesheet" href="fullstack.css">
    </head>
    <body class="gridlayout">
        <h1 id="welcomeText"> Add here your band information</h1>
        <h2 id="title">Cafe Alawi</h2>
    <form id="form" action="fullstackphp.php" method="POST">
                <input id="nameInput" required type="text"  name="name" placeholder="Band Name here">
                <input id="genreInput" required type="text" name="genre" placeholder="Genre">
                <input id="submitbtn"  type="submit" value="submit">
                <input class="clearbtn" type="button" value="clear" onclick="clearbtn();">
            </form>
    </body>
</html>

<?php
echo '<div id="text">';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputText = mysqli_real_escape_string($conn, $_POST['name']);
    $inputGenre = mysqli_real_escape_string($conn, $_POST['genre']);

    $sql = "INSERT INTO bands (band, genre) VALUES ('$inputText', '$inputGenre');";

   
    if (mysqli_query($conn, $sql)) {
        echo "Band added successfully";
       
    } else {
        echo "ERROR adding the band: " . mysqli_error($conn);
    }
} else {

}
echo '</div>';

?>

