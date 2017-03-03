<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class ReturnURLCancelTest extends TestCase
{
    /** @test */
    public function it_should_set_the_return_url_cancel()
    {
        $oTransaction = $this->getTransaction();

        $sUrl = $this->faker->url;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setReturnURLCancel($sUrl)
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->oData->ReturnURLCancel
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->getReturnURLCancel()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_return_url_cancel_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getReturnURLCancel()
        );
    }
}