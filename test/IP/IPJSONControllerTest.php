<?php

namespace Hepa19\IP;

use Anax\Response\ResponseUtility;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class IPJSONControllerTest extends TestCase
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

        $this->controller = new IPJSONController();
        $this->validator = new IPValidator();

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
    public function testIndexActionGetRequest()
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
    }
}
