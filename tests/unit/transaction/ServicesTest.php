<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\Service;
use SeBuDesign\BuckarooJson\Transaction;

class ServicesTest extends TestCase
{
    /** @test */
    public function it_should_add_a_service()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertInstanceOf(
            Service::class,
            $oTransaction->getService($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getService($sName)->getName()
        );
    }

    /** @test */
    public function it_should_add_services()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertInstanceOf(
            Service::class,
            $oTransaction->getService($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getService($sName)->getName()
        );

        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertInstanceOf(
            Service::class,
            $oTransaction->getService($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getService($sName)->getName()
        );

        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertInstanceOf(
            Service::class,
            $oTransaction->getService($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getService($sName)->getName()
        );
    }

    /** @test */
    public function it_should_check_if_it_has_a_service()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertFalse(
            $oTransaction->hasService($sName)
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertTrue(
            $oTransaction->hasService($sName)
        );
    }

    /** @test */
    public function it_should_override_a_service_when_it_has_the_same_name()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $sAction = $this->faker->lexify('???');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($sAction);
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertInstanceOf(
            Service::class,
            $oTransaction->getService($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getService($sName)->getName()
        );
        $this->assertEquals(
            $sAction,
            $oTransaction->getService($sName)->getAction()
        );

        $sAction = $this->faker->lexify('???');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($sAction);
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertInstanceOf(
            Service::class,
            $oTransaction->getService($sName)
        );
        $this->assertEquals(
            $sName,
            $oTransaction->getService($sName)->getName()
        );
        $this->assertEquals(
            $sAction,
            $oTransaction->getService($sName)->getAction()
        );

    }

    /** @test */
    public function it_should_remove_a_service()
    {
        $oTransaction = $this->getTransaction();

        $sName = $this->faker->lexify('?????');
        $oService = new Service();
        $oService->setName($sName);
        $oService->setAction($this->faker->lexify('???'));
        $oService->setVersion($this->faker->randomDigitNotNull);

        $this->assertFalse(
            $oTransaction->hasService($sName)
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->addService($oService)
        );
        $this->assertTrue(
            $oTransaction->hasService($sName)
        );
        $this->assertInstanceOf(
            Transaction::class,
            $oTransaction->removeService($sName)
        );
        $this->assertFalse(
            $oTransaction->hasService($sName)
        );
    }
}