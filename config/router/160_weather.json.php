<?php
/**
 * Load the ip validator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "WeatherJSONController",
            "mount" => "weather-json",
            "handler" => "\Hepa19\Weather\WeatherJSONController",
        ],
    ]
];
