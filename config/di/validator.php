<?php
/**
 * Configuration file for IPGeoValidator
 */
return [
    // Services to add to the container.
    "services" => [
        "validator" => [
            "shared" => true,
            "callback" => function () {
                $validator = new \Hepa19\IPGeo\IPGeoValidator();
                return $validator;
            }
        ],
    ],
];
