<?php

namespace App\Domain\Constants;

enum Country: string
{
    case CAMEROON = 'Cameroon';
    case ETHIOPIA = 'Ethiopia';
    case MOROCCO = 'Morocco';
    case MOZAMBIQUE = 'Mozambique';
    case UGANDA = 'Uganda';

    public function getCountryCode(): string
    {
        return match ($this) {
            Country::CAMEROON => '+237',
            Country::ETHIOPIA => '+251',
            Country::MOROCCO => '+212',
            Country::MOZAMBIQUE => '+258',
            Country::UGANDA => '+256',
        };
    }

    public function validPhonePattern(): string
    {
        return match ($this) {
            Country::CAMEROON => '\(237\)\ ?[2368]\d{7,8}$',
            Country::ETHIOPIA => '\(251\)\ ?[1-59]\d{8}$',
            Country::MOROCCO => '\(212\)\ ?[5-9]\d{8}$',
            Country::MOZAMBIQUE => '\(258\)\ ?[28]\d{7,8}$',
            Country::UGANDA => '\(256\)\ ?\d{9}$',
        };
    }

    public static function getByCode(string $countryCode): ?Country
    {
        foreach (Country::cases() as $country) {
            if ($country->getCountryCode() == $countryCode) {
                return $country;
            }
        }

        return null;
    }
}
