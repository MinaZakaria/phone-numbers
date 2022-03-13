<?php

namespace App\Domain\Services;

use App\Domain\Constants\Country;

class CountryService
{
    public function list()
    {
        return Country::cases();
    }
}
