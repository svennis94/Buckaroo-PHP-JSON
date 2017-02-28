# Buckaroo PHP - JSON

This package will connect to the JSON API of Buckaroo, if you prefer SOAP over JSON use [this package](https://github.com/SeBuDesign/Buckaroo-PHP).

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
use SeBuDesign\BuckarooJson\Service;

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
        
        // Set the amount credit or debit
        $transaction->setAmountCredit(1.99);
        // $transaction->setAmountDebit(1.99);
        
        // Set the unique invoice number
        $transaction->setInvoice('UniqueInvoice');
        
        // Set the order number
        $transaction->setOrder('SetOrderNumber');
        
        // Set the description for the transaction
        $transaction->setDescription('Your transaction description');
        
        // Set the client IP
        $transaction->setClientIp('127.0.0.1');
        
        // Set the client user agent
        $transaction->setClientUserAgent('google-chrome');
        
        // Set the return url
        $transaction->setReturnUrl('https://google.com/');
        
        // Set the return url in case of a cancellation
        $transaction->setCancelUrl('https://google.com/');
        
        // Set the return url in case of an error
        $transaction->setErrorUrl('https://google.com/');
        
        // Set the return url in case of a rejection
        $transaction->setRejectUrl('https://google.com/');
        
        // Set the original transaction object
        $transaction->setOriginalTransaction('type', 'reference');
        
        // Set the push url to push the transaction status to
        $transaction->setPushUrl('https://google.com/');
       
        // Set the push url to push the transaction status in case of a failure
        $transaction->setFailurePushUrl('https://google.com/');
        
        // Set the original transaction key
        $transaction->setOriginalTransactionKey('original-transaction-key');
        
        // Do you want to start a recurring payment?
        $transaction->startRecurringPayment();
        
        // Continue on incomplete payment?
        $transaction->continueOnIncomplete();
        
        // Add a service
        $service = new Service();
        $service->setName('name');
        $service->setAction('action');
        $service->setVersion(3);
        $service->addParameter('name', 'value');
        $service->addParameter('name', 'value', 'group-type', 'group-id');
        
        $transaction->addService($service);
        
        // Add a custom parameter
        $transaction->addCustomParameter('name', 'value');
        // Remove a custom parameter
        $transaction->removeCustomParameter('name');
        // Has a custom parameter
        $transaction->hasCustomParameter('name');
        
        // Add an additional parameter
        $transaction->addAdditionalParameter('name', 'value');
        // Remove an additional parameter
        $transaction->removeAdditionalParameter('name');
        // has an additional parameter
        $transaction->hasAdditionalParameter('name');
        
        // Start the transaction
        $transactionAction = $transaction->start();
        
        var_dump(
            $transactionAction->getTransactionKey(),
            $transactionAction->getOrder(),
            $transactionAction->getIssuingCountry(),
            $transactionAction->getInvoice(),
            $transactionAction->getServiceCode(),
            $transactionAction->getCurrency(),
            $transactionAction->getAmountDebit(),
            $transactionAction->getAmountCredit(),
            $transactionAction->getTransactionType(),
            $transactionAction->getMutationType(),
            $transactionAction->getRelatedTransactions(),
            $transactionAction->getRelatedTransactions()[1]->getType(),
            $transactionAction->getRelatedTransactions()[1]->getTransactionKey(),
            $transactionAction->getConsumerMessage(),
            $transactionAction->getConsumerMessage()->hasToRead(),
            $transactionAction->getConsumerMessage()->getCulture(),
            $transactionAction->getConsumerMessage()->getTitle(),
            $transactionAction->getConsumerMessage()->getPlainText(),
            $transactionAction->getConsumerMessage()->getHtmlText(),
            $transactionAction->isTest(),
            $transactionAction->isFirstRecurring(),
            $transactionAction->isRecurring(),
            $transactionAction->getClientName(),
            $transactionAction->getPayerHash(),
            $transactionAction->getPaymentKey(),
            $transactionAction->getStatus()->getCode(),
            $transactionAction->getStatus()->getDescription(),
            $transactionAction->getSubStatus()->getCode(),
            $transactionAction->getSubStatus()->getDescription(),
            $transactionAction->getStatusChangedAt(),
            $transactionAction->getRequiredAction()->hasToRedirect(),
            $transactionAction->getRequiredAction()->getName(),
            $transactionAction->getRequiredAction()->isDeprecated(),
            $transactionAction->getRequiredAction()->getRedirectUrl(),
            $transactionAction->getRequiredAction()->getRequestedInformation(),
            $transactionAction->getRequiredAction()->getPayRemainderDetails()->getRemainderAmount(),
            $transactionAction->getRequiredAction()->getPayRemainderDetails()->getCurrency(),
            $transactionAction->getServices(),
            $transactionAction->getServices()[1]->getName(),
            $transactionAction->getServices()[1]->getAction(),
            $transactionAction->getServices()[1]->getVersion(),
            $transactionAction->getServices()[1]->getParameters(),
            $transactionAction->getCustomParameters(),
            $transactionAction->getAdditionalParameters(),
            $transactionAction->hasErrors(),
            $transactionAction->getErrors(),
        );
        
        if ($transactionAction->getRequiredAction()->hasToRedirect()) {
            header('Location: ' . $transactionAction->getRequiredAction()->getRedirectUrl());
        }
    }
}

```