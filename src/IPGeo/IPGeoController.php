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

        $page->add("ip-geo/validation-form", $data);

        if ($ip) {
            $page->add("ip-geo/result", $data);
        }

        $page->add("ip-geo/map", $data);
        $page->add("ip-geo/json", $data);

        return $page->render([
            "title" => $title
        ]);
    }
}
