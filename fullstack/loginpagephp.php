<?php
require("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUser = mysqli_real_escape_string($conn, $_POST['userName']);
    $inputPass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Fetch the hashed password from the database
    $sql = "SELECT pass FROM users WHERE user = '$inputUser'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['pass']; // This is the hashed password from the database

        // Verify the password entered by the user against the hashed password
        if (password_verify($inputPass, $hashedPassword)) {
            header("Location: fullstack.php");
            exit();
        } else {
            echo "Error: Incorrect password.";
        }
    } else {
        echo "Error: User not found.";
    }
}
?>