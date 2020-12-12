<?php

/**
 * Ipstack
 */

namespace Hepa19\IPGeo;

/**
 * Get IP data from ipstack
 *
 */
class IPStackMock extends IPStack
{
    /**
     * Get mocked data from ipstack
     *
     * @return array $res Mocked result from ipstack.
     */
    public function getData()
    {
        $res = [
            "city" => "Mountain View",
            "country_name" => "United States",
            "longitude" => "-122.07431030273",
            "latitude" => "37.388019561768",
        ];

        return $res;
    }
}
