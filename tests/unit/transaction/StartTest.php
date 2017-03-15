<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Parts\ContinueOnIncomplete;
use SeBuDesign\BuckarooJson\Parts\IpAddress;
use SeBuDesign\BuckarooJson\Parts\OriginalTransactionReference;
use SeBuDesign\BuckarooJson\Parts\Service;
use SeBuDesign\BuckarooJson\Transaction;

class StartTest extends TestCase
{
    /** @test */
    public function it_should_generate_a_full_valid_json()
    {
        $oTransaction = new Transaction('key', 'secret');

        $oTransaction->setCurrency('sample string 1');

        $oTransaction->setAmountDebit(1.0);
        $oTransaction->setAmountCredit(1.0);

        $oTransaction->setInvoice('sample string 2');

        $oTransaction->setOrder('sample string 3');

        $oTransaction->setDescription('sample string 4');

        $oIpAddress = new IpAddress();
        $oIpAddress->setAddress('127.0.0.1');
        $oTransaction->setClientIP($oIpAddress);

        $oTransaction->setReturnURL('sample string 5');
        $oTransaction->setReturnURLCancel('sample string 6');
        $oTransaction->setReturnURLError('sample string 7');
        $oTransaction->setReturnURLReject('sample string 8');

        $oTransaction->setOriginalTransactionKey('sample string 9');

        $oTransaction->setStartRecurrent(true);

        $oTransaction->setContinueOnIncomplete(ContinueOnIncomplete::No);

        $oTransaction->setServicesSelectableByClient('sample string 13');
        $oTransaction->setServicesExcludedForClient('sample string 14');

        $oTransaction->setPushURL('sample string 15');
        $oTransaction->setPushURLFailure('sample string 16');

        $oTransaction->setClientUserAgent('sample string 17');

        $oOriginalTransactionReference = new OriginalTransactionReference();
        $oOriginalTransactionReference->setType('sample string 1');
        $oOriginalTransactionReference->setReference('sample string 2');
        $oTransaction->setOriginalTransactionReference($oOriginalTransactionReference);

        $oService = new Service();
        $oService->setName('sample string 1');
        $oService->setAction('sample string 2');
        $oService->setVersion(3);
        $oService->addParameter('sample string 1', 'sample string 2', 'sample string 3', 'sample string 4');
        $oTransaction->addService($oService);

        $oService = new Service();
        $oService->setName('sample string 3');
        $oService->setAction('sample string 4');
        $oService->setVersion(3);
        $oService->addParameter('sample string 1', 'sample string 2', 'sample string 3', 'sample string 4');
        $oTransaction->addService($oService);

        $oTransaction->addCustomParameter('sample string 1', 'sample string 2');
        $oTransaction->addCustomParameter('sample string 3', 'sample string 4');

        $oTransaction->addAdditionalParameter('sample string 1', 'sample string 2');
        $oTransaction->addAdditionalParameter('sample string 3', 'sample string 4');

        $this->assertEquals(
            '{"Currency":"sample string 1","AmountDebit":1,"AmountCredit":1,"Invoice":"sample string 2","Order":"sample string 3","Description":"sample string 4","ClientIP":{"Address":"127.0.0.1","Type":0},"ReturnURL":"sample string 5","ReturnURLCancel":"sample string 6","ReturnURLError":"sample string 7","ReturnURLReject":"sample string 8","OriginalTransactionKey":"sample string 9","StartRecurrent":true,"ContinueOnIncomplete":0,"ServicesSelectableByClient":"sample string 13","ServicesExcludedForClient":"sample string 14","PushURL":"sample string 15","PushURLFailure":"sample string 16","ClientUserAgent":"sample string 17","OriginalTransactionReference":{"Type":"sample string 1","Reference":"sample string 2"},"Services":{"ServiceList":[{"Name":"sample string 1","Action":"sample string 2","Version":3,"Parameters":[{"Name":"sample string 1","Value":"sample string 2","GroupID":"sample string 3","GroupType":"sample string 4"}]},{"Name":"sample string 3","Action":"sample string 4","Version":3,"Parameters":[{"Name":"sample string 1","Value":"sample string 2","GroupID":"sample string 3","GroupType":"sample string 4"}]}]},"CustomParameters":{"List":[{"Name":"sample string 1","Value":"sample string 2"},{"Name":"sample string 3","Value":"sample string 4"}]},"AdditionalParameters":{"AdditionalParameter":[{"Name":"sample string 1","Value":"sample string 2"},{"Name":"sample string 3","Value":"sample string 4"}]}}',
            (string) $oTransaction
        );
    }
}