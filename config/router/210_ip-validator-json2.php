<?php
/**
 * Load the ip validator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IPJSONController",
            "mount" => "ip-geo-json",
            "handler" => "\Hepa19\IPGeo\IPJSONController",
        ],
    ]
];
