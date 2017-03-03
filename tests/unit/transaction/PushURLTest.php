<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class PushURLTest extends TestCase
{
    /** @test */
    public function it_should_set_the_push_url()
    {
        $oTransaction = $this->getTransaction();

        $sUrl = $this->faker->url;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setPushURL($sUrl)
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->oData->PushURL
        );
        $this->assertEquals(
            $sUrl,
            $oTransaction->getPushURL()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_push_url_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getPushURL()
        );
    }
}