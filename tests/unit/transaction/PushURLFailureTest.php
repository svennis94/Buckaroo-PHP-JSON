<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class PushURLFailureTest extends TestCase
{
    /** @test */
    public function it_should_set_the_push_url_failure()
    {
        $oTransaction = $this->getTransaction();

        $sUrl = $this->faker->url;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setPushURLFailure($sUrl)
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->oData->PushURLFailure
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->getPushURLFailure()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_push_url_failure_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getPushURLFailure()
        );
    }
}