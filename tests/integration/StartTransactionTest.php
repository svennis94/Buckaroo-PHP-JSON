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
        $sInvoice = time();
        $sCurrency = 'EUR';
        $fAmountDebit = 1.0;

        $oTransaction = $this->getValidIntegrationTransaction($fAmountDebit, $sCurrency, $sInvoice);

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
        $this->assertEquals(
            [],
            $oTransactionResponse->getCustomParameters()
        );
        $this->assertEquals(
            [],
            $oTransactionResponse->getAdditionalParameters()
        );
        $this->assertCount(
            1,
            $oTransactionResponse->getServices()
        );
        $this->assertEquals(
            'ideal',
            $oTransactionResponse->getService('ideal')['Name']
        );
        $this->assertCount(
            2,
            $oTransactionResponse->getServiceParameters('ideal')
        );
        $this->assertEquals(
            $sInvoice,
            $oTransactionResponse->getInvoice()
        );
        $this->assertEquals(
            'ideal',
            $oTransactionResponse->getServiceCode()
        );
        $this->assertTrue(
            $oTransactionResponse->isTest()
        );
        $this->assertEquals(
            $sCurrency,
            $oTransactionResponse->getCurrency()
        );
        $this->assertEquals(
            $fAmountDebit,
            $oTransactionResponse->getAmountDebit()
        );
        $this->assertEquals(
            0,
            $oTransactionResponse->getAmountCredit()
        );
        $this->assertNotNull(
            $oTransactionResponse->getTransactionType()
        );
        $this->assertEquals(
            1,
            $oTransactionResponse->getMutationType()
        );
        $this->assertTrue(
            is_array($oTransactionResponse->getRelatedTransactions())
        );
        $this->assertFalse(
            $oTransactionResponse->getOrder()
        );
        $this->assertFalse(
            $oTransactionResponse->getIssuingCountry()
        );
        $this->assertFalse(
            $oTransactionResponse->hasStartedRecurringPayment()
        );
        $this->assertFalse(
            $oTransactionResponse->isRecurringPayment()
        );
        $this->assertFalse(
            $oTransactionResponse->getCustomerName()
        );
        $this->assertFalse(
            $oTransactionResponse->getPayerHash()
        );
        $this->assertNotNull(
            $oTransactionResponse->getPaymentKey()
        );
        $this->assertFalse(
            $oTransactionResponse->isCancelable()
        );
    }
}