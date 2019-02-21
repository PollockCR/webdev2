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
                
        // vaildate user
        if(!validate()){
            exit();
        }
        
        // check for existing user
        $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST["email"]) ."' LIMIT 1";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0){
            $error = "That email address already exists in the database";
            echo $error;
            exit();
        }
                
        // create new user
        $query = "INSERT INTO users (`email`, `password`) VALUES ('" . mysqli_real_escape_string($link, $_POST["email"]) ."', '" . mysqli_real_escape_string($link, $_POST["password"]) ."')";
        
        if(mysqli_query($link, $query)){
            echo "Welcome, new user.";
        } else {
            echo "Could not create user.";
            exit();
        }
        
        // encrypt password
        $query = "SELECT id FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST["email"]) ."' LIMIT 1";
        
        $result = mysqli_query($link, $query);

        if ($result->num_rows != 0){
            
            $row = mysqli_fetch_row($result);
    
            $password = password_hash("q#W46^QM".$row[0].$_POST["password"], PASSWORD_DEFAULT);
            
            $query = "UPDATE users SET password = '".$password."' WHERE id = '".$row["0"]."'";

            $result = mysqli_query($link, $query);
            
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