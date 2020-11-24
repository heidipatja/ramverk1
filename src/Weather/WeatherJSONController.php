<?php

/**
 * IP Controller
 */

namespace Hepa19\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for IP validator API
 *
 */
class WeatherJSONController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * Index page
     *
     * @return array
     */
    public function indexActionGet() : array
    {
        $request = $this->di->get("request");
        $location = $request->getGet("location");
        $type = $request->getGet("type");

        if ($type == "past") {
            $weather = $this->di->get("weather");
        } else {
            $weather = $this->di->get("weather_prog");
        }

        if (empty($location)) {
            $ipgetcurrent = $this->di->get("ipgetcurrent");
            $location = $ipgetcurrent->getIP();
        }

        $ipstack = $this->di->get("ipstack");
        $ipstack->setUrl($location);
        $ipstackRes = $ipstack->getData();
        $lon = $ipstackRes["longitude"] ?? null;
        $lat = $ipstackRes["latitude"] ?? null;

        if (!empty($lon) && !empty($lat) && $type == "past") {
            $weather->setUrls($lat, $lon);
            $weatherInfo = $weather->getMultiData($lat, $lon);
            $weatherInfo = $weather->filterPast($weatherInfo);
        } else if (!empty($lon) && !empty($lat) && $type == "future") {
            $weather->setUrl($lat, $lon);
            $weatherInfo = $weather->getData($lat, $lon);
            $weatherInfo = $weather->filterFuture($weatherInfo);
        } else {
            $data = ["status" => 400, "message" => "Hittade inget resultat."];
            return [$data];
        }

        $map = $this->di->get("map");
        $mapLink = $map->getMap($ipstackRes["longitude"], $ipstackRes["latitude"]);

        $data = [
            "location" => $location ?? null,
            "longitude" => $lon ?? null,
            "latitude" => $lat ?? null,
            "weather" => $weatherInfo ?? null,
            "map_link" => $mapLink ?? null
        ];

        return [$data];
    }
}
