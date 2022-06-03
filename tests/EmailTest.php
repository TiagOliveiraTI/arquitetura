<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Tests;

use OTaoDev\Arquitetura\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInInvalidFormatShouldThrows()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('invalid_email');
    }
}