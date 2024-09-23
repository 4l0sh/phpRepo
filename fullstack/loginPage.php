<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="fullstack.css">

</head>

<body>
    <div class="container">
        <form action="loginpagephp.php" method="post">
            <h2>Login</h2>
            <label class="form-label" for="userName">Username:</label>
            <input class="form-input" type="text" id="userName" name="userName"><br><br>
            <label class="form-label" for="password">Password:</label>
            <input class="form-input" type="password" id="password" name="pass"><br><br>
            <input id="loginbtn" type="submit" value="Login">
            <?php if (isset($errorMsg)) {
                echo '<div class="error-msg">' . $errorMsg . '</div>';
            } ?>
        </form>
    </div>
    <br><br><br>
    <div>
        <form action="registrationPageQuery.php" method="POST">
            <input type="email" placeholder="email" name="email" required>
            <input type="password" placeholder="password" name="password" required>
            <input type="submit" value="submit">
        </form>
    </div>
</body>

</html>