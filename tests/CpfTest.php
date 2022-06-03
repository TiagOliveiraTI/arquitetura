<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Tests;

use InvalidArgumentException;
use OTaoDev\Arquitetura\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfWithInvalidFormatCannotExists()
    {
        $this->expectException(InvalidArgumentException::class);
        new Cpf('12345678910');
    }
}