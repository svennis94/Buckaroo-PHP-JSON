<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

class StartRecurrentTest extends TestCase
{
    /** @test */
    public function it_should_set_the_start_recurrent()
    {
        $oTransaction = $this->getTransaction();

        $bStartRecurrent = $this->faker->boolean();

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setStartRecurrent($bStartRecurrent)
        );
        $this->assertEquals(
            $bStartRecurrent,
            $oTransaction->oData->StartRecurrent
        );
        $this->assertEquals(
            $bStartRecurrent,
            $oTransaction->getStartRecurrent()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_start_recurrent_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getStartRecurrent()
        );
    }
}