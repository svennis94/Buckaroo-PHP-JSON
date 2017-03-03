<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class DescriptionTest extends TestCase
{
    /** @test */
    public function it_should_set_the_amount_credit()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setDescription(0.01)
        );
        $this->assertEquals(
            0.01,
            $this->accessProtectedProperty($oTransaction, 'aData')['Description']
        );
    }

    /** @test */
    public function it_should_get_the_amount_credit()
    {
        $oTransaction = $this->getTransaction();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setDescription(0.01)
        );
        $this->assertEquals(
            0.01,
            $oTransaction->getDescription()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_amount_credit_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getDescription()
        );
    }
}