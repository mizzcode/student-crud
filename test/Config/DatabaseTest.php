<?php

namespace Mizz\StudentCrud\Config;

use Mizz\StudentCrud\Config\Database;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    function testConnection()
    {
        $connection = Database::getConnection();

        self::assertNotNull($connection);
    }
}
