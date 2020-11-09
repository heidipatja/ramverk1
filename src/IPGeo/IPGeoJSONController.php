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

        if ($ip) {
            $validator = new IPValidator();
            $valid = $validator->isValid($ip);
            $protocol = $validator->getProtocol($ip);
            $host = $validator->getHost($ip);
        }

        $data = [
            "ip" => $ip,
            "valid" => $valid ?? null,
            "protocol" => $protocol ?? null,
            "host" => $host ?? null
        ];

        return [$data];
    }
}
