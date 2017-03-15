<?php namespace SeBuDesign\BuckarooJson\Helpers;

class StatusCodeHelper
{
    // Permanent Status
    const STATUS_SUCCESS = 190;
    const STATUS_FAILED = 490;
    const STATUS_VALIDATION_FAILURE = 491;
    const STATUS_TECHNICAL_FAILURE = 492;
    const STATUS_REJECTED = 690;
    const STATUS_CANCELLED_BY_USER = 890;
    const STATUS_CANCELLED_BY_MERCHANT = 891;

    // Temporary Status
    const STATUS_AWAITING_INPUT = 790;
    const STATUS_AWAITING_PROCESSING = 791;
    const STATUS_AWAITING_CUSTOMER = 792;
    const STATUS_AWAITING_HOLD = 793;

    /**
     * Is the status code a successful status code?
     *
     * @param integer $iStatusCode The status code to check
     *
     * @return bool
     */
    public static function isSuccessful($iStatusCode)
    {
        return $iStatusCode == self::STATUS_SUCCESS;
    }

    /**
     * Is the status code a rejected status code?
     *
     * @param integer $iStatusCode The status code to check
     *
     * @return bool
     */
    public static function isRejected($iStatusCode)
    {
        return $iStatusCode == self::STATUS_REJECTED;
    }

    /**
     * Is the status code a pending status code?
     *
     * @param integer $iStatusCode The status code to check
     *
     * @return bool
     */
    public static function isPending($iStatusCode)
    {
        return in_array($iStatusCode, [
            self::STATUS_AWAITING_INPUT,
            self::STATUS_AWAITING_PROCESSING,
            self::STATUS_AWAITING_CUSTOMER,
            self::STATUS_AWAITING_HOLD,
        ]);
    }

    /**
     * Is the status code a failure status code?
     *
     * @param integer $iStatusCode The status code to check
     *
     * @return bool
     */
    public static function isFailed($iStatusCode)
    {
        return in_array($iStatusCode, [
            self::STATUS_FAILED,
            self::STATUS_VALIDATION_FAILURE,
            self::STATUS_TECHNICAL_FAILURE,
        ]);
    }

    /**
     * Is the status code a cancelled status code?
     *
     * @param integer $iStatusCode The status code to check
     *
     * @return bool
     */
    public static function isCancelled($iStatusCode)
    {
        return in_array($iStatusCode, [
            self::STATUS_CANCELLED_BY_USER,
            self::STATUS_CANCELLED_BY_MERCHANT,
        ]);
    }

    /**
     * Is the status code a permanent status code?
     *
     * @param integer $iStatusCode The status code to check
     *
     * @return bool
     */
    public static function isPermanentStatus($iStatusCode)
    {
        return in_array($iStatusCode, [
            self::STATUS_SUCCESS,
            self::STATUS_FAILED,
            self::STATUS_VALIDATION_FAILURE,
            self::STATUS_TECHNICAL_FAILURE,
            self::STATUS_REJECTED,
            self::STATUS_CANCELLED_BY_USER,
            self::STATUS_CANCELLED_BY_MERCHANT,
        ]);
    }

    /**
     * Is the status code a temporary status code?
     *
     * @param integer $iStatusCode The status code to check
     *
     * @return bool
     */
    public static function isTemporaryStatus($iStatusCode)
    {
        return in_array($iStatusCode, [
            self::STATUS_AWAITING_INPUT,
            self::STATUS_AWAITING_PROCESSING,
            self::STATUS_AWAITING_CUSTOMER,
            self::STATUS_AWAITING_HOLD,
        ]);
    }
}