<?php 

    include("secrets.php");

    $username = USERNAME;

    $password = PASSWORD;

    $link = mysqli_connect("localhost", $username, $password, $username);

    if(mysqli_connect_errno()){
        
        print_r(mysqli_connect_error());
        exit;
        
    }

?>