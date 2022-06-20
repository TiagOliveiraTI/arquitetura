<?php

declare(strict_types=1);

namespace OTaoDev\Arquitetura\Infra\Student;

use OTaoDev\Arquitetura\Domain\Cpf;
use OTaoDev\Arquitetura\Domain\Student\Student;
use OTaoDev\Arquitetura\Domain\Student\StudentRepository;
use PDOStatement;
use OTaoDev\Arquitetura\Domain\Email;

class StudentWithPdoRepository implements StudentRepository
{
    public function __construct(private \PDO $conn)
    {
    }

    public function add(Student $student): bool
    {
        $sql = 'INSERT INTO students VALUES (:cpf, :name, :email)';
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            throw new \RuntimeException('Erro ao executar a query no banco');
        }

        $success = $stmt->execute([
            ':cpf' => $student->cpf(),
            ':name' => $student->name(),
            ':email' => $student->email()
        ]);

        return $success;
    }

    public function findByCpf(Cpf $cpf): Student
    {
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM students;';
        $stmt = $this->conn->query($sql);

        return $this->hydrateStudentList($stmt);
    }

    private function hydrateStudentList(PDOStatement $stmt): array
    {
        $studentDataList = $stmt->fetchAll($this->conn::FETCH_ASSOC);
        $studentList = [];
        foreach ($studentDataList as $studentData) {
            $studentList[] = new Student(
                new Cpf($studentData['cpf']),
                $studentData['name'],
                new Email($studentData['email'])
            );
        }

        return $studentList;
    }
}
