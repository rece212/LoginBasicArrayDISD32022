<?php
    session_start();

    $UserData = array(
            array("1f9d9a9efc2f523b2f09629444632b5c","26269474bc6e14f4f9449c36056d92d3","ps. John"),
            array("bbff37631b524c3aadd1b1b25e020e08","61409aa1fd47d4a5332de23cbf59a36f","Pastor John"),
            array("3ee8a343f1c208a4836cff32b5237922","9477c9fc574c967285c7860c78d2c75a","Bishop Paul"),
            array("ac946bf7babe63933f3eba52db544dec","3aa4584e547efba20238772d4af5c03d","Mr Pastor van Zyl"));


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

        $Array=$GLOBALS['UserData'];
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