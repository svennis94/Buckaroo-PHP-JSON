<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\Service;
use SeBuDesign\BuckarooJson\Transaction;

class ServiceParametersTest extends TestCase
{
    /** @test */
    public function it_should_add_a_service_parameter()
    {
        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $sParameterName = $this->faker->lexify('?????');
        $sParameterValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->addParameter($sParameterName, $sParameterValue)
        );
        $this->assertCount(
            1,
            $oService->oData->Parameters
        );
    }

    /** @test */
    public function it_should_add_service_paramters()
    {
        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $sParameterName = $this->faker->lexify('?????');
        $sParameterValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->addParameter($sParameterName, $sParameterValue)
        );
        $this->assertCount(
            1,
            $oService->oData->Parameters
        );

        $sParameterName = $this->faker->lexify('?????');
        $sParameterValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->addParameter($sParameterName, $sParameterValue)
        );
        $this->assertCount(
            2,
            $oService->oData->Parameters
        );
    }

    /** @test */
    public function it_should_check_if_it_has_a_service_parameter()
    {
        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $sParameterName = $this->faker->lexify('?????');
        $sParameterValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertFalse(
            $oService->hasParameter($sParameterName)
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->addParameter($sParameterName, $sParameterValue)
        );
        $this->assertTrue(
            $oService->hasParameter($sParameterName)
        );
    }

    /** @test */
    public function it_should_override_a_service_parameter_when_it_has_the_same_name()
    {
        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $sParameterName = $this->faker->lexify('?????');
        $sParameterValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->addParameter($sParameterName, $sParameterValue)
        );
        $this->assertEquals(
            $sParameterValue,
            $oService->getParameter($sParameterName)->getValue()
        );
        $this->assertCount(
            1,
            $oService->oData->Parameters
        );

        $sParameterValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->addParameter($sParameterName, $sParameterValue)
        );
        $this->assertEquals(
            $sParameterValue,
            $oService->getParameter($sParameterName)->getValue()
        );
        $this->assertCount(
            1,
            $oService->oData->Parameters
        );
    }

    /** @test */
    public function it_should_remove_a_service_parameter()
    {
        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $sParameterName = $this->faker->lexify('?????');
        $sParameterValue = $this->faker->randomElement(
            [
                $this->faker->lexify('?????'),
                $this->faker->boolean(),
                $this->faker->randomDigitNotNull,
                null
            ]
        );
        $this->assertFalse(
            $oService->hasParameter($sParameterName)
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->addParameter($sParameterName, $sParameterValue)
        );
        $this->assertTrue(
            $oService->hasParameter($sParameterName)
        );
        $this->assertInstanceOf(
            Service::class,
            $oService->removeParameter($sParameterName)
        );
        $this->assertFalse(
            $oService->hasParameter($sParameterName)
        );
    }
}