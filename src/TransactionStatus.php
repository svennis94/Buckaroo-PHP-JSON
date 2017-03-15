<?php namespace SeBuDesign\BuckarooJson;

use SeBuDesign\BuckarooJson\Responses\TransactionResponse;

class TransactionStatus extends RequestBase
{
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
            if (count($aResponse) == 1) {
                $aReturn = new TransactionResponse(
                    $aResponse[ 0 ]
                );
            } else {
                $aReturn = [];
                foreach ($aResponse as $aTransactionData) {
                    $aResponse[] = new TransactionResponse(
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