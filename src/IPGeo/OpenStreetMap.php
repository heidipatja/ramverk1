<?php

/**
 * OpenStreetMap link
 */

namespace Hepa19\IPGeo;

/**
 * Get link to Open Street Map based on IP address
 *
 */
class OpenStreetMap
{
    /**
     * Get OpenStreetMap URL
     *
     * @var float $longitude   Longitude
     * @var float $latitude   Latitude
     *
     * @return string|void
     */

    public function getMap($longitude, $latitude)
    {
        if (!empty($longitude) && !empty($latitude)) {
            $link = "https://www.openstreetmap.org/#map=13/$latitude/$longitude";
            return $link;
        }
    }
}
