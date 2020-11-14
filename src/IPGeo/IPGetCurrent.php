<?php

/**
 * Get IP address of current user
 */

namespace Hepa19\IPGeo;

/**
 * Get IP of current user
 *
 */
class IPGetCurrent
{
    /**
     * Returns user's current IP address
     *
     * @return string $currentIP User's IP address
     */

    public function getIP() : string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $currentIP = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $currentIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $currentIP = $_SERVER['REMOTE_ADDR'];
        }
        return $currentIP;
    }
}
