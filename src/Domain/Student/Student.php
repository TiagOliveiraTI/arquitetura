<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Domain\Student;

use OTaoDev\Arquitetura\Domain\Cpf;
use OTaoDev\Arquitetura\Domain\Email;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public static function withCpfNameAndEmail(string $cpf, string $name, string $email)
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function addPhoneNumber(string $ddd, string $number)
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): Email
    {
        return $this->email;
    }
}
