<?php 

session_start();

if ($_POST && array_key_exists("sign-out", $_POST) && $_POST["sign-out"] == "Sign Out"){

    header("Location: index.php?sign-out=1");

} else if ($_SESSION && array_key_exists("email", $_SESSION)){

    echo "Welcome, ".$_SESSION["email"];

} else {

    header("Location: index.php");

} 

?>

<html>

    <head>
    </head>

    <body>

        <form method="post">

            <input type="submit" value="Sign Out" name="sign-out">

        </form>
        
    </body>

</html>

