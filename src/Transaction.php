<?php namespace SeBuDesign\BuckarooJson;

class Transaction extends RequestBase
{
    /**
     * The currency to perform the payment in
     *
     * @param string $sCurrency The currency
     *
     * @return $this
     */
    public function setCurrency($sCurrency)
    {
        $this->aData['Currency'] = $sCurrency;

        return $this;
    }

    /**
     * Get the selected currency
     *
     * @return string|boolean
     */
    public function getCurrency()
    {
        return (isset($this->aData['Currency']) ? $this->aData['Currency'] : false);
    }
}