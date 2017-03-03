<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class OrderTest extends TestCase
{
    /** @test */
    public function it_should_set_the_order()
    {
        $oTransaction = $this->getTransaction();

        $sOrder = $this->faker->uuid;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setOrder($sOrder)
        );
        $this->assertEquals(
            $sOrder,
            $oTransaction->oData->Order
        );
        $this->assertEquals(
            $sOrder,
            $oTransaction->getOrder()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_order_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getOrder()
        );
    }
}