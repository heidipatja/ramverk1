<?php
/**
 * Load the ip validator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "APIController",
            "mount" => "api",
            "handler" => "\Hepa19\API\APIController",
        ],
    ]
];
