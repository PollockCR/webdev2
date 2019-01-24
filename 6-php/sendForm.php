<?php

$error = "";
$success = "";

if($_POST){

    if(!$_POST["email"]){

        $error .= "<br>An email address is required.";

    } else {

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $error .= "<br>The email address is invalid.";

        }
    }

    if(!$_POST["subject"]){

        $error .= "<br>The subject field is required.";

    }

    if(!$_POST["content"]){

        $error .= "<br>The content field is required.";

    }

    if($error != ""){

        $error = '<div class="alert alert-danger" role="alert"><strong>There are error(s) in your form:</strong>'.$error.'</div>';

    } else {

        $emailTo = "armyswag@armyspy.com";
        $headers = "From: ".$_POST["email"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];

        if($result = mail($emailTo, $subject, $content, $headers)){
            
            $success = '<div class="alert alert-success" role="alert">Your message was sent. We will get back to you soon!</div>';
            
        } else {
            
            $error = "An error occured while sending your message.";
            
        }

    }

}

?>