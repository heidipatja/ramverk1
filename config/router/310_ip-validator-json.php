<?php
/**
 * Load the ip validator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IPJSONController",
            "mount" => "ip-json",
            "handler" => "\Hepa19\IP\IPJSONController",
        ],
    ]
];
