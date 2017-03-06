<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\OriginalTransactionReference;
use SeBuDesign\BuckarooJson\Transaction;

class OriginalTransactionReferenceTest extends TestCase
{
    public function it_should_be_an_instance_of_original_transaction_reference()
    {
        $oOriginalTransaction = $this->getOriginalTransactionReference();

        $this->assertInstanceOf(
            OriginalTransactionReference::class,
            $oOriginalTransaction
        );
    }

    /** @test */
    public function it_should_set_the_reference_and_type()
    {
        $oOriginalTransaction = $this->getOriginalTransactionReference();

        $sOriginalTransactionType = $this->faker->word;
        $this->assertInstanceOf(
            OriginalTransactionReference::class,
            $oOriginalTransaction->setType($sOriginalTransactionType)
        );
        $this->assertEquals(
            $sOriginalTransactionType,
            $oOriginalTransaction->oData->Type
        );
        $this->assertEquals(
            $sOriginalTransactionType,
            $oOriginalTransaction->getType()
        );

        $sOriginalTransactionReference = $this->faker->word;
        $this->assertInstanceOf(
            OriginalTransactionReference::class,
            $oOriginalTransaction->setReference($sOriginalTransactionReference)
        );
        $this->assertEquals(
            $sOriginalTransactionReference,
            $oOriginalTransaction->oData->Reference
        );
        $this->assertEquals(
            $sOriginalTransactionReference,
            $oOriginalTransaction->getReference()
        );
    }


    /** @test */
    public function it_should_add_an_original_transaction_reference_to_the_transaction()
    {
        $oTransaction = $this->getTransaction();

        $sOriginalTransactionType = $this->faker->word;
        $sOriginalTransactionReference = $this->faker->word;

        $oOriginalTransaction = $this->getOriginalTransactionReference();
        $oOriginalTransaction->setType($sOriginalTransactionType);
        $oOriginalTransaction->setReference($sOriginalTransactionReference);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setOriginalTransactionReference($oOriginalTransaction)
        );
        $this->assertInstanceOf(
            OriginalTransactionReference::class,
            $oTransaction->getOriginalTransactionReference()
        );
        $this->assertEquals(
            $sOriginalTransactionType,
            $oTransaction->getOriginalTransactionReference()->getType()
        );
        $this->assertEquals(
            $sOriginalTransactionReference,
            $oTransaction->getOriginalTransactionReference()->getReference()
        );
    }
}