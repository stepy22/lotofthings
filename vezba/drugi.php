<?php

$weather = "";
$error = "";

if (!isset($_GET["submit"])) {
    $_GET['city'] = "";
}
if ($_GET['city']) {


    $urlContents =
        file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($_GET['city']) . ",uk&appid=76d3c4b4bf44a18c350b52953146735c");

    $weatherArray = json_decode($urlContents, true);
    if ($weatherArray['cod'] == 200) {
        $weather = "weather in " . $_GET['city'] . " is " . $weatherArray['weather'][0]['main'] . "' . ";

        $tempereatureinCelcius = $weatherArray['main']['temp'] - 273;
        $windspeed = $weatherArray['wind']['speed'];
        $weather .= "Current temp  " . round($tempereatureinCelcius) . "&#8451; <br> i brzina vetra je " . $windspeed . "m/S";

    } else {
        $error = "Mesto ne postoji";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Weather Scraper</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <style type="text/css">

        html {
            background: url(bac.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {

            background: none;

        }

        .container {

            text-align: center;
            margin-top: 100px;
            width: 450px;

        }

        input {

            margin: 20px 0;

        }

        #weather {

            margin-top:15px;

        }

    </style>

</head>
<body>

<div class="container">

    <h1>What's The Weather?</h1>


<a id="index" href="drugi.php">Index</a>
    <form>
        <fieldset class="form-group">
            <label for="city">Enter the name of a city.</label>
            <input type="text" class="form-control" name='city' id="city" placeholder="Eg. London, Tokyo" value = "<?php  echo $_GET['city']; ?>">
        </fieldset>

        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="weather"><?php

        if ($weather) {

            echo '<div class="alert alert-success" role="alert">
  '.$weather.'
</div>';

        } else if ($error) {

            echo '<div class="alert alert-danger" role="alert">
  '.$error.'
</div>';

        }

        ?></div>
</div>
    

</body>
</html>