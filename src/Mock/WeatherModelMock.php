<?php

/**
 * Weather Mock
 */

namespace Hepa19\Weather;

/**
 * Mock weather model
 *
 */
class WeatherModelMock extends WeatherModel
{
    /**
     * Mock data for successful curl
     *
     * @return array $res Result
     */
    public function getData()
    {
        $res = [
            "location" => "8.8.8.8",
            "longitude" => -122.074310302734375,
            "latitude" => 37.388019561767578125,
            "weather"  => [
                [
                    "date" => "17/11",
                    "temp" => 14,
                    "wind" => 2,
                    "desc" => "klar himmel",
                    "icon" => "http://openweathermap.org/img/wn/01d@2x.png"
                ],
                [
                    "date" => "18/11",
                    "temp" => 14,
                    "wind" => 6,
                    "desc" => "molnigt",
                    "icon" => "http://openweathermap.org/img/wn/04d@2x.png"
                ],
                [
                    "date" => "19/11",
                    "temp" => 9,
                    "wind" => 1,
                    "desc" => "klar himmel",
                    "icon" => "http://openweathermap.org/img/wn/01d@2x.png"
                ],
                [
                    "date" => "20/11",
                    "temp" =>  7,
                    "wind" =>  2,
                    "desc" => "klar himmel",
                    "icon" => "http://openweathermap.org/img/wn/01d@2x.png"
                ],
                [
                    "date" => "21/11",
                    "temp" => 8,
                    "wind" => 1,
                    "desc" => "klar himmel",
                    "icon" => "http://openweathermap.org/img/wn/01d@2x.png"
                ]
            ],
            "map_link" => "https://www.openstreetmap.org/#map=13/37.388019561768/-122.07431030273"
        ];

        return $res;
    }
}
