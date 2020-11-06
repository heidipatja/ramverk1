<?php

/**
 * IP Validator
 */

namespace Hepa19\IP;

/**
 * Validate IP Addresses
 *
 */
class IPValidator
{
    /**
     * Returns if ip is valid
     *
     * @return bool
     */
    public function isValid($ip) : bool
    {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        }
        return false;
    }



    /**
     * Returns if ip is IPv4 or IPv6
     *
     * @return string|null
     */
    public function getProtocol($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "IPv4";
        } else if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "IPv6";
        }
        return null;
    }



    /**
     * Returns host
     *
     * @return string|void
     */
    public function getHost($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return gethostbyaddr($ip);
        }
    }
}
