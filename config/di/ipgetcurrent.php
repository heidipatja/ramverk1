<?php
/**
 * Configuration file for IP Current
 */
return [
    // Services to add to the container.
    "services" => [
        "ipgetcurrent" => [
            "shared" => true,
            "callback" => function () {
                $ipgetcurrent = new \Hepa19\IPGeo\IPGetCurrent();
                return $ipgetcurrent;
            }
        ],
    ],
];
