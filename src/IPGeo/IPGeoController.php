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

        if ($ip) {
            $validator = new IPGeoValidator();
            $valid = $validator->isValid($ip);
            $protocol = $validator->getProtocol($ip);
            $host = $validator->getHost($ip);
        }

        $data = [
            "ip" => $ip ?? null,
            "valid" => $valid ?? null,
            "protocol" => $protocol ?? null,
            "host" => $host ?? null
        ];

        $page->add("ip-geo/index", $data);

        if ($ip) {
            $page->add("ip-geo/result", $data);
        }

        $page->add("ip-geo/json", $data);

        return $page->render([
            "title" => $title
        ]);
    }
}
