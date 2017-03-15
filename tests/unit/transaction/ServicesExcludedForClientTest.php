<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class ServicesExcludedForClientTest extends TestCase
{
    /** @test */
    public function it_should_set_the_services_services_excluded_for_client()
    {
        $oTransaction = $this->getTransaction();

        $sServices = $this->faker->words();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setServicesExcludedForClient($sServices)
        );
        $this->assertEquals(
            $sServices,
            $oTransaction->oData->ServicesExcludedForClient
        );
        $this->assertEquals(
            $sServices,
            $oTransaction->getServicesExcludedForClient()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_services_services_excluded_for_client_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getServicesExcludedForClient()
        );
    }
}