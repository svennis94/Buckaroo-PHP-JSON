<?php namespace SeBuDesign\BuckarooJson\Parts;

use SeBuDesign\BuckarooJson\Partials\Data;

/**
 * Class IpAddress
 *
 * @package SeBuDesign\BuckarooJson\Parts
 *
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

    public function setAddress($sAddress)
    {
        $this->ensureDataObject();

        if (!filter_var($sAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
            // IPv6 Address
            $this->oData->Address = $sAddress;
            $this->setType(self::IPv6);
        } elseif (!filter_var($sAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
            // IPv4 Address
            $this->oData->Address = $sAddress;
            $this->setType(self::IPv4);
        }

        return $this;
    }
}