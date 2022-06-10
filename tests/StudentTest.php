<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Tests;

use OTaoDev\Arquitetura\Student\Student;

class StudentTest extends \PHPUnit\Framework\TestCase
{
    public function testShouldAddAPhoneNumber()
    {
        $student = Student::withCpfNameAndEmail('123.456.789-10', 'Tiago Olivreira', 'test@email.com');

        $student->addPhoneNumber('11', '987654321');

        static::assertInstanceOf(Student::class, $student);
        static::assertClassHasAttribute('cpf',Student::class);
        static::assertClassHasAttribute('name',Student::class);
        static::assertClassHasAttribute('email',Student::class);
        static::assertClassHasAttribute('phones',Student::class);
    }
}
