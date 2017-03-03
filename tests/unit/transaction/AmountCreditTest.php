<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class AmountCreditTest extends TestCase
{
    /** @test */
    public function it_should_set_the_amount_credit()
    {
        $oTransaction = $this->getTransaction();

        $fAmount = $this->faker->randomFloat(2);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setAmountCredit($fAmount)
        );
        $this->assertEquals(
            $fAmount,
            $oTransaction->oData->AmountCredit
        );
        $this->assertEquals(
            $fAmount,
            $oTransaction->getAmountCredit()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_amount_credit_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getAmountCredit()
        );
    }
}