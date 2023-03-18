<?php

namespace Mizz\StudentCrud\Service;

use Exception;
use Mizz\StudentCrud\Model\Students;
use Mizz\StudentCrud\Config\Database;
use Mizz\StudentCrud\Repository\StudentRepository;
use ReflectionClass;
use ReflectionProperty;

class StudentService
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function addStudent(Students $request)
    {
        // $this->validate($request);

        try {
            Database::beginTransaction();

            $student = new Students;
            $student->nim = $request->nim;
            $student->nama = $request->nama;
            $student->jurusan = $request->jurusan;

            $this->studentRepository->save($student);

            Database::commitTransaction();
        } catch (Exception $error) {
            Database::rollbackTransaction();
            throw $error;
        }
    }

    public function editStudent(Students $request)
    {
        try {
            Database::beginTransaction();

            $student = $this->studentRepository->findById($request->id);

            $student->id = $request->id;
            $student->nim = $request->nim;
            $student->nama = $request->nama;
            $student->jurusan = $request->jurusan;

            $this->studentRepository->updateById($student);

            Database::commitTransaction();
        } catch (Exception $error) {
            Database::rollbackTransaction();
            throw $error;
        }
    }

    public function deleteStudentById($id)
    {
        try {
            $this->studentRepository->deleteById($id);
        } catch (Exception $error) {
            throw $error;
        }
    }


    public function getStudentById($id)
    {
        return $this->studentRepository->findById($id);
    }


    public function getStudentAll()
    {
        return $this->studentRepository->findAll();
    }

    // private function validate(object $request)
    // {
    //     $reflection = new ReflectionClass($request);
    //     $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

    //     foreach ($properties as $property) {
    //         if (trim($property->getValue($request)) == '') {
    //             throw new Exception("Kolom $property->name tidak boleh kosong");
    //         }
    //     }
    // }
}
