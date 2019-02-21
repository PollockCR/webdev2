<?php

    include("functions.php");

    if($_GET["action"] == "login"){
        print_r($_POST);
    }
    else if($_GET["action"] == "signup"){
        print_r($_POST);
    }

?>