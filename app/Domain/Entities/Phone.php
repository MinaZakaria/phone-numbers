<?php

namespace App\Domain\Entities;

use App\Domain\Constants\Country;
use App\Domain\Facades\PhoneUtility;

class Phone
{
    private $countryCode;
    private $localNumber;
    private $country;
    private $valid;

    public function __construct(string $phone)
    {
        $this->countryCode = PhoneUtility::getCountryCode($phone);
        $this->localNumber = PhoneUtility::getLocalNumber($phone);
        $this->country = Country::getByCode($this->countryCode);

        $validPhonePattern = $this->country->validPhonePattern();
        preg_match('/' . $validPhonePattern . '/', $phone, $matches);

        $this->valid = count($matches) > 0;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function getLocalNumber()
    {
        return $this->localNumber;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function isValid()
    {
        return $this->valid;
    }
}
