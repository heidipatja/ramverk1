<?php

/**
 * IPGeoControllerMock
 */


namespace Hepa19\IPGeo;

/**
 * Mock weather model
 *
 */
class IPGeoControllerMock extends IPGeoController
{
    /**
     * Get weather data
     *
     */
    public function getIPData($location)
    {
        $ipstack = new IPStackMock();
        $ipstack->setUrl($location);
        $ipstackRes = $ipstack->getData($location);

        return $ipstackRes;
    }
}
