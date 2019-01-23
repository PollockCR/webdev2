<html>

    <head>

        <title>Prime Checker</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css" type="text/css">

    </head>

    <body>

        <h1>Is it prime?</h1>

        <p>Enter a number: </p>

        <form class="form-inline">

            <div class="form-group">

                <input type="number" name="number" class="form-control" min="1">

            </div>

            <input type="submit" value="Submit" class="btn btn-primary ml-2">

        </form>

    </body>

</html>

<?php

function isPrime ($number) {

    if ($number == 1 || $number == 2){

        return 1;

    }

    if ($number <= 0 || $number % 2 == 0){

        return 0;

    }

    for ($i = 3; $i <= sqrt($number); $i = $i + 2){

        if ($number % $i == 0){

            return 0;

        }

    }

    return 1;

}

if ($_GET && array_key_exists("number", $_GET)){
    
    
    if ($_GET["number"] == 1){
        
        echo "The number 1 is neither prime nor composite (as it is the multiplicative identity).";
        
    } else if ($_GET["number"] <= 0 || $_GET["number"] % 1.00 !== 0.00 ){
        
        echo "The terms prime and composite are terms reserved specifically for <strong>positive integers</strong>.";
        
    } else if (isPrime($_GET["number"])){

        echo $_GET["number"]." is <strong>prime</strong>!";

    } else {

        echo $_GET["number"]." is <strong>NOT prime</strong>!";

    }

}

?>