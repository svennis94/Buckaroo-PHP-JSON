<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\IpAddress;
use SeBuDesign\BuckarooJson\Transaction;

class IpAddressTest extends TestCase
{
    public function it_should_be_an_instance_of_ip_address()
    {
        $oIpAddress = $this->getIpAddress();

        $this->assertInstanceOf(
            IpAddress::class,
            $oIpAddress
        );
    }

    /** @test */
    public function it_should_set_the_ipv4_address_and_type()
    {
        $oIpAddress = $this->getIpAddress();

        $sIpAddress = $this->faker->ipv4;

        $this->assertInstanceOf(
            IpAddress::class,
            $oIpAddress->setAddress($sIpAddress)
        );
        $this->assertEquals(
            $sIpAddress,
            $oIpAddress->oData->Address
        );
        $this->assertEquals(
            $sIpAddress,
            $oIpAddress->getAddress()
        );
        $this->assertEquals(
            IpAddress::IPv4,
            $oIpAddress->oData->Type
        );
        $this->assertEquals(
            IpAddress::IPv4,
            $oIpAddress->getType()
        );
    }

    /** @test */
    public function it_should_set_the_ipv6_address_and_type()
    {
        $oIpAddress = $this->getIpAddress();

        $sIpAddress = $this->faker->ipv6;

        $this->assertInstanceOf(
            IpAddress::class,
            $oIpAddress->setAddress($sIpAddress)
        );
        $this->assertEquals(
            $sIpAddress,
            $oIpAddress->oData->Address
        );
        $this->assertEquals(
            $sIpAddress,
            $oIpAddress->getAddress()
        );
        $this->assertEquals(
            IpAddress::IPv6,
            $oIpAddress->oData->Type
        );
        $this->assertEquals(
            IpAddress::IPv6,
            $oIpAddress->getType()
        );
    }

    /** @test */
    public function it_should_add_an_ip_address_to_the_transaction()
    {
        $oTransaction = $this->getTransaction();

        $sIpAddress = $this->faker->ipv4;
        $oIpAddress = $this->getIpAddress();
        $oIpAddress->setAddress($sIpAddress);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setClientIP($oIpAddress)
        );
        $this->assertInstanceOf(
            IpAddress::class,
            $oTransaction->getClientIP()
        );
        $this->assertEquals(
            $sIpAddress,
            $oTransaction->getClientIP()->getAddress()
        );
        $this->assertEquals(
            IpAddress::IPv4,
            $oTransaction->getClientIP()->getType()
        );
    }
}