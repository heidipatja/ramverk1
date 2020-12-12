<?php

/**
 * Weather Mock
 */

namespace Hepa19\Weather;

use Hepa19\Weather\WeatherModelMock;
use Hepa19\IPGeo\IPStackMock;

/**
 * Mock weather model
 *
 */
class WeatherControllerMock extends WeatherController
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



    /**
     * Get weather data
     *
     * @return object
     */
    public function getData($weather, $lat, $lon)
    {
        $weather = new WeatherModelMock();
        $weatherInfo = $weather->getData($lat, $lon);

        return $weatherInfo;
    }



    /**
     * Get weather data multi
     *
     * @return object
     */
    public function getMultiData($weather, $lat, $lon)
    {
        $weather = new WeatherModelMock();
        $weatherInfo = $weather->getData($lat, $lon);

        return $weatherInfo;
    }
}
