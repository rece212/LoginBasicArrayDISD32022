<?php
    session_start();
    //print_r($_SESSION['Array']);

    //array_push($_SESSION['Array'],Array("399786750ec8ac94a1a3952bf858569a","098f6bcd4621d373cade4e832627b4f6","Test"));
    //print_r($_SESSION['Array']);
    $Error="";

    $Email = isset($_POST['email'])?$_POST['email']:'';
    $Pass = isset($_POST['password'])?$_POST['password']:'';
    $Name = isset($_POST['Name'])?$_POST['Name']:'';

    if (isset($_POST['register']))
    {
        Register($Email,$Pass,$Name);
    }


?>



<!DOCTYPE html>

<html>

<head>

    <title>Register PAGE</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form action="register.php" method="post">

    <h1>Register</h1>

    <label> Name </label>
    <input type="text" required name="Name"
           value="<?php echo isset($Name) ? $Name: ''; ?>" placeholder="name"><br>


    <label> Email </label>
    <input type="email" required name="email"
           value="<?php echo isset($Email) ? $Email: ''; ?>" placeholder="email"><br>

    <label>Password</label>
    <input type="password" required name="password"
           value="<?php echo isset($Pass) ? $Pass: '';  ?>"  placeholder="password"><br>
    <?php

    echo isset($Error) ? $Error : '';
    ?>
    <button name="register" type="Submit">Login</button>

</form>

</body>

</html>


<?php
    function Register($EmailAddress,$Password,$UserName)
    {
        $Logged = false;

        $Array=$_SESSION['Array'];
        for ($x =0;$x <count($Array);$x++)
        {
            if((strcmp($Array[$x][0],md5($EmailAddress))==0))
            {
                $Logged=true;
            }
        }
        if($Logged == false)
        {
            array_push($_SESSION['Array'],Array(md5($EmailAddress),md5($Password),$UserName));
            header('Location: index.php');

        }else
        {
            $GLOBALS['Error']="<br>Email address is already inside the database<br>";
        }

    }

?>

