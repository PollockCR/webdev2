<?php 

include("secrets.php");

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", USERNAME, PASSWORD, USERNAME);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

} 

$query = "SELECT * FROM users";

if($result = mysqli_query($link, $query)){

    $row = mysqli_fetch_array($result);

    echo "Welcome, ".$row["email"];

}



?>