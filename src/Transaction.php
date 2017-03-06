<?php namespace SeBuDesign\BuckarooJson;

use SeBuDesign\BuckarooJson\Parts\CustomParameter;
use \SeBuDesign\BuckarooJson\Parts\IpAddress;
use \SeBuDesign\BuckarooJson\Parts\OriginalTransactionReference;

/**
 * Class Transaction
 *
 * @package SeBuDesign\BuckarooJson
 *
 * @method $this setCurrency(string $sCurrency)
 * @method string|boolean getCurrency()
 *
 * @method $this setAmountCredit(float $fAmountCredit)
 * @method float|boolean getAmountCredit()
 *
 * @method $this setAmountDebit(float $fAmountDebit)
 * @method float|boolean getAmountDebit()
 *
 * @method $this setInvoice(string $sInvoice)
 * @method string|boolean getInvoice()
 *
 * @method $this setOrder(string $sOrder)
 * @method string|boolean getOrder()
 *
 * @method $this setDescription(string $sDescription)
 * @method string|boolean getDescription()
 *
 * @method $this setClientIP(IpAddress $oIpAddress)
 * @method IpAddress|boolean getClientIP()
 *
 * @method $this setClientUserAgent(string $sUserAgent)
 * @method string|boolean getClientUserAgent()
 *
 * @method $this setReturnURL(string $sUrl)
 * @method string|boolean getReturnURL()
 *
 * @method $this setReturnURLCancel(string $sUrl)
 * @method string|boolean getReturnURLCancel()
 *
 * @method $this setReturnURLError(string $sUrl)
 * @method string|boolean getReturnURLError()
 *
 * @method $this setReturnURLReject(string $sUrl)
 * @method string|boolean getReturnURLReject()
 *
 * @method $this setOriginalTransactionKey(string $sOriginalTransactionKey)
 * @method string|boolean getOriginalTransactionKey()
 *
 * @method $this setStartRecurrent(boolean $bStartRecurrent)
 * @method boolean getStartRecurrent()
 *
 * @method $this setContinueOnIncomplete(integer $iContinueOnIncomplete)
 * @method integer|boolean getContinueOnIncomplete()
 *
 * @method $this setServicesSelectableByClient(string $sServicesSelectableByClient)
 * @method string|boolean getServicesSelectableByClient()
 *
 * @method $this setServicesExcludedForClient(string $sServicesSelectableByClient)
 * @method string|boolean getServicesExcludedForClient()
 *
 * @method $this setPushURL(string $sPushURL)
 * @method string|boolean getPushURL()
 *
 * @method $this setOriginalTransactionReference(OriginalTransactionReference $oOriginalTransactionReference)
 * @method OriginalTransactionReference|boolean getOriginalTransactionReference()
 */
class Transaction extends RequestBase
{
    /**
     * Adds a custom parameter
     *
     * @param string $sName The name of the custom parameter
     * @param mixed $mValue The value of the custom parameter
     *
     * @return $this
     */
    public function addCustomParameter($sName, $mValue)
    {
        $this->ensureDataObject();

        if (!isset($this->oData->CustomParameters)) {
            $this->oData->CustomParameters = new \stdClass();
            $this->oData->CustomParameters->List = [];
        }

        if ($this->hasCustomParameter($sName)) {
            $this->removeCustomParameter($sName);
        }

        $oCustomParameter = new CustomParameter();
        $oCustomParameter->setName($sName);
        $oCustomParameter->setValue($mValue);

        $this->oData->CustomParameters->List[] = $oCustomParameter;

        return $this;
    }

    /**
     * Gets a specific custom parameter
     *
     * @param string $sName The name of the custom parameter to get
     *
     * @return boolean|CustomParameter
     */
    public function getCustomParameter($sName)
    {
        $this->ensureDataObject();

        if (!isset($this->oData->CustomParameters) || empty($this->oData->CustomParameters->List)) {
            return false;
        }

        $mFound = false;

        foreach ($this->oData->CustomParameters->List as $oCustomParameter) {
            if ($oCustomParameter->getName() == $sName) {
                $mFound = $oCustomParameter;
                break;
            }
        }

        return $mFound;
    }

    /**
     * Checks if a custom parameter exists
     *
     * @param string $sName The name of the custom parameter to check
     *
     * @return boolean
     */
    public function hasCustomParameter($sName)
    {
        return ($this->getCustomParameter($sName) !== false ? true : false);
    }

    /**
     * Removes a specific custom parameter
     *
     * @param string $sName The name of the custom parameter to remove
     *
     * @return $this|boolean
     */
    public function removeCustomParameter($sName)
    {
        $this->ensureDataObject();

        if (!isset($this->oData->CustomParameters) || empty($this->oData->CustomParameters->List)) {
            return false;
        }

        foreach ($this->oData->CustomParameters->List as $iIndex => $oCustomParameter) {
            if ($oCustomParameter->getName() == $sName) {
                unset($this->oData->CustomParameters->List[$iIndex]);
                break;
            }
        }

        return $this;
    }
}