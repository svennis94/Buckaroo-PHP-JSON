<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class OriginalTransactionKeyTest extends TestCase
{
    /** @test */
    public function it_should_set_the_original_transaction_key()
    {
        $oTransaction = $this->getTransaction();

        $sTransactionKey = $this->faker->uuid;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setOriginalTransactionKey($sTransactionKey)
        );
        $this->assertEquals(
            $sTransactionKey,
            $oTransaction->oData->OriginalTransactionKey
        );
        $this->assertEquals(
            $sTransactionKey,
            $oTransaction->getOriginalTransactionKey()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_original_transaction_key_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getOriginalTransactionKey()
        );
    }
}