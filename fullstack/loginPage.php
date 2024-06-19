<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Open Sans, sans-serif;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 400px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-input:focus {
            border-color: #aaa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .submit-btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
        }

        .submit-btn:hover {
            background-color: #3e8e41;
        }

        .error-msg {
            color: #red;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Add some modern touches */
        .container {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s;
        }

        .container:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        .form-input:focus {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
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