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

        $students = $this->studentService->getStudentAll();

        View::render(
            "Home/index",
            [
                "title" => "Student CRUD",
                "students" => $students
            ]
        );
    }

    public function postSaveStudent()
    {
        if (isset($_POST['save_student'])) {

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

    // view edit student
    public function editStudent($id)
    {
        $student = $this->studentService->getStudentById($id);

        View::render("Home/edit_student", [
            "title" => "Edit Student",
            "student" => $student
        ]);
    }

    public function postEditStudent($id)
    {
        // jika button edit student di tekan
        if (isset($_POST['edit_student'])) {
            // buat object students dan isi value dari form method post
            $request = new Students;
            $request->id = $id;
            $request->nim = $_POST['nim'];
            $request->nama = $_POST['nama'];
            $request->jurusan = $_POST['jurusan'];

            try {
                $this->studentService->editStudent($request);
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
