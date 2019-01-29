<?php 

session_start();

$email = "";

$diary = "";

$feedback = "";

include("secrets.php");

$username = USERNAME;

$password = PASSWORD;

$link = mysqli_connect("shareddb-m.hosting.stackcp.net", $username, $password, $username);

if (mysqli_connect_error()){

    die ("Error: The database could not be accessed.");

}

if ($_POST && array_key_exists("log-out", $_POST) && $_POST["log-out"]){

    header("Location: index.php?log-out=1");

} else if ($_SESSION && array_key_exists("email", $_SESSION)){

    $email = $_SESSION["email"];

    if($_POST && array_key_exists("diary", $_POST)){

        $diary = mysqli_real_escape_string($link, $_POST["diary"]);

        $query = "UPDATE `users` SET `diary` = '".$diary."' WHERE `email` = '".$email."'";

        $result = mysqli_query($link, $query);

        if(!$result){

            $feedback = '<div class="alert alert-danger mt-3" role="alert">An error occured while saving your diary.</div>';

        }

    } else {

        $query = "SELECT `diary` FROM `users` WHERE `email` = '".$email."'";

        $result = mysqli_query($link, $query);

        if ($result->num_rows != 0){

            $row = mysqli_fetch_row($result);

            $diary = mysqli_real_escape_string($link, $row['0']);

        } else {

            $feedback = '<div class="alert alert-danger mt-3" role="alert">An error occured while loading your diary.</div>';

        }

    }

} else {

    header("Location: index.php");

} 

?>

<html>

    <head>

        <title>Secret Diary</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="style.css">

    </head>

    <body>

        <div class="container">

            <div class="mt-3">

                <span class="text-light align-middle">Welcome, <?php echo $email ?>! Enter your deepest, darkest thoughts... I'll keep them safe and sound.</span>

                <form method="post" class="form-inline float-right">

                    <input type="hidden" name="log-out" value="1">

                    <input type="submit" class="btn btn-secondary" value="Log Out" name="sign-out">

                </form>

            </div>

            <?php echo $feedback ?>

            <form method="post" id="target">

                <textarea class="form-control" id="diary" name="diary" rows="30"><?php echo $diary ?></textarea>

            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <script type="text/javascript">

            $("#diary").change( function () {

                $("#target").submit();

            });

        </script>

    </body>

</html>

