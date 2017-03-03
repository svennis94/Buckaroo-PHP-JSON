<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class CurrencyTest extends TestCase
{
    /** @test */
    public function it_should_set_the_currency()
    {
        $oTransaction = $this->getTransaction();

        $sCurrency = 'EUR';

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setCurrency($sCurrency)
        );
        $this->assertEquals(
            $sCurrency,
            $oTransaction->oData->Currency
        );
        $this->assertEquals(
            $sCurrency,
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