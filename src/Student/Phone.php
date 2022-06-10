<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Student;

use InvalidArgumentException;

class Phone implements \Stringable
{
    public function __construct(private string $ddd, private string $number)
    {
        $this->setDdd($ddd);
        $this->setNumber($this->number);
    }

    private function setDdd($ddd): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{2}/'
            ]
        ];

        if (filter_var($ddd, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new InvalidArgumentException('DDD is in invalid format');
        }

        $this->ddd = $ddd;
    }

    private function setNumber($number): void
    {
        if (preg_match('/\d{8,9}/', $number) !== 1) {
            throw new InvalidArgumentException('number is in invalid format');
        }

        $this->number = $number;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }
}
