<?php

namespace Mizz\StudentCrud\Controller;

use Mizz\StudentCrud\App\View;

class StudentController
{
    public function index()
    {
        View::render("Home/index", [
            "title" => "Student CRUD"
        ]);
    }
}
