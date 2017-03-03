<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class AmountDebitTest extends TestCase
{
    /** @test */
    public function it_should_set_the_amount_debit()
    {
        $oTransaction = $this->getTransaction();

        $fAmount = $this->faker->randomFloat(2);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setAmountDebit($fAmount)
        );
        $this->assertEquals(
            $fAmount,
            $oTransaction->oData->AmountDebit
        );
        $this->assertEquals(
            $fAmount,
            $oTransaction->getAmountDebit()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_amount_debit_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getAmountDebit()
        );
    }
}