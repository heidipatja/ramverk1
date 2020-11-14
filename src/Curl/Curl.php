<?php

/**
 * Curl model
 */

namespace Hepa19\Curl;

/**
 * Get data via public API
 *
 */
class Curl
{
    /**
     * Function that uses curl and returns response
     *
     * @param string $url API URL to use in curl
     *
     * @return array $res Result in JSON
     */

    public function getData(String $url) : array
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $res = curl_exec($ch);

        curl_close($ch);

        $res = json_decode($res, true);

        return $res;
    }
}
