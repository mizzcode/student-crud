<?php

namespace Mizz\StudentCrud\Controller;

use Exception;
use Mizz\StudentCrud\Model\Students;
use Mizz\StudentCrud\App\View;
use Mizz\StudentCrud\Config\Database;
use Mizz\StudentCrud\Repository\StudentRepository;
use Mizz\StudentCrud\Service\StudentService;

class StudentController
{
    private StudentService $studentService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $studentRepository = new StudentRepository($connection);
        $this->studentService = new StudentService($studentRepository);
    }

    public function index()
    {

        $students = $this->studentService->getFindAll();

        View::render(
            "Home/index", [
                "title" => "Student CRUD",
                "students" => $students
            ]
        );
    }

    public function postStudent()
    {
        if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
            $student = new Students;
            $student->nim = $_POST['nim'];
            $student->nama = $_POST['nama'];
            $student->jurusan = $_POST['jurusan'];

            try {
                $this->studentService->addStudent($student);
                View::redirect("/");
            } catch (Exception $error) {
                View::render(
                    "Home/index",
                    [
                        'title' => "Student CRUD",
                        'error' => $error->getMessage()
                    ]
                );
            }
        }
    }
}
