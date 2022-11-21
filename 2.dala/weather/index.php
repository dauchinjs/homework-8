<?php

require_once 'app/API.php';
require_once 'app/Data.php';

$city = readline("Enter city: ");
$apiKey = " ";

$api = new API($apiKey);
$apiData = $api->getCity($city);

$latitude = $apiData[0]["lat"];
$longitude = $apiData[0]["lon"];

$data = new Data($apiKey);
$result = $data->getData($latitude, $longitude); //overall weather data
$result2 = $data->getPollutionData($latitude, $longitude); //air pollution data


$temperature = $result["main"]["temp"];
$weather = $result["weather"][0]["description"];
$wind = $result["wind"]["speed"];
$pollution = $result2["list"][0]["components"]["o3"];


echo "Weather in $city" . PHP_EOL;
echo "Temperature: $temperature degrees Celsius" . PHP_EOL;
echo "Weather: $weather" . PHP_EOL;
echo "Wind: $wind m/s" . PHP_EOL;
echo "Ozone pollution (μg/m3): $pollution" . PHP_EOL;
if($pollution > 0 && $pollution < 60) {
    echo "Pollution is good" . PHP_EOL;
} else if($pollution > 60 && $pollution < 120) {
    echo "Pollution is fair" . PHP_EOL;
}else if($pollution > 120 && $pollution < 180) {
    echo "Pollution is moderate" . PHP_EOL;
}else if($pollution > 180 && $pollution < 240) {
    echo "Pollution is poor" . PHP_EOL;
}else if($pollution > 240) {
    echo "Pollution is very poor" . PHP_EOL;
}
