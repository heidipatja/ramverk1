<?php
/**
 * Configuration file for Weather
 */
return [
    // Services to add to the container.
    "services" => [
        "weather" => [
            "shared" => true,
            "callback" => function () {
                $weather = new \Hepa19\Weather\WeatherModel();
                $curl = new \Hepa19\Curl\Curl();
                $cfg = $this->get("configuration");
                $config = $cfg->load("api_weather_config.php");
                $key = $config["config"]["apiKey"] ?? null;
                $baseUrl = $config["config"]["baseUrl"] ?? null;
                $options = $config["config"]["options"] ?? null;
                $start = $config["config"]["start"] ?? null;
                $stop = $config["config"]["stop"] ?? null;
                $weather->setCurl($curl);
                $weather->setApiKey($key);
                $weather->setBaseUrl($baseUrl);
                $weather->setUrlOptions($options);
                $weather->setStartStop($start, $stop);
                return $weather;
            }
        ],
    ],
];
