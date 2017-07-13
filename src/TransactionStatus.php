<?php namespace SeBuDesign\BuckarooJson;

use SeBuDesign\BuckarooJson\Responses\TransactionResponse;

class TransactionStatus extends RequestBase
{
    /**
     * Ensure the Transactions key is an array
     */
    protected function ensureTransactionsArray()
    {
        $this->ensureDataObject();

        if (!isset($this->oData->Transactions)) {
            $this->oData->Transactions = [];
        }
    }

    /**
     * Check if a transaction key or invoice was added
     *
     * @param string $sQuery The transaction key or invoice to find
     *
     * @return bool
     */
    public function hasKeyOrInvoice($sQuery)
    {
        $this->ensureTransactionsArray();

        $bExists = false;
        foreach ($this->oData->Transactions as $aTransaction) {
            if ($sQuery === $aTransaction['Key'] || $sQuery === $aTransaction['Invoice']) {
                $bExists = true;
                break;
            }
        }

        return $bExists;
    }

    /**
     * Add a transaction by key
     *
     * @param string $sTransactionKey The transaction key to retrieve
     *
     * @return $this
     */
    public function addTransactionByKey($sTransactionKey)
    {
        $this->ensureTransactionsArray();

        $this->oData->Transactions[] = [
            'Key' => $sTransactionKey,
        ];

        return $this;
    }

    /**
     * Add a transaction by invoice
     *
     * @param string $sInvoice The invoice to retrieve
     *
     * @return $this
     */
    public function addTransactionByInvoice($sInvoice)
    {
        $this->ensureTransactionsArray();

        $this->oData->Transactions[] = [
            'Invoice' => $sInvoice,
        ];

        return $this;
    }

    /**
     * Get the transaction status
     *
     * @param string $sTransactionKey The transaction key to get
     *
     * @return TransactionResponse | TransactionResponse[]
     */
    public function get($sTransactionKey = null)
    {
        if (is_null($sTransactionKey)) {
            $aResponse = $this->performRequest('Transaction/Statuses', 'POST');
            if (count($aResponse['Transactions']) === 1) {
                $aReturn = new TransactionResponse(
                    $aResponse['Transactions'][ 0 ]
                );
            } else {
                $aReturn = [];
                foreach ($aResponse['Transactions'] as $aTransactionData) {
                    $aReturn[] = new TransactionResponse(
                        $aTransactionData
                    );
                }
            }
        } else {
            $aReturn = new TransactionResponse(
                $this->performRequest("Transaction/Status/{$sTransactionKey}", 'GET')
            );
        }

        return $aReturn;
    }
}