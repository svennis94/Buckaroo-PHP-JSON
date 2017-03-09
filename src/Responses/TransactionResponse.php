<?php namespace SeBuDesign\BuckarooJson\Responses;

use SeBuDesign\BuckarooJson\Helpers\StatusCodeHelper;

class TransactionResponse
{
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