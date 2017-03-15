<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Helpers\StatusCodeHelper;
use SeBuDesign\BuckarooJson\Responses\TransactionResponse;
use SeBuDesign\BuckarooJson\TransactionStatus;

class GetTransactionTest extends TestCase
{
    /** @test */
    public function it_should_get_the_status_by_a_single_transaction_key()
    {
        $oTransaction = $this->getValidIntegrationTransaction();
        $oTransactionResponse = $oTransaction->start();
        $sTransactionKey = $oTransactionResponse->getTransactionKey();

        $oTransactionStatus = new TransactionStatus(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));

        $oTransactionStatusResponse = $oTransactionStatus->get($sTransactionKey);

        $this->assertInstanceOf(
            TransactionResponse::class,
            $oTransactionStatusResponse
        );
        $this->assertTrue(
            StatusCodeHelper::isPending($oTransactionStatusResponse->getStatusCode())
        );
    }
}