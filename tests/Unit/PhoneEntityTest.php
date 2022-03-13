<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Domain\Entities\Phone;
use App\Domain\Facades\PhoneUtility;

class PhoneEntityTest extends TestCase
{
    public function test_phone_parsing_success()
    {
        $phone = '(212) 6007989253';

        PhoneUtility::shouldReceive('getCountryCode')
            ->once()
            ->andReturn('+212');

        PhoneUtility::shouldReceive('getLocalNumber')
            ->once()
            ->andReturn('6007989253');

        $phoneEntity = new Phone($phone);

        $this->assertEquals('+212', $phoneEntity->getCountryCode());
        $this->assertEquals('6007989253', $phoneEntity->getLocalNumber());
        $this->assertEquals(false, $phoneEntity->isValid());
    }
}
