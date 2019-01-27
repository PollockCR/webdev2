<?php 

session_start();

if($_SESSION && array_key_exists("email", $_SESSION)){
    
    echo "Welcome, ".$_SESSION["email"];
    
} else {
    
    header("Location: index.php");
    
}


?>