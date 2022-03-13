<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Domain\Constants\Country;

class CountryEnumTest extends TestCase
{

    public function test_get_country_code_from_country_success()
    {
        $country = Country::CAMEROON;

        $this->assertEquals('+237', $country->getCountryCode());
    }

    public function test_get_country_by_code_success()
    {
        $country = Country::getByCode('+237');

        $this->assertEquals(Country::CAMEROON, $country);
    }
}
