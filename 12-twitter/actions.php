<?php

include("functions.php");

$error = "";

// login
if($_GET["action"] == "login"){

    if(validate()){

        // check for user
        $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST["email"]) ."' LIMIT 1";
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) == 0){

            $error = "That email address could not be found.";
            echo $error;

        } else {

            $row = mysqli_fetch_assoc($result);
            $id = $row["id"];
            $saltedPassword = "q#W46^QM".$id.mysqli_real_escape_string($link, $_POST["password"]);

            if(!password_verify($saltedPassword, $row["password"])){

                $error = "Incorrect email and password combination.";
                echo $error;

            } else {

                $_SESSION["id"] = $id;
                echo "1";

            }
        }

    }

}

// sign up
else if($_GET["action"] == "signup"){

    // vaildate user
    if(validate()){

        // check for existing user
        $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_POST["email"]) ."' LIMIT 1";
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) > 0){
            $error = "That email address already exists in the database";
            echo $error;

        } else {

            // create new user
            $query = "INSERT INTO users (`email`, `password`) VALUES ('" . mysqli_real_escape_string($link, $_POST["email"]) ."', '" . mysqli_real_escape_string($link, $_POST["password"]) ."')";

            if(!mysqli_query($link, $query)){

                echo "Could not create user.";

            } else {

                // encrypt password

                $id = mysqli_insert_id($link);
                $enteredPassword = mysqli_real_escape_string($link, $_POST["password"]);

                $password = password_hash("q#W46^QM".$id.$enteredPassword, PASSWORD_DEFAULT);

                $query = "UPDATE users SET password = '".$password."' WHERE id = '".$id."'";

                if(!mysqli_query($link, $query)){
                    echo "Could not encrypt password.";
                    exit();
                }

                $_SESSION["id"] = $id;
                echo "1";

            }

        }

    }

} else if($_GET["action"] == "toggleFollow"){

    // if logged in
    if($_SESSION['id']){

        $query = "SELECT * FROM followers WHERE follower = " . mysqli_real_escape_string($link, $_SESSION['id']) ." AND followee = " . mysqli_real_escape_string($link, $_POST['userId']) . " LIMIT 1";
        $result = mysqli_query($link, $query);
        
        // if already following
        if(mysqli_num_rows($result) > 0){
            
            $row = mysqli_fetch_assoc($result);
            $query = "DELETE FROM followers WHERE id = " . mysqli_real_escape_string($link, $row['id']) . " LIMIT 1";
            mysqli_query($link, $query);
            
            // unfollow successful 
            echo "1";
            
        } else {
            
            $query = "INSERT INTO followers (follower, followee) VALUES ('" . mysqli_real_escape_string($link, $_SESSION['id']) . "', '" . mysqli_real_escape_string($link, $_POST['userId']) . "')";
            mysqli_query($link, $query);
            
            // follow successful 
            echo "0";            
        }

    }

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