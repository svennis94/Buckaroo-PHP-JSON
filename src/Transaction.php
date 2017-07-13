<?php namespace SeBuDesign\BuckarooJson;

use SeBuDesign\BuckarooJson\Parts\CustomParameter;
use \SeBuDesign\BuckarooJson\Parts\IpAddress;
use \SeBuDesign\BuckarooJson\Parts\OriginalTransactionReference;
use SeBuDesign\BuckarooJson\Parts\Service;
use SeBuDesign\BuckarooJson\Responses\TransactionResponse;

/**
 * Class Transaction
 *
 * @package SeBuDesign\BuckarooJson
 *
 * @method $this setCurrency( string $sCurrency )
 * @method string|boolean getCurrency()
 *
 * @method $this setAmountCredit( float $fAmountCredit )
 * @method float|boolean getAmountCredit()
 *
 * @method $this setAmountDebit( float $fAmountDebit )
 * @method float|boolean getAmountDebit()
 *
 * @method $this setInvoice( string $sInvoice )
 * @method string|boolean getInvoice()
 *
 * @method $this setOrder( string $sOrder )
 * @method string|boolean getOrder()
 *
 * @method $this setDescription( string $sDescription )
 * @method string|boolean getDescription()
 *
 * @method $this setClientIP( IpAddress $oIpAddress )
 * @method IpAddress|boolean getClientIP()
 *
 * @method $this setClientUserAgent( string $sUserAgent )
 * @method string|boolean getClientUserAgent()
 *
 * @method $this setReturnURL( string $sUrl )
 * @method string|boolean getReturnURL()
 *
 * @method $this setReturnURLCancel( string $sUrl )
 * @method string|boolean getReturnURLCancel()
 *
 * @method $this setReturnURLError( string $sUrl )
 * @method string|boolean getReturnURLError()
 *
 * @method $this setReturnURLReject( string $sUrl )
 * @method string|boolean getReturnURLReject()
 *
 * @method $this setOriginalTransactionKey( string $sOriginalTransactionKey )
 * @method string|boolean getOriginalTransactionKey()
 *
 * @method $this setStartRecurrent( boolean $bStartRecurrent )
 * @method boolean getStartRecurrent()
 *
 * @method $this setContinueOnIncomplete( integer $iContinueOnIncomplete )
 * @method integer|boolean getContinueOnIncomplete()
 *
 * @method $this setServicesSelectableByClient( string $sServicesSelectableByClient )
 * @method string|boolean getServicesSelectableByClient()
 *
 * @method $this setServicesExcludedForClient( string $sServicesSelectableByClient )
 * @method string|boolean getServicesExcludedForClient()
 *
 * @method $this setPushURL( string $sPushURL )
 * @method string|boolean getPushURL()
 *
 * @method $this setPushURLFailure( string $sPushURLFailure )
 * @method string|boolean getPushURLFailure()
 *
 * @method $this setOriginalTransactionReference( OriginalTransactionReference $oOriginalTransactionReference )
 * @method OriginalTransactionReference|boolean getOriginalTransactionReference()
 */
class Transaction extends RequestBase
{
    /**
     * Start the transaction
     *
     * @return TransactionResponse
     */
    public function start()
    {
        return new TransactionResponse(
            $this->performRequest('Transaction', 'POST')
        );
    }

    /**
     * Adds a custom parameter
     *
     * @param string $sName  The name of the custom parameter
     * @param mixed  $mValue The value of the custom parameter
     *
     * @return $this
     */
    public function addCustomParameter($sName, $mValue)
    {
        return $this->addParameter('CustomParameters', 'List', $sName, $mValue);
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
        return $this->getParameter('CustomParameters', 'List', $sName);
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
        return ( $this->getParameter('CustomParameters', 'List', $sName) !== false ? true : false );
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
        return $this->removeParameter('CustomParameters', 'List', $sName);
    }

    /**
     * Adds an additional parameter
     *
     * @param string $sName  The name of the additional parameter
     * @param mixed  $mValue The value of the additional parameter
     *
     * @return $this
     */
    public function addAdditionalParameter($sName, $mValue)
    {
        return $this->addParameter('AdditionalParameters', 'AdditionalParameter', $sName, $mValue);
    }

    /**
     * Gets a specific additional parameter
     *
     * @param string $sName The name of the additional parameter to get
     *
     * @return boolean|CustomParameter
     */
    public function getAdditionalParameter($sName)
    {
        return $this->getParameter('AdditionalParameters', 'AdditionalParameter', $sName);
    }

    /**
     * Checks if an additional parameter exists
     *
     * @param string $sName The name of the additional parameter to check
     *
     * @return boolean
     */
    public function hasAdditionalParameter($sName)
    {
        return ( $this->getParameter('AdditionalParameters', 'AdditionalParameter', $sName) !== false ? true : false );
    }

    /**
     * Removes a specific additional parameter
     *
     * @param string $sName The name of the custom additional to remove
     *
     * @return $this|boolean
     */
    public function removeAdditionalParameter($sName)
    {
        return $this->removeParameter('AdditionalParameters', 'AdditionalParameter', $sName);
    }

