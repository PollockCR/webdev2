<?php 

include("secrets.php");

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", USERNAME, PASSWORD, USERNAME);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

} 

$query = "SELECT id FROM `users` WHERE `email` = 'felixthefox@armyspy.com'";

$result = mysqli_query($link, $query);

if($result->num_rows == 0) {

    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('felixthefox@armyspy.com', 'goodmorningworld')";
    
    mysqli_query($link, $query);

}

$query = "UPDATE `users` SET `email` = 'pandasarecool@armyspy.com' WHERE `email` = 'pandagang@armyspy.com' LIMIT 1";

mysqli_query($link, $query);

$query = "SELECT * FROM users";

if($result = mysqli_query($link, $query)){

    $row = mysqli_fetch_array($result);

    echo "Welcome, ".$row["email"];

}



?>