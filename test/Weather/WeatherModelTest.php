<?php

namespace Hepa19\Weather;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the IP Validator class
 */
class WeatherModelTest extends TestCase
{
    private $weather;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        $this->weather = new WeatherModel();
    }



    /**
     * Test filter future
     */
    public function testFilterFuture()
    {
        $unfiltered = file_get_contents(ANAX_INSTALL_PATH . "/test/Weather/future.json");

        $unfiltered = json_decode($unfiltered, true);

        $res = $this->weather->filterFuture($unfiltered);

        $exp = [
            [
                "date" => "12/12",
                "temp" => 16,
                "wind" => 3,
                "desc" => "något regn",
                "icon" => "http://openweathermap.org/img/wn/10d@2x.png"
            ],
            [
                "date" => "13/12",
                "temp" => 14,
                "wind" => 2,
                "desc" => "något regn",
                "icon" => "http://openweathermap.org/img/wn/10d@2x.png"
            ],
            [
                "date" => "14/12",
                "temp" => 14,
                "wind" => 2,
                "desc" => "växlande molnighet",
                "icon" => "http://openweathermap.org/img/wn/03d@2x.png"
            ],
            [
                "date" => "15/12",
                "temp" =>  15,
                "wind" =>  2,
                "desc" => "lätt molnighet",
                "icon" => "http://openweathermap.org/img/wn/02d@2x.png"
            ],
            [
                "date" => "16/12",
                "temp" => 17,
                "wind" => 1,
                "desc" => "mulet",
                "icon" => "http://openweathermap.org/img/wn/04d@2x.png"
            ]
        ];

        $this->assertEquals($res, $exp);
    }



    /**
     * Test filter past
     */
    public function testFilterPast()
    {
        $unfiltered = file_get_contents(ANAX_INSTALL_PATH . "/test/Weather/past.json");

        $unfiltered = json_decode($unfiltered, true);

        $res = $this->weather->filterPast($unfiltered);

        $exp = [
            [
                "date" => "07/12",
                "temp" => 4.0,
                "wind" => 2.0,
                "desc" => "dimma",
                "icon" => "http://openweathermap.org/img/wn/50d@2x.png"
            ]
        ];

        $this->assertEquals($res, $exp);
    }
}
