<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\CustomParameter;
use SeBuDesign\BuckarooJson\Transaction;

class CustomParameterTest extends TestCase
{
    /** @test */
    public function it_should_add_a_custom_parameter()
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
            $oTransaction->addCustomParameter($sName, $mValue)
        );
        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getCustomParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getCustomParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getCustomParameter($sName)->getValue()
        );
    }

    /** @test */
    public function it_should_add_custom_parameters()
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
            $oTransaction->addCustomParameter($sName, $mValue)
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
            $oTransaction->addCustomParameter($sName, $mValue)
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
            $oTransaction->addCustomParameter($sName, $mValue)
        );

        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getCustomParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getCustomParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getCustomParameter($sName)->getValue()
        );
    }

    /** @test */
    public function it_should_check_if_it_has_a_custom_parameter()
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
            $oTransaction->hasCustomParameter($sName)
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addCustomParameter($sName, $mValue)
        );
        $this->assertTrue(
            $oTransaction->hasCustomParameter($sName)
        );
    }

    /** @test */
    public function it_should_override_a_custom_parameter_when_it_has_the_same_name()
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
            $oTransaction->addCustomParameter($sName, $mValue)
        );
        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getCustomParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getCustomParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getCustomParameter($sName)->getValue()
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
            $oTransaction->addCustomParameter($sName, $mValue)
        );
        $this->assertInstanceOf(
            CustomParameter::class,
            $oTransaction->getCustomParameter($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getCustomParameter($sName)->getName()
        );
        $this->assertEquals(
            $mValue,
            $oTransaction->getCustomParameter($sName)->getValue()
        );
    }

    /** @test */
    public function it_should_remove_a_custom_parameter()
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
            $oTransaction->addCustomParameter($sName, $mValue)
        );
        $this->assertTrue(
            $oTransaction->hasCustomParameter($sName)
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->removeCustomParameter($sName)
        );
        $this->assertFalse(
            $oTransaction->hasCustomParameter($sName)
        );
    }
}