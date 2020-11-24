<?php
/**
 * Configuration file for Curl
 */
return [
    // Services to add to the container.
    "services" => [
        "curl" => [
            "shared" => true,
            "callback" => function () {
                $curl = new \Hepa19\Curl\Curl();
                return $curl;
            }
        ],
    ],
];
