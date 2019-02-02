<?php 

$weather = "";

$city = "";

$key = "c603eab657a8b20f5b7c7479c265c2d8";

if($_GET && array_key_exists("city", $_GET)){

    $file_headers = "";

    $city = ucwords($_GET["city"]);

    $file_headers = @get_headers("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=c603eab657a8b20f5b7c7479c265c2d8");

    if(!$file_headers || (isset($file_headers[0]) && strpos($file_headers[0],"404"))) {

        $weather = '<div class="alert alert-danger" role="alert">The city '.$city.' could not be found. Please try again.</div>';

    } else {

        $weatherArray = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=c603eab657a8b20f5b7c7479c265c2d8");

        $weatherArray = json_decode($weatherArray, true);

        $weather = "<strong>$city Weather</strong>";

        $weather .= "<br>Currently: ".$weatherArray["weather"][0]["description"];

        $tempCelcius = round($weatherArray["main"]["temp"] - 273.15);

        $tempFarenheit = round($weatherArray["main"]["temp"] * 9 / 5 - 459.67);

        $weather .= "<br>Temperature: ".$tempCelcius."&deg;C | ".$tempFarenheit."&deg;F";

        $windMS = round($weatherArray["wind"]["speed"]);

        $windMPH = round($weatherArray["wind"]["speed"] * 2.23694);

        $weather .= "<br>Wind: ".$windMS." m/s | ".$windMPH." mph";
        
        $weather = '<div class="alert alert-secondary" role="alert">'.$weather.'</div>';

    }

}

function getMinMaxTemp(){

    $tempMinCelcius = round($weatherArray["main"]["temp_min"] - 273.15);

    $tempMinFarenheit = round($weatherArray["main"]["temp_min"] * 9 / 5 - 459.67);

    $weather .= "<br>Min: ".$tempMinCelcius."&deg;C | ".$tempMinFarenheit."&deg;F";

    $tempMaxCelcius = round($weatherArray["main"]["temp_max"] - 273.15);

    $tempMaxFarenheit = round($weatherArray["main"]["temp_max"] * 9 / 5 - 459.67);

    $weather .= "<br>Max: ".$tempMaxCelcius."&deg;C | ".$tempMaxFarenheit."&deg;F";

}

?>

<html>

    <head>

        <title>What's the Weather?</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="style.css">

    </head>

    <body>

        <div class="container text-center text-light">

            <h1>What's the Weather?</h1>

            <p class="mb-3">Enter the name of a city.</p>

            <div class="container">

                <form class="form-inline">

                    <div class="form-group row mx-auto">

                        <label class="sr-only" for="city">City</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" name="city" id="city" placeholder="e.g. Paris" value= "<?php echo $city; ?>">

                        <input type="submit" class="btn btn-primary mb-2" value="Submit">

                    </div>

                </form>

            </div>

            <div class="container">

                <div class="col-sm-5 mx-auto">

                    <?php 

                    print_r($weather);

                    ?>

                </div>

            </div>

        </div>

        <div id="credits">

            <a href="https://unsplash.com/@jhonkasalo?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Joakim Honkasalo" class="credit"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Joakim Honkasalo</span></a>   

            <a href="https://www.weather-forecast.com/" target="_blank" rel="noopener noreferrer" title="Weather Forecast" class="credit"><span style="display:inline-block;padding:2px 3px"><i class="fas fa-sun"></i> Weather Forecast</span></a>                

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <script src="javascript.js"></script>

    </body>

</html>

