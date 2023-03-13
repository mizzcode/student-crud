<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Mizz\StudentCrud\App\Router;
use Mizz\StudentCrud\Config\Database;
use Mizz\StudentCrud\Controller\StudentController;

Database::getConnection();

Router::add("GET", "/", StudentController::class, "index");

Router::run();
