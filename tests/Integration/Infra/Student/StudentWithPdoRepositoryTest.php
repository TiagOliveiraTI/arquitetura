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
        // self::$conn = ConnectionCreator::createConnection();
        self::$conn->exec(
            'CREATE TABLE IF NOT EXISTS students (
                cpf TEXT PRIMARY KEY,
                name TEXT,
                email TEXT);'
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

    public function testShouldListAllAStudents()
    {
        $student = Student::withCpfNameAndEmail('123.456.789-14', 'Tiago Oliveira', 'teste2@email.com');
        $sut = new StudentWithPdoRepository(self::$conn);
        $sut->add($student);

        $student = Student::withCpfNameAndEmail('123.456.789-10', 'Arthur Oliveira', 'teste@email.com');
        $sut = new StudentWithPdoRepository(self::$conn);
        $sut->add($student);

        $resp = $sut->findAll();

        static::assertCount(2, $resp);
        static::assertIsArray($resp);
    }
}
