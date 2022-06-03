<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura;

use InvalidArgumentException;

class Email implements \Stringable
{
    private string $endereco;

    public function __construct(string $endereco)
    {
        if (filter_var($endereco, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException('Endereço de e-mail inváilido');
        }

        $this->endereco = $endereco;
    }

    public function __toString(): string
    {
        return $this->endereco;
    }
}
