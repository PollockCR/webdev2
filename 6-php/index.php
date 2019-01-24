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


<html>

    <head>

        <title>Contact Us</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    </head>

    <body>

        <div class="container">

            <h1>Get in touch!</h1>

            <div id="success"><?php echo $success ?></div>

            <div id="error"><?php echo $error ?></div>

            <form id="target" method="post">

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>

                <div class="form-group">
                    <label for="content">How can we help you?</label>
                    <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                </div>

                <button type="submit" id="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <script src="javascript.js"></script>

    </body>

</html>

