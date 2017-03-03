<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Transaction;

/**
 * @covers \SeBuDesign\BuckarooJson\Transaction
 */
class DescriptionTest extends TestCase
{
    /** @test */
    public function it_should_set_the_description()
    {
        $oTransaction = $this->getTransaction();

        $sDescription = $this->faker->text(32);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->setDescription($sDescription)
        );
        $this->assertEquals(
            $sDescription,
            $oTransaction->oData->Description
        );
        $this->assertEquals(
            $sDescription,
            $oTransaction->getDescription()
        );
    }

    /** @test */
    public function it_should_return_false_when_the_description_is_not_set()
    {
        $oTransaction = $this->getTransaction();

        $this->assertFalse(
            $oTransaction->getDescription()
        );
    }
}