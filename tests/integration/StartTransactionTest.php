<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\Service;
use SeBuDesign\BuckarooJson\Responses\TransactionResponse;
use SeBuDesign\BuckarooJson\Transaction;

class StartTransactionTest extends TestCase
{
    /** @test */
    public function it_should_return_transaction_request_response_with_error()
    {
        $oTransaction = new Transaction(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));
        $oTransaction->putInTestMode();
        $oTransaction->setAmountDebit(1.0);

        $oTransactionResponse = $oTransaction->start();

        $this->assertInstanceOf(
            TransactionResponse::class,
            $oTransactionResponse
        );
        $this->assertTrue(
            $oTransactionResponse->hasErrors()
        );
        $this->assertCount(
            1,
            $oTransactionResponse->getErrors()
        );

    }

    /** @test */
    public function it_should_return_a_valid_transaction_request_response()
    {
        $oTransaction = new Transaction(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));
        $oTransaction->putInTestMode();
        $oTransaction->setCurrency('EUR');
        $oTransaction->setAmountDebit(1.0);
        $oTransaction->setInvoice(time());

        $oService = new Service();
        $oService->setName('ideal');
        $oService->setAction('Pay');
        $oService->setVersion(2);
        $oService->addParameter('issuer', 'INGBNL2A');

        $oTransaction->addService($oService);

        $oTransactionResponse = $oTransaction->start();

        $this->assertInstanceOf(
            TransactionResponse::class,
            $oTransactionResponse
        );
        $this->assertFalse(
            $oTransactionResponse->hasErrors()
        );
        $this->assertInstanceOf(
            \DateTime::class,
            $oTransactionResponse->getDateTimeOfStatusChange()
        );
        $this->assertNotFalse(
            $oTransactionResponse->getTransactionKey()
        );
        $this->assertTrue(
            $oTransactionResponse->hasRequiredAction()
        );
        $this->assertTrue(
            $oTransactionResponse->hasToRedirect()
        );
        $this->assertNotFalse(
            $oTransactionResponse->getRedirectUrl()
        );
        $this->assertEquals(
            [],
            $oTransactionResponse->getRequestedInformation()
        );
        $this->assertFalse(
            $oTransactionResponse->hasToPayRemainder()
        );
        $this->assertEquals(
            0,
            $oTransactionResponse->getRemainderAmount()
        );
        $this->assertFalse(
            $oTransactionResponse->getRemainderCurrency()
        );
        $this->assertFalse(
            $oTransactionResponse->getRemainderGroupTransaction()
        );
        
    }
}