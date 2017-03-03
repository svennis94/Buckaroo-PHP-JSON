<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class ClientUserAgentTest extends TestCase
{
    /** @test */
    public function it_should_set_and_get_the_client_user_agent()
    {
        $oTransaction = $this->getTransaction();

        $sUserAgent = $this->faker->userAgent;

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setClientUserAgent($sUserAgent)
        );
        $this->assertEquals(
            $sUserAgent,
            $oTransaction->oData->ClientUserAgent
        );
        $this->assertEquals(
            $sUserAgent,
            $oTransaction->getClientUserAgent()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_client_user_agent_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getClientUserAgent()
        );
    }
}