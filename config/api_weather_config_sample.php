<?php
/**
 * API Keys
 * Input your own key and change file name to api_weather_config.php
 */

return [
    "apiKey" => "putyourownkeyhere",
    "baseUrl" => "https://api.openweathermap.org/data/2.5/onecall/timemachine?",
    "options" => "exclude=minutely,hourly,alerts&lang=sv&units=metric",
    "start" => -5,
    "stop" => -1
];
