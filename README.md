# Buckaroo PHP - JSON

This package will connect to the JSON API of Buckaroo, if you prefer SOAP over JSON use [this package](https://github.com/SeBuDesign/Buckaroo-PHP).

[![Packagist](https://img.shields.io/packagist/dt/sebudesign/buckaroo-json.svg)]() [![Packagist](https://img.shields.io/packagist/v/sebudesign/buckaroo-json.svg)]() [![Code Climate](https://img.shields.io/codeclimate/github/SeBuDesign/Buckaroo-PHP-JSON.svg)]()

### Installation

This package uses [Composer](https://getcomposer.org/) as PHP dependency manager, you need to run the following command within the root of your project.

```
composer require sebudesign/buckaroo-json
```

### Usage

```php
<?php 

require 'vendor/autoload.php';

use SeBuDesign\BuckarooJson\Transaction;
use SeBuDesign\BuckarooJson\TransactionStatus;
use SeBuDesign\BuckarooJson\Parts\IpAddress;
use SeBuDesign\BuckarooJson\Parts\Service;
use SeBuDesign\BuckarooJson\Parts\OriginalTransactionReference;
use SeBuDesign\BuckarooJson\Parts\ContinueOnIncomplete;

class Foo
{
    public function startTransactionAllOptions()
    {
        // Replace your website-key and secret-key with your keys
        $transaction = new Transaction('website-key', 'secret-key');
        
        // Create a test transaction
        $transaction->putInTestMode();
        
        // Set the currency of the transaction
        $transaction->setCurrency('EUR');
        
        // Set the amount credit
        $transaction->setAmountCredit(1.99);
        
        // Set the amount debit
        $transaction->setAmountDebit(1.99);
        
        // Set the unique invoice number
        $transaction->setInvoice('UniqueInvoice');
        
        // Set the order number
        $transaction->setOrder('SetOrderNumber');
        
        // Set the description for the transaction
        $transaction->setDescription('Your transaction description');
        
        // Set the client IP
        $oIpAddress = new IpAddress();
        $oIpAddress->setAddress('127.0.0.1');
        $transaction->setClientIP($oIpAddress);
        
        // Set the client user agent
        $transaction->setClientUserAgent('google-chrome');
        
        // Set the return url
        $transaction->setReturnURL('https://google.com/');
        
        // Set the return url in case of a cancellation
        $transaction->setReturnURLCancel('https://google.com/');
        
        // Set the return url in case of an error
        $transaction->setReturnURLError('https://google.com/');
        
        // Set the return url in case of a rejection
        $transaction->setReturnURLReject('https://google.com/');
        
        // Set the original transaction object
        $oOriginalTransactionReference = new OriginalTransactionReference();
        $oOriginalTransactionReference->setType('type');
        $oOriginalTransactionReference->setReference('reference');
        $transaction->setOriginalTransactionReference($oOriginalTransactionReference);
        
        // Set the push url to push the transaction status to
        $transaction->setPushURL('https://google.com/');
       
        // Set the push url to push the transaction status in case of a failure
        $transaction->setPushURLFailure('https://google.com/');
        
        // Set the original transaction key
        $transaction->setOriginalTransactionKey('original-transaction-key');
        
        // Do you want to start a recurring payment?
        // Default: false
        $transaction->setStartRecurrent(true);
        
        // Continue on incomplete payment?
        // Default: ContinueOnIncomplete::No
        $transaction->setContinueOnIncomplete(ContinueOnIncomplete::RedirectToHTML);
        
        // Add a service
        $service = new Service();
        $service->setName('name');
        $service->setAction('action');
        $service->setVersion(3);
        
        // Service parameters
        $service->addParameter('name', 'value');
        $service->addParameter('name', 'value', 'group-id', 'group-type');
       
        $service->hasParameter('name'); // true
        $service->hasParameter('foo'); // false

        $service->getParameter('name');
        $service->removeParameter('name');
        
        $transaction->addService($service);
        
        // Add a custom parameter
        $transaction->addCustomParameter('name', 'value');
        // Has a custom parameter
        $transaction->hasCustomParameter('name');
        // Remove a custom parameter
        $transaction->removeCustomParameter('name');
        // Has a custom parameter
        $transaction->hasCustomParameter('name');
        
        // Add an additional parameter
        $transaction->addAdditionalParameter('name', 'value');
        // Has an additional parameter
        $transaction->hasAdditionalParameter('name');
        // Remove an additional parameter
        $transaction->removeAdditionalParameter('name');
        // Has an additional parameter
        $transaction->hasAdditionalParameter('name');
        
        // Add a client header
        $transaction->addClientHeader('Culture', 'nl-NL');
        // Has a specific client header
        $transaction->hasClientHeader('Culture'); // True
        $transaction->hasClientHeader('SomeCustomHeader'); // False
        // Retrieve a client header
        $transaction->getClientHeader('Culture'); // nl-NL
        $transaction->getClientHeader('SomeCustomHeader'); // null
        
        // Start the transaction
        $transactionResponse = $transaction->start();
        
        var_dump(
            $transactionResponse->getTransactionKey(),
            $transactionResponse->getOrder(),
            $transactionResponse->getIssuingCountry(),
            $transactionResponse->getInvoice(),
            $transactionResponse->getServiceCode(),
            $transactionResponse->getCurrency(),
            $transactionResponse->getAmountDebit(),
            $transactionResponse->getAmountCredit(),
            $transactionResponse->getTransactionType(),
            $transactionResponse->getMutationType(),
            $transactionResponse->getRelatedTransactions(),
            $transactionResponse->hasConsumerMessage(),
            $transactionResponse->hasToReadConsumerMessage(),
            $transactionResponse->getConsumerMessage(),
            $transactionResponse->isTest(),
            $transactionResponse->hasStartedRecurringPayment(),
            $transactionResponse->isRecurringPayment(),
            $transactionResponse->isCancelable(),
            $transactionResponse->getCustomerName(),
            $transactionResponse->getPayerHash(),
            $transactionResponse->getPaymentKey(),
            $transactionResponse->getStatusCode(),
            $transactionResponse->getStatusSubCode(),
            $transactionResponse->getDateTimeOfStatusChange(),
            $transactionResponse->hasRequiredAction(),
            $transactionResponse->getRequestedInformation(),
            $transactionResponse->hasToRedirect(),
            $transactionResponse->hasToPayRemainder(),
            $transactionResponse->getRemainderAmount(),
            $transactionResponse->getRemainderCurrency(),
            $transactionResponse->getRemainderGroupTransaction(),
            $transactionResponse->getRedirectUrl(),
            $transactionResponse->getServices(),
            $transactionResponse->getService('name'),
            $transactionResponse->getServiceParameters('name'),
            $transactionResponse->getCustomParameters(),
            $transactionResponse->getAdditionalParameters(),
            $transactionResponse->hasErrors(),
            $transactionResponse->getErrors()
        );
    }
    
    public function getTransactionStatus()
    {
        $transactionStatus = new TransactionStatus('website-key', 'secret-key');
        $transactionResponse = $transactionStatus->get('transaction-key');
        
        var_dump(
            $transactionResponse->getTransactionKey(),
            $transactionResponse->getOrder(),
            $transactionResponse->getIssuingCountry(),
            $transactionResponse->getInvoice(),
            $transactionResponse->getServiceCode(),
            $transactionResponse->getCurrency(),
            $transactionResponse->getAmountDebit(),
            $transactionResponse->getAmountCredit(),
            $transactionResponse->getTransactionType(),
            $transactionResponse->getMutationType(),
            $transactionResponse->getRelatedTransactions(),
            $transactionResponse->hasConsumerMessage(),
            $transactionResponse->hasToReadConsumerMessage(),
            $transactionResponse->getConsumerMessage(),
            $transactionResponse->isTest(),
            $transactionResponse->hasStartedRecurringPayment(),
            $transactionResponse->isRecurringPayment(),
            $transactionResponse->isCancelable(),
            $transactionResponse->getCustomerName(),
            $transactionResponse->getPayerHash(),
            $transactionResponse->getPaymentKey(),
            $transactionResponse->getStatusCode(),
            $transactionResponse->getStatusSubCode(),
            $transactionResponse->getDateTimeOfStatusChange(),
            $transactionResponse->hasRequiredAction(),
            $transactionResponse->getRequestedInformation(),
            $transactionResponse->hasToRedirect(),
            $transactionResponse->hasToPayRemainder(),
            $transactionResponse->getRemainderAmount(),
            $transactionResponse->getRemainderCurrency(),
            $transactionResponse->getRemainderGroupTransaction(),
            $transactionResponse->getRedirectUrl(),
            $transactionResponse->getServices(),
            $transactionResponse->getService('name'),
            $transactionResponse->getServiceParameters('name'),
            $transactionResponse->getCustomParameters(),
            $transactionResponse->getAdditionalParameters(),
            $transactionResponse->hasErrors(),
            $transactionResponse->getErrors()
        );
    }
}

```