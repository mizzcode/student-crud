<?php

namespace Mizz\StudentCrud\Repository;

use Mizz\StudentCrud\Model\Students;
use PDO;

class StudentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Students $student)
    {
        $sql = "INSERT INTO students (nim, nama, jurusan) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$student->nim, $student->nama, $student->jurusan]);
    }

    public function updateById(Students $student)
    {
        $sql = "UPDATE students SET nim = ?, nama = ?, jurusan = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$student->nim, $student->nama, $student->jurusan, $student->id]);
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

    public function findById($id): ?Students
    {
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);

        try {
            if ($row = $stmt->fetch()) {
                $student = new Students;
                $student->id = $row['id'];
                $student->nim = $row['nim'];
                $student->nama = $row['nama'];
                $student->jurusan = $row['jurusan'];
                return $student;
            } else {
                return null;
            }
        } finally {
            $stmt->closeCursor();
        }
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->connection->query($sql);

        $students = [];

        while ($row = $stmt->fetch()) {
            $student = [
                "id" => $row['id'],
                "nim" => $row['nim'],
                "nama" => $row['nama'],
                "jurusan" => $row['jurusan'],
            ];

            $students[] = $student;
        }

        return $students;
    }
}
