<?php

declare(strict_types = 1)
;

namespace OTaoDev\Arquitetura\Tests\Integration\Infra\Student;

use OTaoDev\Arquitetura\Domain\Student\Student;
use PHPUnit\Framework\TestCase;
use OTaoDev\Arquitetura\Infra\Student\StudentWithPdoRepository;
use PDO;
use OTaoDev\Arquitetura\Infra\Persistence\ConnectionCreator;

class StudentWithPdoRepositoryTest extends TestCase
{
    protected PDO $conn;
    protected function setUp(): void
    {
        $this->conn = ConnectionCreator::createConnection();
    }

    protected function tearDown(): void
    {
        $this->conn->exec('DELETE FROM students;');
    }

    public function testShouldAddAStudent()
    {
        $student = Student::withCpfNameAndEmail('123.456.789-14', 'Tiago Oliveira', 'teste2@email.com');
        $sut = new StudentWithPdoRepository($this->conn);

        $resp = $sut->add($student);

        static::assertTrue($resp);
    }
}
