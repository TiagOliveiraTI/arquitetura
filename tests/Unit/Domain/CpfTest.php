<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Tests\Domain;

use InvalidArgumentException;
use OTaoDev\Arquitetura\Domain\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfWithInvalidFormatCannotExists()
    {
        $this->expectException(InvalidArgumentException::class);
        new Cpf('12345678910');
    }

    public function testCpfShouldBeRepresentedAsString()
    {
        $cpf = new Cpf('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}
