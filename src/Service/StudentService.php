<?php

namespace Mizz\StudentCrud\Service;

use Exception;
use Model\Students;
use Repository\StudentRepository;

class StudentService
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function addStudent(Students $students)
    {
        try {
        } catch (Exception $error) {
        }
    }
}