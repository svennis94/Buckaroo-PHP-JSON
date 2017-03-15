<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\CustomParameter;
use SeBuDesign\BuckarooJson\Transaction;

class AdditionalParameterTest extends TestCase
{
    /** @test */
    public function it_should_add_a_additional_parameter()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );
        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getAdditionalParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getAdditionalParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getAdditionalParameter($sName)->getValue()
        );
    }

    /** @test */
    public function it_should_add_additional_parameters()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );

        $sName = $this->faker->lexify('?????');
        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );

        $sName = $this->faker->lexify('?????');
        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );

        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getAdditionalParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getAdditionalParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getAdditionalParameter($sName)->getValue()
        );
    }

    /** @test */
    public function it_should_check_if_it_has_a_additional_parameter()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );

        $this->assertFalse(
            $oTransaction->hasAdditionalParameter($sName)
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );
        $this->assertTrue(
            $oTransaction->hasAdditionalParameter($sName)
        );
    }

    /** @test */
    public function it_should_override_a_additional_parameter_when_it_has_the_same_name()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );
        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getAdditionalParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getAdditionalParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getAdditionalParameter($sName)->getValue()
        );

        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );
        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getAdditionalParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getAdditionalParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getAdditionalParameter($sName)->getValue()
        );
    }

    /** @test */
    public function it_should_remove_a_additional_parameter()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $mValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addAdditionalParameter($sName, $mValue)
        );
        $this->assertTrue(
            $oTransaction->hasAdditionalParameter($sName)
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->removeAdditionalParameter($sName)
        );
        $this->assertFalse(
            $oTransaction->hasAdditionalParameter($sName)
        );
    }
}