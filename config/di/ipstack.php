<?php
/**
 * Configuration file for IPStack
 */
return [
    // Services to add to the container.
    "services" => [
        "ipstack" => [
            "shared" => true,
            "callback" => function () {
                $ipstack = new \Hepa19\IPGeo\IPStack();
                $curl = new \Hepa19\Curl\Curl();
                $cfg = $this->get("configuration");
                $config = $cfg->load("api_ip_config.php");
                $key = $config["config"]["apiKey"] ?? null;
                $baseUrl = $config["config"]["baseUrl"] ?? null;
                $ipstack->setCurl($curl);
                $ipstack->setApiKey($key);
                $ipstack->setBaseUrl($baseUrl);
                return $ipstack;
            }
        ],
    ],
];
