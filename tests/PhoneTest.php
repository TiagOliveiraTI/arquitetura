<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Tests;

use InvalidArgumentException;
use OTaoDev\Arquitetura\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testDddWithAnInvalidFormatShouldThrows()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone('ddd','invalid_phone_number');
    }
}
