<?php namespace SeBuDesign\BuckarooJson\Tools;

use SeBuDesign\BuckarooJson\RequestBase;

class IbanConverter extends RequestBase
{
    protected function ensureBankAccountCollection()
    {
        $this->ensureDataObject();

        if (!isset($this->oData->BankAccountCollection)) {
            $this->oData->BankAccountCollection = [];
        }
    }

    public function addAccount($iAccountNumber, $sBankCode, $sIsoCode, $mId = null)
    {
        $this->ensureBankAccountCollection();

        $aAccount = [
            'CountryIsoCode' => $sIsoCode,
            'AccountNumber'  => $iAccountNumber,
            'BankCode'       => $sBankCode,
        ];

        if (!is_null($mId)) {
            $aAccount['ID'] = $mId;
        }

        $this->oData->BankAccountCollection[] = $aAccount;
    }

    public function convert()
    {
        $oResponse = $this->performRequest('Tools/IbanConverter', 'POST');
    }
}