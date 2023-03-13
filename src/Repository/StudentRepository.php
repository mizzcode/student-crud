<?php

namespace Mizz\StudentCrud\Repository;

use Model\Students as Student;
use PDO;

class StudentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Student $student)
    {
        $sql = "INSERT INTO students (nim, nama, jurusan) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$student->nim, $student->nama, $student->jurusan]);

        if ($stmt) {
            $_SESSION['message'] = 'Add Student Succesfully';
            header("Location: /");
            exit;
        } else {
            $_SESSION['message'] = 'Add Student Failed';
            header("Location: /");
            exit;
        }
    }

    public function updateById(Student $student)
    {
        $sql = "UPDATE students SET nim = ?, nama = ?, jurusan = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$student->nim, $student->nama, $student->jurusan, $student->id]);

        if ($stmt) {
            $_SESSION['message'] = 'Update Student Succesfully';
            header("Location: /");
            exit;
        } else {
            $_SESSION['message'] = 'Update Student Failed';
            header("Location: /");
            exit;
        }
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt) {
            $_SESSION['message'] = 'Delete Student Succesfully';
            header("Location: /");
            exit;
        } else {
            $_SESSION['message'] = 'Delete Student Failed';
            header("Location: /");
            exit;
        }
    }
}