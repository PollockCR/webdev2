<?php 

session_start();

include("secrets.php");

$username = USERNAME;

$password = PASSWORD;

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", $username, $password, $username);

$error = "";

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

}

if ($_GET && array_key_exists("log-out", $_GET) && $_GET["log-out"]){

    setcookie("session", "", time() - 60);

    if ($_SESSION && array_key_exists("email", $_SESSION)){

        unset($_SESSION["email"]);

    }

    header("Location: index.php");

} else if ($_POST && array_key_exists("submit", $_POST)){

    // sign up

    if ($_POST["is-sign-up"] && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){

        $query = "SELECT id FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

        $result = mysqli_query($link, $query);

        if ($result->num_rows != 0){

            $error = "Sign up error: Email already exists in database.<br>";


        } else {

            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $query = "INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES (NULL, '".mysqli_real_escape_string($link, $_POST["email"])."', '".$password."', '')";

            mysqli_query($link, $query);

            $_SESSION["email"] = $_POST["email"];

            if(array_key_exists("remember-me", $_POST) && $_POST["remember-me"]){

                rememberMe($link);

            }

            header("Location: session.php");

        }

    } else if (!$_POST["is-sign-up"] && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){

        // log in 

        $query = "SELECT `password` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

        $result = mysqli_query($link, $query);

        if ($result->num_rows != 0){

            $row = mysqli_fetch_row($result);

            if(password_verify($_POST["password"], $row["0"])){

                $_SESSION["email"] = $_POST["email"];

                if(array_key_exists("remember-me", $_POST) && $_POST["remember-me"]){

                    rememberMe($link);

                }

                header("Location: session.php");

            } else {

                $error = "Incorrect email or password";

            }


        } else {

            $error = "Incorrect email or password";

        }

    }

} else if ($_COOKIE && array_key_exists("session", $_COOKIE)){

    // remember me 
    if (checkMe($link)){

        header("Location: session.php");

    } else {

        $error = "Please log in again.";

    }

}

function checkMe ($link) {

    $query = "SELECT `email` FROM `users` WHERE `session` = '".$_COOKIE["session"]."'";

    $result = mysqli_query($link, $query);

    if ($result->num_rows != 0){

        $row = mysqli_fetch_row($result);

        $_SESSION["email"] = mysqli_real_escape_string($link, $row["0"]);

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