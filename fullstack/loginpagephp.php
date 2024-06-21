<?php
require('database.php');
// header("Location: loginPage.php?back");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputuser = mysqli_real_escape_string($conn, $_POST['userName']);
    $inputpw = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE user = '$inputuser' AND pass = '$inputpw'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User credentials are correct
        $row = mysqli_fetch_assoc($result);
        $userData = implode(', ', $row);

        // echo "You are logged in! Your user data is: $userData";
        // echo "You are logged in!";
        header("Location: fullstack.php?back");
        exit();
    } else {
        // User credentials are incorrect
        header("Location: loginPage.php?error=invalid_credentials");
        exit();
    }
}
?>

