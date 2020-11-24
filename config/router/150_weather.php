<?php
/**
 * Load the ip validator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "WeatherController",
            "mount" => "weather",
            "handler" => "\Hepa19\Weather\WeatherController",
        ],
    ]
];
