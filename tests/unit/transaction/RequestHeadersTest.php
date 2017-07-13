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
}