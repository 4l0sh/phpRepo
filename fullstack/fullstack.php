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
function submitButton(){
alert("Band added succesfully");
}
function redirect() {
    var url = "http://127.0.0.1/phpRepo/fullstack/eventPage.php";
    window.location.href = url;
}
// function submitbtn() {
    
//     if (true) { 
//         alert("Band added successfully");
//         return true; 
//     } else {
//         alert("Error adding band");
//         return false; 
//     }
// }

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
                <input id="nameInput" required type="text"  name="name" placeholder="Event Name here">
                  <select id="genreInput" required name="genre">
                   <option value="" disabled selected>Select a genre</option>
                    <option value="Rock">Rock</option>
                    <option value="Pop">Pop</option>
                    <option value="Jazz">Jazz</option>
                    <option value="Classical">Classical</option>
                    <option value="Hip-Hop">Hip-Hop</option>
                </select>
               <input class="submitbtn"  type="submit" value="submit" onclick="submitButton();">
                <input class="clearbtn" type="button" value="clear" onclick="clearbtn();">
            </form>
            <a href="javascript:;">
    <svg class="icon-arrow before">
        <use xlink:href="#arrow"></use>
    </svg>
    <span class="label" onclick="redirect();">Add your event!</span>
    <svg class="icon-arrow after">
        <use xlink:href="#arrow"></use>
    </svg>
</a>

<svg style="display: none;">
  <defs>
    <symbol id="arrow" viewBox="0 0 35 15">
      <title>Arrow</title>
      <path d="M27.172 5L25 2.828 27.828 0 34.9 7.071l-7.07 7.071L25 11.314 27.314 9H0V5h27.172z "/>
    </symbol>
  </defs>
</svg>
    </body>
</html>

<?php


// echo '<div id="text">';
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $inputText = mysqli_real_escape_string($conn, $_POST['name']);
//     $inputGenre = mysqli_real_escape_string($conn, $_POST['genre']);

//     $sql = "INSERT INTO bands (band, genre) VALUES ('$inputText', '$inputGenre');";

   
//     if (mysqli_query($conn, $sql)) {
//         echo "Band added successfully";
       
//     } else {
//         echo "ERROR adding the band: " . mysqli_error($conn);
//     }
// } else {

// }
// echo '</div>';

?>

