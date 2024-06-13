<?
require("database.php");

$r = $_REQUEST["r"];

$clear1 = "delete from bands where band != '' ;"; 

$conn->query($clear1);


echo $r;
?>
