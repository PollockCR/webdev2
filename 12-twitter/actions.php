<?php

    $error = "";

    include("functions.php");

    if($_GET["action"] == "login"){
        
        if(!validate()){
            exit();
        }
        print_r($_POST);
        
    }

    else if($_GET["action"] == "signup"){
                
        if(!validate()){
            exit();
        }
        
        $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST["email"]) ."' LIMIT 1";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0){
            $error = "That email address already exists in the database";
            echo $error;
            exit();
        }
        print_r($_POST);
        
    }

    function validate(){
                
        if(!$_POST["email"]){
            $error = "An email address is required.";
        } else if(!$_POST["password"]){
            $error = "A password is required.";
        } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email address."; 
        }
        
        if($error != ""){
            echo $error;
            return false;
        }
        
        return true;
        
    }
?>