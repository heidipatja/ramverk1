<?php

/**
 * Ipstack
 */

namespace Hepa19\IPGeo;

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
     * Set API key
     *
     * @var string $apiKey   API key for weather service
     *
     * @return void.
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    /**
     * Set Base URL
     *
     * @var string $baseUrl   URL for weather service
     *
     * @return void.
     */
    public function setBaseUrl(String $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }



    /**
     * Set curl model
     *
     * @var string $curl   Curl model
     *
     * @return void.
     */
    public function setCurl(Object $curl)
    {
        $this->curl = $curl;
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
