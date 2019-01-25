<?php 

$weather = "";

if($_GET && array_key_exists("city", $_GET)){

    $city = str_replace(" ", "-", $_GET["city"]);

    $weather = file_get_contents("https://www.weather-forecast.com/locations/$city/forecasts/latest");

    $city = ucwords($_GET["city"]);

    if(!$weather){


        $weather = '<div class="alert alert-danger" role="alert">The city '.$city.' could not be found. Please try again.</div>';

    } else {

        $weather = strstr($weather,'<span class="phrase">');

        $weather = strstr($weather, '</p>', true);

        $weather = '<div class="alert alert-secondary" role="alert"><strong>'.$city."</strong> weather today: ".$weather.'</div>';

    }

}

?>

<html>

    <head>

        <title>Weather Scraper</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="style.css">

    </head>

    <body>

        <div class="container-flex">

            <div class="d-flex justify-content-center">

                <h1 class="text-light">What's the Weather?</h1>

            </div>

            <div class="d-flex justify-content-center">

                <p class="text-light">Enter the name of a city.</p>

            </div>

            <div class="d-flex justify-content-center mt-3">

                <form class="form-inline">

                    <label class="sr-only" for="city">City</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="city" id="city" placeholder="e.g. Paris">

                    <button type="submit" class="btn btn-primary mb-2">Submit</button>

                </form>

            </div>

            <div class="col-sm-8 mx-auto">

                <?php 

                echo $weather;

                ?>

            </div>

            <div id="credits">
                
                <a href="https://unsplash.com/@jhonkasalo?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Joakim Honkasalo" class="credit"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Joakim Honkasalo</span></a>   

                <a href="https://www.weather-forecast.com/" target="_blank" rel="noopener noreferrer" title="Weather Forecast" class="credit"><span style="display:inline-block;padding:2px 3px"><i class="fas fa-sun"></i> Weather Forecast</span></a>                

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <script src="javascript.js"></script>

    </body>

</html>

