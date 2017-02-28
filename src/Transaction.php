<?php namespace SeBuDesign\BuckarooJson;

use GuzzleHttp\Client;

class Transaction
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
}