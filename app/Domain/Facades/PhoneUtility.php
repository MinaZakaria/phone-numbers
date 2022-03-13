<?php

namespace App\Domain\Facades;

use Illuminate\Support\Facades\Facade;

class PhoneUtility extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'phoneUtility';
    }
}
