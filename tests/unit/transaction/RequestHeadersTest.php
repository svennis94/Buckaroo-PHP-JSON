<?php namespace SeBuDesign\BuckarooJson\Tests;

class RequestHeadersTest extends TestCase
{
    /** @test */
    public function it_should_add_a_custom_http_header()
    {
        $sHeader = 'Culture';
        $sValue = 'nl-NL';

        $oTransaction = $this->getTransaction();

        $oTransaction->addClientHeader($sHeader, $sValue);

        $this->assertTrue($oTransaction->hasClientHeader($sHeader));
        $this->assertEquals($sValue, $oTransaction->getClientHeader($sHeader));
    }

    /** @test */
    public function it_should_replace_an_existing_header()
    {
        $sHeader = 'Culture';
        $sValue = 'nl-NL';

        $oTransaction = $this->getTransaction();

        $oTransaction->addClientHeader($sHeader, $sValue);

        $this->assertTrue($oTransaction->hasClientHeader($sHeader));
        $this->assertEquals($sValue, $oTransaction->getClientHeader($sHeader));

        $sReplaceValue = 'en-GB';

        $oTransaction->addClientHeader($sHeader, $sReplaceValue);

        $this->assertTrue($oTransaction->hasClientHeader($sHeader));
        $this->assertEquals($sReplaceValue, $oTransaction->getClientHeader($sHeader));
    }
}