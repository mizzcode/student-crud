<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Mizz\StudentCrud\App\Router;
use Mizz\StudentCrud\Config\Database;
use Mizz\StudentCrud\Controller\StudentController;

Database::getConnection();
// add student & delete student
Router::add("GET", "/", StudentController::class, "index");
Router::add("POST", "/", StudentController::class, "postSaveStudent");
// edit student
Router::add("GET", "/student/edit/([0-9]*)", StudentController::class, "editStudent");
Router::add("POST", "/student/edit/([0-9]*)", StudentController::class, "postEditStudent");

Router::run();