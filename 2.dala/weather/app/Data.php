<?php

class Data extends API {
    public function getData($lat, $lon) {
        $apiURL = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$this->apiKey&units=metric";
        $data = file_get_contents($apiURL);
        return json_decode($data, true);
    }
    public function getPollutionData($lat, $lon) {
        $apiURL = "http://api.openweathermap.org/data/2.5/air_pollution/forecast?lat=$lat&lon=$lon&appid=$this->apiKey";
        $pollutionInfo = file_get_contents($apiURL);
        return json_decode($pollutionInfo, true);
    }
}