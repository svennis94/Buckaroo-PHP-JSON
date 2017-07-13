<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Helpers\StatusCodeHelper;
use SeBuDesign\BuckarooJson\Responses\TransactionResponse;
use SeBuDesign\BuckarooJson\TransactionStatus;

class GetTransactionTest extends TestCase
{
    /** @testx */
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

    /** @test */
    public function it_should_get_multiple_transactions_by_key()
    {
        $oTransaction = $this->getValidIntegrationTransaction();
        $oTransactionResponse = $oTransaction->start();
        $sTransactionKey = $oTransactionResponse->getTransactionKey();

        $oSecondTransaction = $this->getValidIntegrationTransaction();
        $oSecondTransactionResponse = $oSecondTransaction->start();
        $sSecondTransactionKey = $oSecondTransactionResponse->getTransactionKey();

        $oTransactionStatus = new TransactionStatus(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));

        $oTransactionStatus->addTransactionByKey($sTransactionKey);
        $oTransactionStatus->addTransactionByKey($sSecondTransactionKey);

        $oTransactionStatusResponses = $oTransactionStatus->get();

        $this->assertCount(
            2,
            $oTransactionStatusResponses
        );
        foreach ($oTransactionStatusResponses as $oTransactionStatusResponse) {
            $this->assertInstanceOf(
                TransactionResponse::class,
                $oTransactionStatusResponse
            );
            $this->assertTrue(
                StatusCodeHelper::isPending($oTransactionStatusResponse->getStatusCode())
            );
        }
    }



    /** @test */
    public function it_should_get_multiple_transactions_by_invoice()
    {
        $oTransaction = $this->getValidIntegrationTransaction();
        $oTransactionResponse = $oTransaction->start();
        $sInvoice = $oTransactionResponse->getInvoice();

        $oSecondTransaction = $this->getValidIntegrationTransaction();
        $oSecondTransactionResponse = $oSecondTransaction->start();
        $sSecondInvoice = $oSecondTransactionResponse->getInvoice();

        $oTransactionStatus = new TransactionStatus(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));

        $oTransactionStatus->addTransactionByInvoice($sInvoice);
        $oTransactionStatus->addTransactionByInvoice($sSecondInvoice);

        $oTransactionStatusResponses = $oTransactionStatus->get();

        foreach ($oTransactionStatusResponses as $oTransactionStatusResponse) {
            $this->assertInstanceOf(
                TransactionResponse::class,
                $oTransactionStatusResponse
            );
            $this->assertTrue(
                StatusCodeHelper::isPending($oTransactionStatusResponse->getStatusCode())
            );
        }
    }
}