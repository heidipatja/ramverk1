<?php
/**
 * Load the ip validator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IPController",
            "mount" => "ip",
            "handler" => "\Hepa19\IP\IPController",
        ],
    ]
];
