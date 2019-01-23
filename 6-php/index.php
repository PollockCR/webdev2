<?php

$result = false;

$users = array("Cat", "Adrian", "Vivian", "Eva", "Taylor", "Caleb", "Navy", "Elliot", "Emerett");

if ($_POST && array_key_exists("name", $_POST)){

    if (in_array($_POST["name"], $users)){

        $result = "Yay! You have been granted access. Welcome, ".$_POST['name'].".";

    } else {

        $result = $_POST["name"]."... Thou shall not pass!";

    }

}

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

        <h1>Are you one of us?</h1>

        <p>Enter your name: </p>

        <form class="form-inline" method="post">

            <div class="form-group mb-2 mr-2">

                <input type="text" name="name" class="form-control" id="name">

            </div>

            <input type="submit" value="Submit" class="btn btn-primary mb-2">

        </form>

        <p><?php echo ($result ? $result : ""); ?></p>

    </body>

</html>

