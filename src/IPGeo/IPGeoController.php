<?php

/**
 * IP Controller
 */

namespace Hepa19\IPGeo;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for IP validator
 *
 */
class IPGeoController implements ContainerInjectableInterface
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
        $title = "Validera IP-adress";
        $request = $this->di->get("request");
        $ip = $request->getGet("ip");

        if (empty($ip)) {
            $ipgetcurrent = $this->di->get("ipgetcurrent");
            $ip = $ipgetcurrent->getIP();
        }

        $validator = $this->di->get("validator");
        $valid = $validator->isValid($ip);
        $protocol = $validator->getProtocol($ip);
        $host = $validator->getHost($ip);
        $ipstackRes = $this->getIPData($ip);

        $data = [
            "ip" => $ip ?? null,
            "valid" => $valid ?? null,
            "protocol" => $protocol ?? null,
            "host" => $host ?? null,
            "longitude" => $ipstackRes["longitude"] ?? null,
            "latitude" => $ipstackRes["latitude"] ?? null,
            "city" => $ipstackRes["city"] ?? null,
            "country_name" => $ipstackRes["country_name"] ?? null,
        ];

        $page->add("ip-geo/form", $data);

        if ($ip) {
            $page->add("ip-geo/result", $data);
        }

        $page->add("ip-geo/map", $data);

        return $page->render([
            "title" => $title
        ]);
    }

    /**
     * Get ip data
     *
     */
    public function getIPData($ip)
    {
        $ipstack = $this->di->get("ipstack");
        $ipstack->setUrl($ip);
        $ipstackRes = $ipstack->getData();

        return $ipstackRes;
    }
}
