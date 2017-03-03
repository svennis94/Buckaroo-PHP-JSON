<?php namespace SeBuDesign\BuckarooJson\Parts;

use SeBuDesign\BuckarooJson\Partials\Data;

/**
 * Class IpAddress
 *
 * @package SeBuDesign\BuckarooJson\Parts
 *
 * @method $this setAddress(string $sAddress)
 * @method string|boolean getAddress()
 *
 * @method $this setType(integer $iType)
 * @method string|boolean getType()
 */
class IpAddress
{
    use Data;

    const IPv4 = 0;
    const IPv6 = 1;
}