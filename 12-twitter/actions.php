<?php

    include("functions.php");

    if($_GET["action"] == "login"){
        
        if(!validate()){
            return;
        }
        print_r($_POST);
        
    }

    else if($_GET["action"] == "signup"){
                
        if(!validate()){
            return;
        }
        print_r($_POST);
        
    }

    function validate(){
        
        $error = "";
        
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