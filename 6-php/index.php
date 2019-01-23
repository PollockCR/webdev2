<?php

$emailTo = "armyswag@armyspy.com";

$subject = "I hope this works";

$body = "This is some interesting email content.";

$headers = "From: milkshake@theyard.com";

$result = mail($emailTo, $subject, $body, $headers);

?>


<html>

    <head>

        <title></title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css" type="text/css">

    </head>

    <body>

        <?php 
        
            echo ($result ? "Email sent succesfully" : "Email not sent");

        ?>

    </body>

</html>

