<?php

/**
 * API Controller
 */

namespace Hepa19\Api;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for API page
 *
 */
class APIController implements ContainerInjectableInterface
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
        $title = "Api";
        $request = $this->di->get("request");
        $location = $request->getGet("location");
        $location = $request->getGet("ip");
        $type = $request->getGet("type");

        if ($type == "past") {
            $past = "checked";
        } else {
            $future = "checked";
        }

        if (empty($location)) {
            $ipgetcurrent = $this->di->get("ipgetcurrent");
            $location = $ipgetcurrent->getIP();
        }

        if (empty($ip)) {
            $ipgetcurrent = $this->di->get("ipgetcurrent");
            $ip = $ipgetcurrent->getIP();
        }

        $data = [
            "location" => $location ?? null,
            "checked1" => $future ?? null,
            "checked2" => $past ?? null,
            "ip" => $ip ?? null
        ];

        $page->add("api/json", $data);

        return $page->render([
            "title" => $title
        ]);
    }
}
