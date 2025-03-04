<?php
include_once '../helpers/session_helper.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Login Page</title>
</head>

<body>

    <div class="logon">
        <div class="container-reg">
            <div class="title-container">
                <div class="title">
                    <h2 id="title">PLEASE LOG ON</h2>

                    <?php flash("login") ?>
                </div>
            </div>

            <form class="login-form" method="POST" action="../controllers/Users.php">
                <input type="hidden" name="type" value="login">
                <div class="input-box">
                    <input type="hidden" name="type" value="login">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="input">
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="input">
                </div>

                <div class="right">
                    <button type="submit" name="submit" id="login-btn">Log on</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>