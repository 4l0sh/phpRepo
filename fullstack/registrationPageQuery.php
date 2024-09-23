<?php
require("database.php");

$inputEmail = mysqli_real_escape_string($conn, $_POST['email']);
$inputPassword = mysqli_real_escape_string($conn, $_POST['password']);

// Remove echo statements here
$hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);


$sql = "INSERT INTO users(user, pass) VALUES ('$inputEmail', '$hashedPassword')";

if (mysqli_query($conn, $sql)) {
    // Ensure no output before this header call
    header("Location: eventPage.php?back");
    exit(); // Always exit after header redirection
} else {
    // For debugging purposes, you can display this error if needed
    echo "Error: " . mysqli_error($conn);
}

?>