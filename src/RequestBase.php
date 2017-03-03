<?php namespace SeBuDesign\BuckarooJson;

use GuzzleHttp\Client;

class RequestBase
{
    /**
     * The Buckaroo website key
     *
     * @var string
     */
    protected $sWebsiteKey;

    /**
     * The Buckaroo secret key
     *
     * @var string
     */
    protected $sSecretKey;

    /**
     * Is this a test transaction?
     *
     * @var boolean
     */
    protected $bTesting = false;

    /**
     * The Buckaroo endpoint
     *
     * @var string
     */
    protected $sEndpoint = 'https://checkout.buckaroo.nl/json/';

    /**
     * The HTTP Client
     *
     * @var Client
     */
    protected $oHttpClient;

    /**
     * The request data
     *
     * @var array
     */
    protected $aData = [];

    /**
     * Transaction constructor.
     *
     * @param string $sWebsiteKey The Buckaroo Website Key
     * @param string $sSecretKey  The Buckaroo Secret Key
     */
    public function __construct($sWebsiteKey, $sSecretKey)
    {
        $this->sWebsiteKey = $sWebsiteKey;
        $this->sSecretKey = $sSecretKey;
        $this->oHttpClient = new Client();
    }

    /**
     * Set the attributes for a test Transaction
     *
     * @return $this
     */
    public function putInTestMode()
    {
        $this->bTesting = true;
        $this->sEndpoint = 'https://testcheckout.buckaroo.nl/json/';

        return $this;
    }

    /**
     * Dynamically set and get values
     *
     * @param string $sName      The name of the called function
     * @param array  $aArguments The arguments passed to the function
     *
     * @return $this|mixed
     */
    public function __call($sName, $aArguments)
    {
        // Check if the method exists in the class
        if (!method_exists($this, $sName)) {
            if (strpos($sName, 'set') === 0 && count($aArguments) == 1) {
                // With a method that starts with set, set the data

                $sName = str_replace('set', '', $sName);
                $this->aData[ $sName ] = $aArguments[ 0 ];

                return $this;
            } elseif (strpos($sName, 'get') === 0) {
                // With a method that starts with get, get the data

                $sName = str_replace('get', '', $sName);

                return ( isset( $this->aData[ $sName ] ) ? $this->aData[ $sName ] : false );
            }
        }
    }
}