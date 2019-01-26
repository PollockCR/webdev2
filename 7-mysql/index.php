<?php 

include("secrets.php");

$username = USERNAME;

$password = PASSWORD;

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", $username, $password, $username);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

}

$query = "SELECT * FROM `users` WHERE `email` LIKE '%p%'";

if ($result = mysqli_query($link, $query)){

    while ($row = mysqli_fetch_array($result)){

        print_r($row);

    }

}



?>