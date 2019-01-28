<?php 

session_start();

include("secrets.php");

$username = USERNAME;

$password = PASSWORD;

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", $username, $password, $username);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

}

if ($_POST && array_key_exists("submit", $_POST)){

    // sign up

    if ($_POST["submit"] == "Sign Up" && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){

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

                setcookie("email", $_POST["email"], time() + 60 * 60 * 24 * 1);

                setcookie("password", $password, time() + 60 * 60 * 24 * 1);

            }

            header("Location: session.php");

        }

    } else if ($_POST["submit"] == "Sign In" && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){

        // sign in 

        $query = "SELECT `password` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

        $result = mysqli_query($link, $query);

        if ($result->num_rows != 0){

            $row = mysqli_fetch_row($result);

            if(password_verify($_POST["password"], $row["0"])){

                $_SESSION["email"] = $_POST["email"];

                if(array_key_exists("remember-sign-in", $_POST) && $_POST["remember-sign-in"]){

                    setcookie("email", $_POST["email"], time() + 60 * 60 * 24 * 1);

                    setcookie("password", $row["0"], time() + 60 * 60 * 24 * 1);

                }

                header("Location: session.php");

            } else {

                echo "Incorrect email or password";

            }


        } else {

            echo "Incorrect email or password";

        }

    }

} else if ($_COOKIE && array_key_exists("email", $_COOKIE) && array_key_exists("password", $_COOKIE)){

    // remember me 

    $query = "SELECT `password` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_COOKIE["email"])."'";

    $result = mysqli_query($link, $query);

    if ($result->num_rows != 0){

        $row = mysqli_fetch_row($result);

        if ($_COOKIE["password"] == $row["0"]){

            $_SESSION["email"] = $_COOKIE["email"];

            header("Location: session.php");

        } else {

            echo "Please log in again.";

        }


    } else {

        echo "Please log in again.";

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

            <input type="submit" value="Sign Up" name="submit">

        </form>

        <p>Sign in:</p>

        <form method="post">

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="checkbox" name="remember-sign-in">

            <input type="submit" value="Sign In" name="submit">

        </form>

    </body>

</html>