<?php

namespace Hepa19\Weather;

use Anax\Response\ResponseUtility;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class WeatherControllerTest extends TestCase
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

        $this->controller = new WeatherController();

        $this->controller->setDi($di);
    }

    /**
     * Test indexActionGet page
     */
    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();

        $this->assertIsObject($res);
    }



    /**
     * Test indexActionGet has request past
     */
    public function testIndexActionGetPast()
    {
        global $di;

        $request = $di->get("request");
        $request->setGet("location", "123.12.12.123");
        $request->setGet("type", "past");
        $res = $this->controller->indexActionGet();

        $this->assertIsObject($res);
    }



    /**
     * Test indexActionGet has request future
     */
    public function testIndexActionGetFuture()
    {
        global $di;

        $request = $di->get("request");
        $request->setGet("location", "123.12.12.123");
        $request->setGet("type", "future");
        $res = $this->controller->indexActionGet();

        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
    }
}
