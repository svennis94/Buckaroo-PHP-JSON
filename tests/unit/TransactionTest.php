<?php namespace SeBuDesign\BuckarooJson\Tests;

use GuzzleHttp\Client;
use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class TransactionTest extends TestCase
{
    /** @test */
    public function it_should_be_an_instance_of_transaction()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction
        );
    }

    /** @test */
    public function it_should_have_set_the_right_constructor_properties()
    {
        $oTransaction = $this->getTransaction();

        $this->assertEquals(
            'website-key',
            $this->accessProtectedProperty($oTransaction, 'sWebsiteKey')
        );
        $this->assertEquals(
            'secret-key',
            $this->accessProtectedProperty($oTransaction, 'sSecretKey')
        );
    }

    /** @test */
    public function it_should_have_set_the_right_testing_properties()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $this->accessProtectedProperty($oTransaction, 'bTesting')
        );
        $this->assertEquals(
            'https://checkout.buckaroo.nl/json/',
            $this->accessProtectedProperty($oTransaction, 'sEndpoint')
        );

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->putInTestMode()
        );

        $this->assertTrue(
            $this->accessProtectedProperty($oTransaction, 'bTesting')
        );
        $this->assertEquals(
            'https://testcheckout.buckaroo.nl/json/',
            $this->accessProtectedProperty($oTransaction, 'sEndpoint')
        );
    }

    /** @test */
    public function it_should_have_a_http_client()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Client::class,
            $this->accessProtectedProperty($oTransaction, 'oHttpClient')
        );
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
}