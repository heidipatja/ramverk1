<?php

/**
 * IP Controller
 */

namespace Hepa19\IPGeo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for IP validator API
 *
 */
class IPGeoJSONController implements ContainerInjectableInterface
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
        $ip = $request->getGet("ip");

        if (empty($ip)) {
            $current = new IPGetCurrent();
            $ip = $current->getIP($request);
        }

        $validator = new IPGeoValidator();
        $valid = $validator->isValid($ip);
        $protocol = $validator->getProtocol($ip);
        $host = $validator->getHost($ip);
        $ipstack = new IPStack();
        $ipstack->setUrl($ip);
        $ipstackRes = $ipstack->getData();
        $map = new OpenStreetMap();
        $mapLink = $map->getMap($ipstackRes["longitude"], $ipstackRes["latitude"]);

        $data = [
            "ip" => $ip,
            "valid" => $valid ?? null,
            "protocol" => $protocol ?? null,
            "host" => $host ?? null,
            "country_name" => $ipstackRes["country_name"] ?? null,
            "city" => $ipstackRes["city"] ?? null,
            "longitude" => $ipstackRes["longitude"] ?? null,
            "latitude" => $ipstackRes["latitude"] ?? null,
            "map_link" => $mapLink ?? null
        ];

        return [$data];
    }
}
