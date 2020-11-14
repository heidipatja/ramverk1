<?php

namespace Hepa19\IPGeo;

use Anax\Response\ResponseUtility;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class IPGeoControllerTest extends TestCase
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

        $this->controller = new IPGeoController();
        $this->validator = new IPGeoValidator();

        $_SERVER["REMOTE_ADDR"] = "127.0.0.1";

        $this->controller->setDi($di);
    }

    /**
     * Test indexActionGet page
     */
    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();

        $this->assertIsObject($res);

        $this->assertInstanceOf("Anax\Response\Response", $res);
    }



    /**
     * Test indexActionGet has request
     */
    public function testIndexActionGetRequest()
    {
        global $di;

        $request = $di->get("request");
        $request->setGet("ip", "123.12.12.123");
        $res = $this->controller->indexActionGet();

        $this->assertIsObject($res);

        $this->assertInstanceOf("Anax\Response\Response", $res);
    }
}
