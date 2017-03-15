<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\ContinueOnIncomplete;
use SeBuDesign\BuckarooJson\Transaction;

class ContinueOnIncompleteTest extends TestCase
{
    /** @test */
    public function it_should_set_the_start_recurrent()
    {
        $oTransaction = $this->getTransaction();

        $bContinueOnIncomplete = $this->faker->randomElement(
            [
                ContinueOnIncomplete::No,
                ContinueOnIncomplete::RedirectToHTML
            ]
        );

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setContinueOnIncomplete($bContinueOnIncomplete)
        );
        $this->assertEquals(
            $bContinueOnIncomplete,
            $oTransaction->oData->ContinueOnIncomplete
        );
        $this->assertEquals(
            $bContinueOnIncomplete,
            $oTransaction->getContinueOnIncomplete()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_start_recurrent_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getContinueOnIncomplete()
        );
    }
}