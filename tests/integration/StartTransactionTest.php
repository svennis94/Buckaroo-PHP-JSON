<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Responses\TransactionRequestResponse;
use SeBuDesign\BuckarooJson\Transaction;

class StartTransactionTest extends TestCase
{
    /** @test */
    public function it_should_return_transaction_request_response_with_error()
    {
        $oTransaction = new Transaction(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));

        $oTransaction->putInTestMode();

        $oTransaction->setAmountCredit(1.0);

        $oTransactionRequest = $oTransaction->start();

        $this->assertInstanceOf(
            TransactionRequestResponse::class,
            $oTransactionRequest
        );

        $this->assertTrue(
            $oTransactionRequest->hasErrors()
        );
    }
}