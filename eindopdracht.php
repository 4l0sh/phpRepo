<?php
require('database.php');

$t1Statement = "select idproduct from product";
$result = mysqli_query($conn, $t1Statement);

$conn->query($t1Statement);
while($row = $result->fetch_array()){
    $resultText = $row['idproduct']; // Define $resultText here
}


$t1Statement = "select idproduct from product";
$result = mysqli_query($conn, $t1Statement);

$conn->query($t1Statement);
while($row = $result->fetch_array()){
    $resultText = $row['idproduct']; // Define $resultText here
}

?>
<head>
<link rel="stylesheet" href="style.css">
</head>
<html>
    <style>
        body {
  background-image:url(gradient.jpg);
}
#table1{
  grid-column: 15/20;
  grid-row: 6;

}
tr{
    background-color: white;
}
    </style>




<body class="gridLayout">
    <div id="welcomeText">
        <p > Tools For Ever </p>
    </div>
    <div id="table1">
        <table>
            <tr>
                <th> <? echo $resultText; ?></th>
                <th> (aantal)</th>
                <th>(te bestellen)</th>
                <th>(locatie)</th>
            </tr>
        </table>
    </div>
</body>
</html>