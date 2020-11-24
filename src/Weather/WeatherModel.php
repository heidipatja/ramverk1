<?php

/**
 * Weather
 */

namespace Hepa19\Weather;

/**
 * Get weather info
 *
 */
class WeatherModel
{

    protected $curl;
    protected $baseUrl;
    protected $urlOptions;
    protected $start;
    protected $stop;
    private $apiKey;
    private $urls;


    /**
     * Set urls
     *
     * @return void.
     */
    public function setUrls(String $lat, String $lon)
    {
        for ($i = $this->start; $i <= $this->stop; $i++) {
            $timestamp = strtotime("$i days");
            $this->urls[] =
                $this->baseUrl .
                "lat=" . $lat .
                "&lon=" . $lon .
                "&" . $this->urlOptions .
                "&dt=" . $timestamp .
                "&appid=" . $this->apiKey;
        }
    }



    /**
     * Set url singular
     *
     * @return void.
     */
    public function setUrl(String $lat, String $lon)
    {
        $this->urls =
            $this->baseUrl .
            "lat=" . $lat .
            "&lon=" . $lon .
            "&" . $this->urlOptions .
            "&appid=" . $this->apiKey;
    }



    /**
     * Set API key
     *
     * @var string $apiKey   API key for weather service
     *
     * @return void.
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }



    /**
     * Set start and stop for days for looping urls
     *
     * @var integer $start   Starting day for weather
     * @var integer $stop   Stop day for weather
     *
     * @return void.
     */
    public function setStartStop(Int $start, Int $stop)
    {
        $this->start = $start;
        $this->stop = $stop;
    }



    /**
     * Set Base URL
     *
     * @var string $baseUrl   URL for weather service
     *
     * @return void.
     */
    public function setBaseUrl(String $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }



    /**
     * Set URL options
     *
     * @var string $baseUrl   URL options for weather service
     *
     * @return void.
     */
    public function setUrlOptions(String $urlOptions)
    {
        $this->urlOptions = $urlOptions;
    }



    /**
     * Set curl model
     *
     * @var string $curl   Curl model
     *
     * @return void.
     */
    public function setCurl(Object $curl)
    {
        $this->curl = $curl;
    }



    /**
     * Get multi data
     *
     * @var string $url   Complete url to curl
     *
     * @return array $res Result from weather API
     */
    public function getMultiData()
    {
        $res = $this->curl->getMultiData($this->urls);

        return $res;
    }



    /**
     * Get data
     *
     * @var string $url   Complete url to curl
     *
     * @return array $res Result from weather API
     */
    public function getData()
    {
        $res = $this->curl->getData($this->urls);

        return $res;
    }



    /**
     * Filter past weather data
     *
     * @return array $filtered Filtered data.
     */
    public function filterPast(Array $res) : array
    {
        $filtered = [];

        foreach ($res as $day) {
            $filtered[] = [
                "date" => date("d/m", $day["hourly"][11]["dt"]),
                "temp" => round($day["hourly"][11]["temp"]),
                "wind" => round($day["hourly"][11]["wind_speed"]),
                "desc" => $day["hourly"][11]["weather"][0]["description"],
                "icon" => "http://openweathermap.org/img/wn/" .  substr($day["hourly"][11]["weather"][0]["icon"], 0, -1) . "d@2x.png"
            ];
        }

        return $filtered;
    }



    /**
     * Filter upcoming weather data
     *
     * @return array $filtered Filtered data.
     */
    public function filterFuture(Array $res) : array
    {
        $filtered = [];

        foreach (array_slice($res["daily"], 1, 5) as $day) {
            $filtered[] = [
                "date" => date("d/m", $day["dt"]),
                "temp" => round($day["temp"]["day"]),
                "wind" => round($day["wind_speed"]),
                "desc" => $day["weather"][0]["description"],
                "icon" => "http://openweathermap.org/img/wn/" . $day["weather"][0]["icon"] . "@2x.png"
            ];
        }

        return $filtered;
    }
}
