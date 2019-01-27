<?php 

session_start();

include("secrets.php");

$username = USERNAME;

$password = PASSWORD;

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", $username, $password, $username);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

}

if ($_POST && array_key_exists("email", $_POST) && array_key_exists("name", $_POST) && array_key_exists("password", $_POST)){

    $query = "SELECT id FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

    // Use mysqli_real_escape_string to prevent SQL injection

    $result = mysqli_query($link, $query);

    if ($result->num_rows != 0){

        echo "Insert error. Email already exists in database.<br>";


    } else {

        $query = "INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES (NULL, '".mysqli_real_escape_string($link, $_POST["email"])."', '".mysqli_real_escape_string($link, $_POST["password"])."', '".mysqli_real_escape_string($link, $_POST["name"])."')";

        mysqli_query($link, $query);

        $_SESSION["email"] = $_POST["email"];

        header("Location: session.php");

    }

} else if ($_POST && array_key_exists("email", $_POST) && array_key_exists("password", $_POST)){

    $query = "SELECT `password` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST["email"])."'";

    // Use mysqli_real_escape_string to prevent SQL injection

    $result = mysqli_query($link, $query);

    if ($result->num_rows != 0){

        $row = mysqli_fetch_row($result);

        if($row["0"] == $_POST["password"]){

            $_SESSION["email"] = $_POST["email"];

            header("Location: session.php");

        } else {

            echo "Incorrect email or password";

        }


    } else {

        echo "Incorrect email or password";

    }

}

?>

<html>

    <head>

    </head>

    <body>

        <p>Sign up:</p>

        <form method="post">

            <input type="text" name="name" placeholder="Name" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" value="Sign Up">

        </form>
        
        <p>Sign in:</p>

        <form method="post">

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" value="Sign In">

        </form>

    </body>

</html>