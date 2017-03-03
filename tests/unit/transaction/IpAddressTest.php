<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\IpAddress;
use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Parts\IpAddress
 */
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
    public function it_should_set_the_ip_address()
    {
        $oIpAddress = $this->getIpAddress();

        $this->assertInstanceOf(
            IpAddress::class,
            $oIpAddress->setAddress('127.0.0.1')
        );
        $this->assertEquals(
            '127.0.0.1',
            $oIpAddress->oData->Address
        );
        $this->assertEquals(
            '127.0.0.1',
            $oIpAddress->getAddress()
        );
    }

    /** @test */
    public function it_should_set_the_ip_address_type_ipv4()
    {
        $oIpAddress = $this->getIpAddress();

        $this->assertInstanceOf(
            IpAddress::class,
            $oIpAddress->setType(IpAddress::IPv4)
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
    public function it_should_set_the_ip_address_type_ipv6()
    {
        $oIpAddress = $this->getIpAddress();

        $this->assertInstanceOf(
            IpAddress::class,
            $oIpAddress->setType(IpAddress::IPv6)
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

        $oIpAddress = $this->getIpAddress();
        $oIpAddress->setAddress('127.0.0.1');
        $oIpAddress->setType(IpAddress::IPv4);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setClientIP($oIpAddress)
        );
        $this->assertInstanceOf(
            IpAddress::class,
            $oTransaction->getClientIP()
        );
        $this->assertEquals(
            '127.0.0.1',
            $oTransaction->getClientIP()->getAddress()
        );
        $this->assertEquals(
            IpAddress::IPv4,
            $oTransaction->getClientIP()->getType()
        );
    }
}