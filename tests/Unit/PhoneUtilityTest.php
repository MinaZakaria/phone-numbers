<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Infrastructure\Utils\PhoneUtility;

class PhoneUtilityTest extends TestCase
{
    public function test_extract_country_code_success()
    {
        $phone = '(212) 6007989253';

        $this->assertEquals('+212', PhoneUtility::getCountryCode($phone));
    }

    public function test_extract_local_number_success()
    {
        $phone = '(212) 6007989253';

        $this->assertEquals('6007989253', PhoneUtility::getLocalNumber($phone));
    }
}
