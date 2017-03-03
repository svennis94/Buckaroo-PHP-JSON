<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class AmountDebitTest extends TestCase
{
    /** @test */
    public function it_should_set_the_amount_credit()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setAmountDebit(0.01)
        );
        $this->assertEquals(
            0.01,
            $this->accessProtectedProperty($oTransaction, 'aData')['AmountDebit']
        );
    }

    /** @test */
    public function it_should_get_the_amount_credit()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setAmountDebit(0.01)
        );
        $this->assertEquals(
            0.01,
            $oTransaction->getAmountDebit()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_amount_credit_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getAmountDebit()
        );
    }
}