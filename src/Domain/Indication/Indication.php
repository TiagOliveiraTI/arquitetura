<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura;

use DateTimeImmutable;

class Indication
{
    private \DateTimeImmutable $date;

    public function __construct(private Student $indicatorStudent, private Student $nominated)
    {
        $this->date = new DateTimeImmutable();
    }
}
