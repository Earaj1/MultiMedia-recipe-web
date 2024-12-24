<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.css">

    <title>Quick and affordable student recipes – StudentEat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

</head>

<?php
$ch = curl_init();
$location = 'Ipswich';
$apikey = '42d86fa12fb85e4619c74c4099a3fe61';
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/weather?q=' .
    $location . '&appid=' . $apikey);
$output = curl_exec($ch);
curl_close($ch);
$output = json_decode($output, true);

// Retrieve the location name
$location = $output['name'];

// Retrieve main weather data (temperature, pressure, humidity, etc.)
$temp = $output['main']['temp'];
$feels_like = $output['main']['feels_like'];
$temp_min = $output['main']['temp_min'];
$temp_max = $output['main']['temp_max'];
$pressure = $output['main']['pressure'];
$humidity = $output['main']['humidity'];

// Convert temperatures from Kelvin to Celsius
$temp_celsius = $output['main']['temp'] - 273.15;
$feels_like_celsius = $output['main']['feels_like'] - 273.15;
$temp_min_celsius = $output['main']['temp_min'] - 273.15;
$temp_max_celsius = $output['main']['temp_max'] - 273.15;

// Retrieve weather description
$weather_main = $output['weather'][0]['main'];
$weather_description = $output['weather'][0]['description'];

// Wind data
$wind_speed = $output['wind']['speed'];
$wind_deg = $output['wind']['deg'];

// Cloud data
$clouds = $output['clouds']['all'];

// Visibility
$visibility = $output['visibility'];

// Sunrise and sunset times (convert from Unix timestamp to human-readable format)
$sunrise = date('H:i:s', $output['sys']['sunrise']);
$sunset = date('H:i:s', $output['sys']['sunset']);

// Display detailed weather information
echo "<p>The weather in <strong>" . $output['name'] . "</strong> is currently <strong>" . $output['weather'][0]['main'] . "</strong> (" . $output['weather'][0]['description'] . ").</p>";
echo "<p>Temperature: <strong>" . round($temp_celsius, 2) . "°C</strong> (Feels like: " . round($feels_like_celsius, 2) . "°C)</p>";
echo "<p>Min Temp: <strong>" . round($temp_min_celsius, 2) . "°C</strong> | Max Temp: <strong>" . round($temp_max_celsius, 2) . "°C</strong></p>";
echo "<p>Pressure: <strong>" . $pressure . " hPa</strong> | Humidity: <strong>" . $humidity . "%</strong></p>";
echo "<p>Wind Speed: <strong>" . $wind_speed . " m/s</strong> | Wind Direction: <strong>" . $wind_deg . "°</strong></p>";
echo "<p>Cloud Coverage: <strong>" . $clouds . "%</strong></p>";
echo "<p>Visibility: <strong>" . $visibility . " meters</strong></p>";
echo "<p>Sunrise: <strong>" . $sunrise . "</strong> | Sunset: <strong>" . $sunset . "</strong></p>";
?>

<script type="text/javascript" src=".\node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

</body>

</html>