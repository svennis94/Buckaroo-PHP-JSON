<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class CurrencyTest extends TestCase
{
    /** @test */
    public function it_should_set_the_currency()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setCurrency('EUR')
        );
        $this->assertEquals(
            'EUR',
            $oTransaction->oData->Currency
        );
    }

    /** @test */
    public function it_should_get_the_currency()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setCurrency('EUR')
        );
        $this->assertEquals(
            'EUR',
            $oTransaction->getCurrency()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_currency_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getCurrency()
        );
    }
}