<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class InvoiceTest extends TestCase
{
    /** @test */
    public function it_should_set_the_invoice()
    {
        $oTransaction = $this->getTransaction();

        $sInvoice = $this->faker->uuid;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setInvoice($sInvoice)
        );
        $this->assertEquals(
            $sInvoice,
            $oTransaction->oData->Invoice
        );
        $this->assertEquals(
            $sInvoice,
            $oTransaction->getInvoice()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_invoice_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getInvoice()
        );
    }
}