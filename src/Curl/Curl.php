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

    public function getData(String $url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($res, true);

        return $res;
    }



    /**
     * Function that uses multiple curls and returns response
     *
     * @param array $urls API URLs to use in curls
     *
     * @return array $res Result in JSON
     */
    public function getMultiData(Array $urls)
    {
        $mh = curl_multi_init();

        $chArray = [];

        foreach ($urls as $url) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_multi_add_handle($mh, $ch);
            array_push($chArray, $ch);
        }

        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);

        $res = [];

        foreach ($chArray as $ch) {
            $response = curl_multi_getcontent($ch);
            $res[] = json_decode($response, true);
        }

        return $res;
    }
}
