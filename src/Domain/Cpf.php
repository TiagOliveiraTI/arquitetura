<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Domain;

use InvalidArgumentException;

class Cpf implements \Stringable
{
    private string $number;

    public function __construct(string $number)
    {
        $this->number($number);
    }

    private function number(string $number): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new InvalidArgumentException('Invalid CPF format');
        }

        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->number;
    }
}
