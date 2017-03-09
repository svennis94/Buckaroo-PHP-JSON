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

        $oTransactionRequest = $oTransaction->start();

        $this->assertInstanceOf(
            TransactionResponse::class,
            $oTransactionRequest
        );
        $this->assertTrue(
            $oTransactionRequest->hasErrors()
        );
        $this->assertCount(
            1,
            $oTransactionRequest->getErrors()
        );

    }

    /** @test */
    public function it_should_return_a_valid_transaction_request_response()
    {
        $oTransaction = new Transaction(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));
        $oTransaction->putInTestMode();
        $oTransaction->setAmountDebit(1.0);
        $oTransaction->setInvoice(time());

        $oService = new Service();
        $oService->setName('ideal');
        $oService->setAction('Pay');
        $oService->setVersion(2);
        $oService->addParameter('issuer', 'INGBNL2A');
        $oTransaction->addService($oService);

        $oTransactionRequest = $oTransaction->start();

        $this->assertInstanceOf(
            TransactionResponse::class,
            $oTransactionRequest
        );
        $this->assertFalse(
            $oTransactionRequest->hasErrors()
        );
    }
}