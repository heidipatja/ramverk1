<?php

/**
 * Weather Controller
 */

namespace Hepa19\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for Weather data
 *
 */
class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * Index page
     *
     * @return object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $title = "Väder";
        $request = $this->di->get("request");
        $location = $request->getGet("location");
        $type = $request->getGet("type");

        if ($type == "past") {
            $past = "checked";
        } else {
            $future = "checked";
        }

        if (empty($location)) {
            $ipgetcurrent = $this->di->get("ipgetcurrent");
            $location = $ipgetcurrent->getIP();
            $empty = "no";
        }

        $ipstackRes = $this->getIPData($location);

        $lon = $ipstackRes["longitude"] ?? null;
        $lat = $ipstackRes["latitude"] ?? null;

        if (!empty($lon) && !empty($lat) && $type == "past") {
            $weather = $this->di->get("weather");
            $weather->setUrls($lat, $lon);
            $weatherInfo = $this->getMultiData($weather, $lat, $lon);
        } else if (!empty($lon) && !empty($lat)) {
            $weather = $this->di->get("weather_prog");
            $weather->setUrl($lat, $lon);
            $weatherInfo = $this->getData($weather, $lat, $lon);
        }

        $data = [
            "location" => $location ?? null,
            "longitude" => $lon ?? null,
            "latitude" => $lat ?? null,
            "weather" => $weatherInfo ?? null,
            "checked1" => $future ?? null,
            "checked2" => $past ?? null,
            "empty" => $empty ?? null
        ];

        $page->add("weather/form", $data, "columns-above");
        $page->add("", $data, "main");

        if ($location) {
            $page->add("weather/result", $data, "columns-above");
            $page->add("weather/map", $data, "columns-above");
        }

        return $page->render([
            "title" => $title
        ]);
    }



    /**
     * Get ip data
     *
     */
    public function getIPData($location)
    {
        $ipstack = $this->di->get("ipstack");
        $ipstack->setUrl($location);
        $ipstackRes = $ipstack->getData();

        return $ipstackRes;
    }



    /**
     * Get weather data
     *
     */
    public function getData($weather, $lat, $lon)
    {
        $weatherInfo = $weather->getData($lat, $lon);
        $weatherInfo = $weather->filterFuture($weatherInfo);

        return $weatherInfo;
    }



    /**
     * Get weather data multi
     *
     */
    public function getMultiData($weather, $lat, $lon)
    {
        $weatherInfo = $weather->getMultiData($lat, $lon);
        $weatherInfo = $weather->filterPast($weatherInfo);

        return $weatherInfo;
    }
}
