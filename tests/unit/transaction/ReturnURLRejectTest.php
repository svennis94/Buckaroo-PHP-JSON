<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class ReturnURLRejectTest extends TestCase
{
    /** @test */
    public function it_should_set_the_return_url_reject()
    {
        $oTransaction = $this->getTransaction();

        $sUrl = $this->faker->url;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setReturnURLReject($sUrl)
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->oData->ReturnURLReject
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->getReturnURLReject()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_return_url_reject_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getReturnURLReject()
        );
    }
}