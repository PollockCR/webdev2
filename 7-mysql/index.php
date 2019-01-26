<?php 

include("secrets.php");

$username = USERNAME;

$password = PASSWORD;

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", $username, $password, $username);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

}

if ($_POST && array_key_exists("email", $_POST) && array_key_exists("name", $_POST) && array_key_exists("password", $_POST)){

    $email = $_POST["email"];
    
    $name = $_POST["name"];
    
    $password = $_POST["password"];

    $query = "SELECT id FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";

    // Use mysqli_real_escape_string to prevent SQL injection
    
    $result = mysqli_query($link, $query);

    if ($result->num_rows != 0){

        echo "Insert error. Email already exists in database.<br>";


    } else {

        $query = "INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES (NULL, '".mysqli_real_escape_string($link, $email)."', '".mysqli_real_escape_string($link, $password)."', '".mysqli_real_escape_string($link, $name)."')";

        mysqli_query($link, $query);

        echo "Insert successful.<br>";

    }

}

?>


<form method="post">

    <input type="text" name="name" placeholder="Name" required>

    <input type="email" name="email" placeholder="Email" required>

    <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;" required>

    <input type="submit">

</form>