    /**
     * Adds a service object
     *
     * @param Service $oService The Service to add
     *
     * @return $this
     */
    public function addService($oService)
    {
        return $this->addParameter('Services', 'ServiceList', $oService);
    }

    /**
     * Gets a specific service object
     *
     * @param string $sName The name of the service object to get
     *
     * @return boolean|Service
     */
    public function getService($sName)
    {
        return $this->getParameter('Services', 'ServiceList', $sName);
    }

    /**
     * Checks if a service object exists
     *
     * @param string $sName The name of the additional parameter to check
     *
     * @return boolean
     */
    public function hasService($sName)
    {
        return ( $this->getParameter('Services', 'ServiceList', $sName) !== false ? true : false );
    }

    /**
     * Removes a specific service object
     *
     * @param string $sName The name of the service object to remove
     *
     * @return $this|boolean
     */
    public function removeService($sName)
    {
        return $this->removeParameter('Services', 'ServiceList', $sName);
    }

    /**
     * Add a custom or additional paramter
     *
     * @param string $sType    The type of parameter to add
     * @param string $sElement The element to add the parameter to
     * @param string $sName    The name of the parameter
     * @param mixed  $mValue   The value of the parameter
     *
     * @return $this
     */
    protected function addParameter($sType, $sElement, $sName, $mValue = null)
    {
        $this->ensureDataObject();

        if (!isset( $this->oData->{$sType} )) {
            $this->oData->{$sType} = new \stdClass();
            $this->oData->{$sType}->{$sElement} = [];
        }

        if (is_string($sName)) {
            $oCustomParameter = new CustomParameter();
            $oCustomParameter->setName($sName);
            $oCustomParameter->setValue($mValue);
        }

        if (!is_string($sName)) {
            $oCustomParameter = $sName;
            $sName = $oCustomParameter->getName();
        }

        if ($this->getParameter($sType, $sElement, $sName) !== false) {
            $this->removeParameter($sType, $sElement, $sName);
        }

        $this->oData->{$sType}->{$sElement}[] = $oCustomParameter;

        return $this;
    }

    /**
     * Get a specific custom or additional parameter
     *
     * @param string $sType    The type of parameter to get
     * @param string $sElement The element to get the parameter from
     * @param string $sName    The name of the parameter to get
     *
     * @return boolean|CustomParameter|Service
     */
    protected function getParameter($sType, $sElement, $sName)
    {
        $this->ensureDataObject();

        if (!isset( $this->oData->{$sType} ) || empty( $this->oData->{$sType}->{$sElement} )) {
            return false;
        }

        $mFound = false;

        foreach ($this->oData->{$sType}->{$sElement} as $oCustomParameter) {
            if ($oCustomParameter->getName() == $sName) {
                $mFound = $oCustomParameter;
                break;
            }
        }

        return $mFound;
    }

    /**
     * Removes a specific custom or additional parameter
     *
     * @param string $sType    The type of parameter to remove
     * @param string $sElement The element to remove the parameter from
     * @param string $sName The name of the parameter to remove
     *
     * @return $this
     */
    protected function removeParameter($sType, $sElement, $sName)
    {
        $this->ensureDataObject();

        if (!isset( $this->oData->{$sType} ) || empty( $this->oData->{$sType}->{$sElement} )) {
            return $this;
        }

        foreach ($this->oData->{$sType}->{$sElement} as $iIndex => $oCustomParameter) {
            if ($oCustomParameter->getName() == $sName) {
                unset( $this->oData->{$sType}->{$sElement}[ $iIndex ] );
                break;
            }
        }

        return $this;
    }

    /**
     * Services to string modifier
     *
     * @return array
     */
    public function toStringServicesModifier()
    {
        $aServices = [
            'ServiceList' => []
        ];

        foreach ($this->oData->Services->ServiceList as $oService)
        {
            $aService = get_object_vars($oService->oData);

            $aService['Parameters'] = [];
            if (isset($oService->oData->Parameters)) {
                foreach ($oService->oData->Parameters as $oParameter) {
                    $aService[ 'Parameters' ][] = get_object_vars($oParameter->oData);
                }
            }

            $aServices['ServiceList'][] = $aService;
        }

        return $aServices;
    }

    /**
     * CustomParameters to string modifier
     *
     * @return array
     */
    public function toStringCustomParametersModifier()
    {
        $aCustomParameters = [
            'List' => []
        ];

        foreach ($this->oData->CustomParameters->List as $oCustomParameter)
        {
            $aCustomParameters['List'][] = get_object_vars($oCustomParameter->oData);
        }

        return $aCustomParameters;
    }

    /**
     * AdditionalParameters to string modifier
     *
     * @return array
     */
    public function toStringAdditionalParametersModifier()
    {
        $aParameters = [
            'AdditionalParameter' => []
        ];

        foreach ($this->oData->AdditionalParameters->AdditionalParameter as $oAdditionalParameter)
        {
            $aParameters['AdditionalParameter'][] = get_object_vars($oAdditionalParameter->oData);
        }

        return $aParameters;
    }
}