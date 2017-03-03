<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class ReturnURLTest extends TestCase
{
    /** @test */
    public function it_should_set_the_return_url()
    {
        $oTransaction = $this->getTransaction();

        $sUrl = $this->faker->url;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setReturnURL($sUrl)
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->oData->ReturnURL
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->getReturnURL()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_return_url_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getReturnURL()
        );
    }
}