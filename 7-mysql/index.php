<?php 

session_start();

include("secrets.php");

$username = USERNAME;

$password = PASSWORD;

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", $username, $password, $username);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

}

if ($_GET && array_key_exists("sign-out", $_GET) && $_GET["sign-out"]){

    setcookie("session", "", time() - 60);

    if ($_SESSION && array_key_exists("email", $_SESSION)){

        unset($_SESSION["email"]);

    }

    header("Location: index.php");

} else if ($_POST && array_key_exists("submit", $_POST)){

    // sign up

    if ($_POST["signUp"] && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){

        $query = "SELECT id FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

        $result = mysqli_query($link, $query);

        if ($result->num_rows != 0){

            echo "Sign up error: Email already exists in database.<br>";


        } else {

            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $query = "INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES (NULL, '".mysqli_real_escape_string($link, $_POST["email"])."', '".$password."', '')";

            mysqli_query($link, $query);

            $_SESSION["email"] = $_POST["email"];

            if(array_key_exists("remember-sign-up", $_POST) && $_POST["remember-sign-up"]){

                rememberMe($link);

            }

            header("Location: session.php");

        }

    } else if (!$_POST["signUp"] && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){

        // sign in 

        $query = "SELECT `password` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

        $result = mysqli_query($link, $query);

        if ($result->num_rows != 0){

            $row = mysqli_fetch_row($result);

            if(password_verify($_POST["password"], $row["0"])){

                $_SESSION["email"] = $_POST["email"];

                if(array_key_exists("remember-sign-in", $_POST) && $_POST["remember-sign-in"]){

                    rememberMe($link);

                }

                header("Location: session.php");

            } else {

                echo "Incorrect email or password";

            }


        } else {

            echo "Incorrect email or password";

        }

    }

} else if ($_COOKIE && array_key_exists("session", $_COOKIE)){

    // remember me 
    if (checkMe($link)){

        header("Location: session.php");

    } else {

        echo "Please log in again.";

    }

}

function checkMe ($link) {

    $query = "SELECT `email` FROM `users` WHERE `session` = '".$_COOKIE["session"]."'";

    $result = mysqli_query($link, $query);

    if ($result->num_rows != 0){

        $row = mysqli_fetch_row($result);

        $_SESSION["email"] = $row["0"];

        return true;

    }

    return false;

}

function rememberMe ($link){

    $query = "SELECT `id` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

    $result = mysqli_query($link, $query);

    if ($result->num_rows != 0){

        $row = mysqli_fetch_row($result);

        $session = md5('9a7fd98asf'.time().$row["0"]);

        $query = "UPDATE `users` SET `session` = '".$session."' WHERE `id` = '".$row["0"]."'";

        $result = mysqli_query($link, $query);

        setcookie("session", $session, time() + 60 * 60 * 24 * 1);

    }

}

?>

<html>

    <head>

    </head>

    <body>

        <p>Sign up:</p>

        <form method="post">

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="checkbox" name="remember-sign-up">

            <input type="hidden" name="signUp" value="1">

            <input type="submit" value="Sign Up" name="submit">

        </form>

        <p>Sign in:</p>

        <form method="post">

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="checkbox" name="remember-sign-in">

            <input type="hidden" name="signUp" value="0">

            <input type="submit" value="Sign In" name="submit">

        </form>

    </body>

</html>