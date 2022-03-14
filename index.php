<?php
    session_start();
    include_once 'UserData.php';
    print_r($_SESSION['Array']);
    /*$UserData = array(
        array("john@gmail.com","Saint"),
        array("PastorJohn@pastor.net","John"),
        array("Paul@gmail.com","PsPaul"),
        array("mrvanzyl@pastor.net","Bishop"));*/


    $Email = isset($_POST['email'])?$_POST['email']:'';
    $Pass = isset($_POST['password'])?$_POST['password']:'';

    if (isset($_POST['login']))
    {
        Login($Email,$Pass);
    }

?>

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
           value="<?php echo isset($Email) ? $Email: ''; ?>" placeholder="email"><br>

    <label>Password</label>
    <input type="password" required name="password"
           value="<?php echo isset($Pass) ? $Pass: '';  ?>"  placeholder="password"><br>
    <?php

    echo isset($Error) ? $Error : '';
    ?>
    <!--Login Button-->
    <button name="login" type="Submit">Login</button>

</form>

</body>

</html>



<?php
    function login($EmailAddress,$PasswordEntered)
    {
        $Logged = false;

        $Array=$_SESSION['Array'];
        for ($x =0;$x <count($Array);$x++)
        {
            if((strcmp($Array[$x][0],md5($EmailAddress))==0)&&(strcmp($Array[$x][1],md5($PasswordEntered))==0))
            {
                echo '<script>alert("You got your details correct")</script>';
                $Logged=true;
                $_SESSION['loggedInDetails'] =$Array[$x] ;


                header('Location: Welcome.php');
            }
        }
        if($Logged == false)
        {
            $GLOBALS['Error']="<br>Error has occurred , please try again<br>";
        }
    }
?>