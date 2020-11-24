<?php
/**
 * Configuration file for IPGeoValidator
 */
return [
    // Services to add to the container.
    "services" => [
        "map" => [
            "shared" => true,
            "callback" => function () {
                $map = new \Hepa19\IPGeo\OpenStreetMap();
                return $map;
            }
        ],
    ],
];
