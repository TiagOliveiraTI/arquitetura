<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Tests;

use InvalidArgumentException;

use OTaoDev\Arquitetura\Student\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testDddWithAnInvalidFormatShouldThrows()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD is in invalid format');
        new Phone('ddd','invalid_phone_number');
    }

    public function testPhoneNumberWithAnInvalidFormatShouldThrows()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectDeprecationMessage('number is in invalid format');
        new Phone('11','invalid_phone_number');
    }

    public function testNumberShouldBeRepresentedAsString()
    {
        $ddd = new Phone('11','987654321');
        $this->assertSame('(11) 987654321', (string) $ddd);
    }
}
