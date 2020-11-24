<?php
/**
 * Configuration file for Weather
 */
return [
    // Services to add to the container.
    "services" => [
        "weather_prog" => [
            "shared" => true,
            "callback" => function () {
                $weatherProg = new \Hepa19\Weather\WeatherModel();
                $curl = new \Hepa19\Curl\Curl();
                $cfg = $this->get("configuration");
                $config = $cfg->load("api_weatherprog_config.php");
                $key = $config["config"]["apiKey"] ?? null;
                $baseUrl = $config["config"]["baseUrl"] ?? null;
                $options = $config["config"]["options"] ?? null;
                $weatherProg->setCurl($curl);
                $weatherProg->setApiKey($key);
                $weatherProg->setBaseUrl($baseUrl);
                $weatherProg->setUrlOptions($options);
                return $weatherProg;
            }
        ],
    ],
];
