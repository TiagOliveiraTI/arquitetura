<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura;

use InvalidArgumentException;

class Phone
{
    public function __construct(private string $ddd, private string $number)
    {
        $this->dddValidate($ddd);
    }

    private function dddValidate($ddd): Phone
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}/'
            ]
        ];

        if (filter_var($ddd, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new InvalidArgumentException('DDD is in invalid format');
        }

        return $this;
    }
}
