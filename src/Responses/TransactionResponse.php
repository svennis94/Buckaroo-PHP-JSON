<?php namespace SeBuDesign\BuckarooJson\Responses;

use SeBuDesign\BuckarooJson\Helpers\StatusCodeHelper;

class TransactionResponse
{
    const REQUIRED_ACTION_REDIRECT = 'redirect';

    protected $aResponseData;

    /**
     * TransactionResponse constructor.
     *
     * @param array $aData The response data
     */
    public function __construct($aData)
    {
        $this->aResponseData = $aData;
    }

    /**
     * Get the transaction key
     *
     * @return bool|string
     */
    public function getTransactionKey()
    {
        $mTransactionKey = false;
        if (isset($this->aResponseData['Key'])) {
            $mTransactionKey = $this->aResponseData['Key'];
        }

        return $mTransactionKey;
    }

    /**
     * Get the current status code
     *
     * @return int
     */
    public function getStatusCode()
    {
        $iCode = 0;
        if ($this->hasStatusCode()) {
            $iCode = $this->aResponseData['Status']['Code']['Code'];
        }

        return $iCode;
    }

    /**
     * Does the response have a status code?
     *
     * @return bool
     */
    protected function hasStatusCode()
    {
        return isset($this->aResponseData['Status'], $this->aResponseData['Status']['Code'], $this->aResponseData['Status']['Code']['Code']);
    }

    /**
     * Does the response have a sub status code?
     *
     * @return bool
     */
    protected function hasStatusSubCode()
    {
        return isset($this->aResponseData['Status'], $this->aResponseData['Status']['SubCode'], $this->aResponseData['Status']['SubCode']['Code']);
    }

    /**
     * Get the date and time of the last status change
     *
     * @return bool|\DateTime
     */
    public function getDateTimeOfStatusChange()
    {
        $mDateTime = false;
        if (isset($this->aResponseData['Status'], $this->aResponseData['Status']['DateTime'])) {
            $mDateTime = new \DateTime($this->aResponseData['Status']['DateTime']);
        }

        return $mDateTime;
    }

    /**
     * Does the transaction have a required action
     *
     * @return bool
     */
    public function hasRequiredAction()
    {
        return isset($this->aResponseData['RequiredAction']);
    }

    /**
     * Does the user has to be redirected?
     *
     * @return bool
     */
    public function hasToRedirect()
    {
        $bHasToRedirect = false;

        if (
            $this->hasRequiredAction() &&
            isset($this->aResponseData['RequiredAction']['Name']) &&
            strtolower($this->aResponseData['RequiredAction']['Name']) == self::REQUIRED_ACTION_REDIRECT
        ) {
            $bHasToRedirect = true;
        }

        return $bHasToRedirect;
    }

    /**
     * Get the redirect url
     *
     * @return bool|string
     */
    public function getRedirectUrl()
    {
        $mUrl = false;

        if ($this->hasToRedirect()) {
            $mUrl = $this->aResponseData['RequiredAction']['RedirectURL'];
        }

        return $mUrl;
    }

    /**
     * Get the requested information
     *
     * @return array
     */
    public function getRequestedInformation()
    {
        $aRequestedInformation = [];

        if ($this->hasRequiredAction() && !is_null($this->aResponseData['RequiredAction']['RequestedInformation'])) {
            $aRequestedInformation = $this->aResponseData['RequiredAction']['RequestedInformation'];
        }

        return $aRequestedInformation;
    }

    /**
     * Does this request has to pay a remainder
     *
     * @return bool
     */
    public function hasToPayRemainder()
    {
        return (isset($this->aResponseData['RequiredAction']['PayRemainderDetails']) && !is_null($this->aResponseData['RequiredAction']['PayRemainderDetails']));
    }

    /**
     * Get the remainder amount
     *
     * @return float
     */
    public function getRemainderAmount()
    {
        $fRemainderAmount = 0.0;

        if ($this->hasToPayRemainder() && isset($this->aResponseData['RequiredAction']['PayRemainderDetails']['RemainderAmount'])) {
            $fRemainderAmount = $this->aResponseData['RequiredAction']['PayRemainderDetails']['RemainderAmount'];
        }

        return $fRemainderAmount;
    }

    /**
     * Get the remainder currency
     *
     * @return boolean|string
     */
    public function getRemainderCurrency()
    {
        $mCurrency = false;

        if ($this->hasToPayRemainder() && isset($this->aResponseData['RequiredAction']['PayRemainderDetails']['Currency'])) {
            $mCurrency = $this->aResponseData['RequiredAction']['PayRemainderDetails']['Currency'];
        }

        return $mCurrency;
    }

    /**
     * Get the remainder group transaction
     *
     * @return boolean|string
     */
    public function getRemainderGroupTransaction()
    {
        $mGroupTransaction = false;

        if ($this->hasToPayRemainder() && isset($this->aResponseData['RequiredAction']['PayRemainderDetails']['GroupTransaction'])) {
            $mGroupTransaction = $this->aResponseData['RequiredAction']['PayRemainderDetails']['GroupTransaction'];
        }

        return $mGroupTransaction;
    }

    /**
     * Check if there are any errors from a specific type
     *
     * @param string $sErrorType The error type
     *
     * @return bool
     */
    public function hasErrorsFromType($sErrorType)
    {
        return (
            isset($this->aResponseData['RequestErrors'], $this->aResponseData['RequestErrors'][$sErrorType]) &&
            count($this->aResponseData['RequestErrors'][$sErrorType]) > 0
        );
    }

    /**
     * Get the errors from a specific type
     *
     * @param string $sErrorType The error type
     *
     * @return array
     */
    public function getErrorsFromType($sErrorType)
    {
        $aErrors = [];

        if ($this->hasErrorsFromType($sErrorType)) {
            $aErrors = $this->aResponseData['RequestErrors'][$sErrorType];
        }

        return $aErrors;
    }

    /**
     * Get all errors
     *
     * @return array
     */
    public function getErrors()
    {
        $aErrors = array_merge(
            $this->getErrorsFromType('ChannelErrors'),
            $this->getErrorsFromType('ServiceErrors'),
            $this->getErrorsFromType('ActionErrors'),
            $this->getErrorsFromType('ParameterErrors'),
            $this->getErrorsFromType('CustomParameterErrors')
        );

        return $aErrors;
    }

    /**
     * Are there any errors?
     *
     * @return bool
     */
    public function hasErrors()
    {
        $bErrors = false;

        if (
            count($this->getErrors()) > 0 ||
            $this->getStatusCode() == StatusCodeHelper::STATUS_VALIDATION_FAILURE ||
            $this->getStatusCode() == StatusCodeHelper::STATUS_TECHNICAL_FAILURE
        ) {
            $bErrors = true;
        }

        return $bErrors;
    }
}