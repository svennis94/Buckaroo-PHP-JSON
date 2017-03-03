<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\IpAddress;
use SeBuDesign\BuckarooJson\Transaction;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * Set a protected property public to test it's value
     *
     * @param object $object   The object to check
     * @param string $property The protected property
     *
     * @return mixed
     */
    protected function accessProtectedProperty($object, $property)
    {
        $reflection = new \ReflectionClass($object);

        $property = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * Get a new transaction
     *
     * @return Transaction
     */
    protected function getTransaction()
    {
        return new Transaction('website-key', 'secret-key');
    }

    /**
     * Get a new Ip Address
     *
     * @return IpAddress
     */
    protected function getIpAddress()
    {
        return new IpAddress();
    }
}