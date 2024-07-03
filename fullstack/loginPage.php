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
            <input class="submit-btn" type="submit" value="Login">
            <?php if (isset($errorMsg)) { echo '<div class="error-msg">'. $errorMsg. '</div>'; }?>
        </form>
    </div>
</body>
</html>