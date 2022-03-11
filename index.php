<!DOCTYPE html>

<html>

<head>

    <!--Creating the login page-->

    <title>LOGIN PAGE</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form action="index.php" method="post">

    <h1>LOGIN</h1>



    <label> Email </label>
    <input type="email" required name="email"
           value="<?php //echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" placeholder="email"><br>

    <label>Password</label>
    <input type="password" required name="password"
           value="<?php //echo isset($_POST['password']) ? $_POST['password'] : '';  ?>"  placeholder="password"><br>
    <?php

    echo isset($Error) ? $Error : '';
    ?>
    <!--Login Button-->
    <button name="login" type="Submit">Login</button>

</form>

</body>

</html>