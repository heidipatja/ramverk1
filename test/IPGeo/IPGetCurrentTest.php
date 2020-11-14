<?php

namespace Hepa19\IPGeo;

use Anax\Response\ResponseUtility;
use Anax\DI\DIMagic;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the IP Validator class
 */
class IPGetCurrentTest extends TestCase
{
    private $current;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        global $di;

        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $this->current = new IPGetCurrent();
    }



    /**
     * Test that valid IP returns true
     */
    public function testREMOTEADDR()
    {
        $ip = "123.12.12.123";
        $_SERVER["REMOTE_ADDR"] = "123.12.12.123";

        $res = $this->current->getIP();

        $this->assertEquals($ip, $res);
    }



    /**
     * Test that valid IP returns true
     */
    public function testHTTPCLIENTIP()
    {
        $ip = "123.12.12.123";
        $_SERVER["HTTP_CLIENT_IP"] = "123.12.12.123";

        $res = $this->current->getIP();

        $this->assertEquals($ip, $res);
    }
}
