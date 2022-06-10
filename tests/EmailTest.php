<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Domain\Domain\Tests;


use OTaoDev\Arquitetura\Domain\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInInvalidFormatShouldThrows()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('invalid_email');
    }

    public function testEmailShouldBeRepresentedAsString()
    {
        $email = new Email('email@teste.com');
        $this->assertSame('email@teste.com', (string) $email);
    }
}