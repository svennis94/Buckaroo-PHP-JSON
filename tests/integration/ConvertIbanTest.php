<?php namespace SeBuDesign\BuckarooJson\Tests;

use SeBuDesign\BuckarooJson\Tools\IbanConverter;

class ConvertIbanTest extends TestCase
{
    /** @testx */
    public function it_should_convert_to_iban()
    {
        $oIbanConverter = new IbanConverter(getenv('BUCKAROO_KEY'), getenv('BUCKAROO_SECRET'));
        $oIbanConverter->addAccount(
            '414959926',
            'ABNA',
            'NL'
        );
        $oResponse = $oIbanConverter->convert();
    }
}