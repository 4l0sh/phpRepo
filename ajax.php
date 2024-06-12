<?
require("index.php");

$r = $_REQUEST["r"];

$clear1 = "delete from student where id > 0;"; 
$clear2 = "alter table student auto_increment = 0;";

$conn->query($clear1);
$conn->query($clear2);

echo $r;
?>

