<?php

namespace Hepa19\IPGeo;

use Anax\Response\ResponseUtility;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class IPGeoJSONControllerTest extends TestCase
{
    private $validator;
    private $controller;

    /**
     * Setup test
     */
    protected function setUp() : void
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        $this->controller = new IPGeoJSONControllerMock();
        $this->validator = new IPGeoValidator();

        $request = $di->get("request");
        $request->setServer("REMOTE_ADDR", "127.0.0.1");

        $this->controller->setDi($di);
    }

    /**
     * Test indexActionGet page
     */
    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();

        $this->assertIsArray($res);
    }



    /**
     * Test indexActionGet has request and returns array with correct keys
     */
    public function testIndexActionGetRequestIPv4()
    {
        global $di;

        $request = $di->get("request");
        $request->setGet("ip", "123.12.12.123");
        $res = $this->controller->indexActionGet();

        $this->assertIsArray($res);

        $this->assertArrayHasKey("ip", $res[0]);
        $this->assertArrayHasKey("valid", $res[0]);
        $this->assertArrayHasKey("protocol", $res[0]);
        $this->assertArrayHasKey("host", $res[0]);
        $this->assertArrayHasKey("country_name", $res[0]);
        $this->assertArrayHasKey("city", $res[0]);
        $this->assertArrayHasKey("longitude", $res[0]);
        $this->assertArrayHasKey("latitude", $res[0]);
    }



    /**
     * Test indexActionGet has request and returns array with correct keys
     */
    public function testIndexActionGetRequestIPv6()
    {
        global $di;

        $request = $di->get("request");
        $request->setGet("ip", "2001:db8:0:1:1:1:1:1");
        $res = $this->controller->indexActionGet();

        $this->assertIsArray($res);

        $this->assertArrayHasKey("ip", $res[0]);
        $this->assertArrayHasKey("valid", $res[0]);
        $this->assertArrayHasKey("protocol", $res[0]);
        $this->assertArrayHasKey("host", $res[0]);
        $this->assertArrayHasKey("country_name", $res[0]);
        $this->assertArrayHasKey("city", $res[0]);
        $this->assertArrayHasKey("longitude", $res[0]);
        $this->assertArrayHasKey("latitude", $res[0]);
    }
}
