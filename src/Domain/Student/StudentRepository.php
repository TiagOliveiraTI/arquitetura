<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Domain\Student;

use OTaoDev\Arquitetura\Domain\Cpf;

interface StudentRepository
{
    public function add(Student $student): void;

    public function findByCpf(Cpf $cpf): Student;

    /**
     * @return Student[]
     */
    public function findAll(): array;
}
