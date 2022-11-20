<?php

class API {
    protected string $apiKey; //e6a6d34da4273fdaf713bffd4f494c4e

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getCity($city) {
        $apiURL = "http://api.openweathermap.org/geo/1.0/direct?q=$city&limit=1&appid=$this->apiKey";
        $contents = file_get_contents($apiURL);
        return json_decode($contents, true);
    }
}