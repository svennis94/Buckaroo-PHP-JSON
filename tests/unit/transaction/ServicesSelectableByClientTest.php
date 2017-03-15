<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class ServicesSelectableByClientTest extends TestCase
{
    /** @test */
    public function it_should_set_the_services_selectable_by_client()
    {
        $oTransaction = $this->getTransaction();

        $sServices = $this->faker->words();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setServicesSelectableByClient($sServices)
        );
        $this->assertEquals(
            $sServices,
            $oTransaction->oData->ServicesSelectableByClient
        );
        $this->assertEquals(
            $sServices,
            $oTransaction->getServicesSelectableByClient()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_services_selectable_by_client_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getServicesSelectableByClient()
        );
    }
}