<?php

namespace Hepa19\IPGeo;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the IP Validator class
 */
class IPGeoValidatorTest extends TestCase
{
    private $validator;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        $this->validator = new IPGeoValidator();
    }



    /**
     * Test that valid IP returns true
     */
    public function testIsValidTrue()
    {
        $ipAddress = "3.217.12.75";
        $res = $this->validator->isValid($ipAddress);

        $this->assertTrue($res);
    }



    /**
     * Test that invalid IP returns false
     */
    public function testIsValidFalse()
    {
        $ipAddress = "333.217.812.75";
        $res = $this->validator->isValid($ipAddress);

        $this->assertFalse($res);
    }



    /**
     * Test that IPv4 address returns correct protocol
     */
    public function testGetProtocolIPv4()
    {
        $ipAddress = "3.217.12.75";
        $exp = "IPv4";
        $res = $this->validator->getProtocol($ipAddress);

        $this->assertEquals($res, $exp);
    }



    /**
     * Test that IPv6 address returns correct protocol
     */
    public function testGetProtocolIPv6()
    {
        $ipAddress = "2001:db8:0:1:1:1:1:1";
        $exp = "IPv6";
        $res = $this->validator->getProtocol($ipAddress);

        $this->assertEquals($res, $exp);
    }



    /**
     * Test that invalid IP returns null as protocol
     */
    public function testGetProtocolNull()
    {
        $ipAddress = "333.217.812.75";
        $exp = null;
        $res = $this->validator->getProtocol($ipAddress);

        $this->assertEquals($res, $exp);
    }



    /**
     * Test that valid IP returns host
     */
    public function testGetHostValid()
    {
        $ipAddress = "3.217.12.75";
        $exp = "ec2-3-217-12-75.compute-1.amazonaws.com";
        $res = $this->validator->getHost($ipAddress);

        $this->assertEquals($res, $exp);
    }



    /**
     * Test that invalid IP doesn't return host
     */
    public function testGetHostInvalid()
    {
        $ipAddress = "333.217.812.75";
        $exp = null;
        $res = $this->validator->getHost($ipAddress);

        $this->assertEquals($res, $exp);
    }
}
