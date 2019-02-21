<?php 

    include("secrets.php");

    $dbUsername = USERNAME;

    $dbPassword = PASSWORD;

    $link = mysqli_connect("localhost", $dbUsername, $dbPassword, $dbUsername);

    if(mysqli_connect_errno()){
        
        print_r(mysqli_connect_error());
        exit;
        
    }

?>