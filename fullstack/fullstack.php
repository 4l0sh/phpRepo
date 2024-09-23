<?php
require("database.php");
$conn->select_db("fullstackDB");
?>
<script>
    function clearbtn() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("text").innerHTML = "";
            }
        };
        xmlhttp.open("POST", "clearbtn.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("r=test");
    }
    function submitButton() {
        alert("Band added succesfully");
    }
    function redirect() {
        var url = "http://127.0.0.1/phpRepo/fullstack/eventPage.php";
        window.location.href = url;
    }


</script>

<html>

<head>
    <title>Fullstack</title>
    <link rel="stylesheet" href="fullstack.css">
</head>

<body class="gridlayout">
    <h1 class="welcomeText"> Add here your band information.</h1>
    <h2 class="title">Cafe</h2>
    <form id="form" action="fullstackphp.php" method="POST">
        <input id="nameInput" required type="text" name="name" placeholder="Band Name here">
        <select id="genreInput" required name="genre">
            <option value="" disabled selected>Select a genre</option>
            <option value="Rock">Rock</option>
            <option value="Pop">Pop</option>
            <option value="Jazz">Jazz</option>
            <option value="Classical">Classical</option>
            <option value="Hip-Hop">Hip-Hop</option>
        </select>
        <input class="submitbtn" type="submit" value="submit" onclick="submitButton();">
        <input class="clearbtn" type="button" value="clear" onclick="clearbtn();">
    </form>

    <button onclick="redirect();">Add your event!</button>
</body>

</html>

<?php

?>