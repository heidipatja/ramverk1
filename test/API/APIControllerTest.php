<?php

namespace Hepa19\API;

use Anax\Response\ResponseUtility;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class APIControllerTest extends TestCase
{
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

        $this->controller = new APIController();

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
     * Test indexActionGet has request future
     */
    public function testIndexActionGetRequestFuture()
    {
        global $di;

        $request = $di->get("request");
        $request->setGet("ip", "123.12.12.123");
        $request->setGet("type", "future");

        $res = $this->controller->indexActionGet();

        $this->assertIsObject($res);

        $this->assertInstanceOf("Anax\Response\Response", $res);
    }



    /**
     * Test indexActionGet has request past
     */
    public function testIndexActionGetRequestPast()
    {
        global $di;

        $request = $di->get("request");
        $request->setGet("ip", "123.12.12.123");
        $request->setGet("type", "past");
        $res = $this->controller->indexActionGet();

        $this->assertIsObject($res);

        $this->assertInstanceOf("Anax\Response\Response", $res);
    }
}
