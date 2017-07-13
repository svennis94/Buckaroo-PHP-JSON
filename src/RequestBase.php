<?php namespace SeBuDesign\BuckarooJson;

use GuzzleHttp\Client;
use SeBuDesign\BuckarooJson\Partials\Data;

class RequestBase
{
    use Data;

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
    protected $aRequestData = [
        'base_uri' => 'https://checkout.buckaroo.nl/json/',
        'headers'  => [
            'Content-Type' => 'application/json',
        ],
    ];

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
        $this->aRequestData['base_uri'] = 'https://testcheckout.buckaroo.nl/json/';

        return $this;
    }

    /**
     * Add a header to the Guzzle HTTP client
     *
     * @param string $sHeaderKey   The name of the header
     * @param string $sHeaderValue The value of the header
     *
     * @return $this
     */
    public function addClientHeader($sHeaderKey, $sHeaderValue)
    {
        $this->aRequestData['headers'][$sHeaderKey] = $sHeaderValue;

        return $this;
    }

    /**
     * Checks if a header is added to the Guzzle HTTP client
     *
     * @param string $sHeaderKey The name of the header
     *
     * @return boolean
     */
    public function hasClientHeader($sHeaderKey)
    {
        return isset(
            $this->aRequestData['headers'],
            $this->aRequestData['headers'][$sHeaderKey]
        );
    }

    /**
     * Retrieve a header from the Guzzle HTTP client
     *
     * @param string $sHeaderKey The name of the header
     *
     * @return mixed
     */
    public function getClientHeader($sHeaderKey)
    {
        return (
            $this->hasClientHeader($sHeaderKey) ?
            $this->aRequestData['headers'][$sHeaderKey] :
            null
        );
    }

    /**
     * Generate the authorization header
     *
     * @param string $sContent A string of the content to post/put/patch
     * @param string $sCall    The API call that will be called
     * @param string $sMethod  The HTTP method used for the API call
     *
     * @return string
     */
    protected function getAuthorizationHeader($sContent, $sCall, $sMethod)
    {
        if (!empty($sContent)) {
            $sContent = base64_encode(
                md5($sContent, true)
            );
        }

        $iTime = time();

        $sNonce = sprintf(
            '%04x%04x%04x%04x%04x%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );

        $sUrl = strtolower(
            urlencode(
                str_replace(
                    ['http://', 'https://'],
                    '',
                    $this->aRequestData['base_uri'] . $sCall
                )
            )
        );

        $sEncrypted = $this->sWebsiteKey . $sMethod . $sUrl . $iTime . $sNonce . $sContent;

        $sHash = base64_encode(hash_hmac('sha256', $sEncrypted, $this->sSecretKey, true));

        return "hmac {$this->sWebsiteKey}:{$sHash}:{$sNonce}:{$iTime}";
    }

    /**
     * Performs a request to the Buckaroo JSON API
     *
     * @param string $sCall    The JSON call to perform
     * @param string $sMethod  The method to use
     * @param array  $aOptions The request options
     *
     * @return array
     */
    protected function performRequest($sCall, $sMethod = 'GET', $aOptions = [])
    {
        $aOptions = array_merge($this->aRequestData, $aOptions);

        switch ($sMethod) {
            case 'POST':
                $sContent = (string) $this;
                $aOptions['body'] = $sContent;
                break;

            default:
                $sContent = '';
                break;
        }


        $aOptions['headers']['Authorization'] = $this->getAuthorizationHeader($sContent, $sCall, $sMethod);

        $oResponse = $this->oHttpClient->request($sMethod, $sCall, $aOptions);

        return json_decode($oResponse->getBody()->getContents(), true);
    }
}
