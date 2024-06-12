<?php
header("location: opdracht.php?=back");
require ("index.php");
$inputName = $_POST['name'];


// if($inputName === ''){
//     $conn->query($sql) === false;
// }

if($inputName === ''){
   // echo "vul iets in";
}else{
$statement = "insert into student(studentname) values ('$inputName')";
$conn->query($statement);


$sql = "select * from student;";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);



/*
if($resultcheck > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    

        echo $row['id'];
        echo $row['studentname' ] . "<br>";
        
    }
 }*/
};

exit();
?>
