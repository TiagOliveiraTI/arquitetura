<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Tests\Integration\Infra\Student;

use OTaoDev\Arquitetura\Domain\Student\Student;
use PHPUnit\Framework\TestCase;
use OTaoDev\Arquitetura\Infra\Student\StudentWithPdoRepository;
use PDO;
use OTaoDev\Arquitetura\Infra\Persistence\ConnectionCreator;

class StudentWithPdoRepositoryTest extends TestCase
{
    protected static PDO $conn;
    public static function setUpBeforeClass(): void
    {
        self::$conn = new PDO('sqlite::memory:');
        self::$conn->exec(
            'CREATE TABLE students (
                cpf TEXT PRIMARY KEY,
                name TEXT,
                birth_date TEXT);'
        );
    }

    protected function setUp(): void
    {
        self::$conn->beginTransaction();
    }

    protected function tearDown(): void
    {
        self::$conn->rollBack();
    }

    public function testShouldAddAStudent()
    {
        $student = Student::withCpfNameAndEmail('123.456.789-14', 'Tiago Oliveira', 'teste2@email.com');
        $sut = new StudentWithPdoRepository(self::$conn);

        $resp = $sut->add($student);

        static::assertTrue($resp);
    }
}
