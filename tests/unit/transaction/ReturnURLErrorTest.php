<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class ReturnURLErrorTest extends TestCase
{
    /** @test */
    public function it_should_set_the_return_url_error()
    {
        $oTransaction = $this->getTransaction();

        $sUrl = $this->faker->url;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setReturnURLError($sUrl)
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->oData->ReturnURLError
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->getReturnURLError()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_return_url_error_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getReturnURLError()
        );
    }
}