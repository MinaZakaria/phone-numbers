<?php

namespace App\Infrastructure\Utils;

class PhoneUtility
{
    public static function getCountryCode(string $phone): string
    {
        return '+' . trim(explode(' ', $phone)[0], '()');
    }

    public static function getLocalNumber(string $phone): string
    {
        return explode(' ', $phone)[1];
    }
}
