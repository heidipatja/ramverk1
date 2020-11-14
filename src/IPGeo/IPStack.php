<?php

/**
 * Ipstack
 */

namespace Hepa19\IPGeo;

use Hepa19\Curl\Curl;

/**
 * Get IP data from ipstack
 *
 */
class IPStack
{
    protected $curl;
    protected $baseUrl;
    private $apiKey;
    private $url;

    /**
     * Constructor for ipstack URL
     *
     * @var Curl $curl   Curl model
     * @var string $baseUrl   API base URL
     * @var string $apiKey   API key for ipstack usage
     * @var string $url   Complete url to curl
     */
    public function __construct()
    {
        $this->curl = new Curl();
        $this->baseUrl = "http://api.ipstack.com/";

        $keyFile = require ANAX_INSTALL_PATH . "/config/api_keys.php";
        $this->apiKey = $keyFile["ipstack"] ?? null;
    }



    /**
     * Create complete url to curl
     *
     * @var string $ip   IP address to look up
     * @var string $baseUrl   API base URL
     * @var string $apiKey   API key for ipstack usage
     * @var string $url   Complete url to curl
     *
     * @return void.
     */
    public function setUrl($ip)
    {
        $this->url = $this->baseUrl . $ip . "?access_key=" . $this->apiKey;
    }



    /**
     * Get data from ipstack
     *
     * @var string $url   Complete url to curl
     *
     * @return array $res Result from ipstack API.
     */
    public function getData()
    {
        $res = $this->curl->getData($this->url);

        $res = [
            "city" => $res["city"] ?? null,
            "country_name" => $res["country_name"] ?? null,
            "longitude" => $res["longitude"] ?? null,
            "latitude" => $res["latitude"] ?? null,
        ];

        return $res;
    }
}
