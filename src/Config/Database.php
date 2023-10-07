<?php


namespace Mizz\StudentCrud\Config;

use PDO;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): ?PDO
    {
        $host = 'localhost';
        $port = 3306;
        $database = 'student_crud';
        $username = 'root';
        $password = '';

        if (self::$connection == null) {
            self::$connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
        }

        return self::$connection;
    }

    public static function beginTransaction()
    {
        self::$connection->beginTransaction();
    }
    public static function commitTransaction()
    {
        self::$connection->commit();
    }
    public static function rollbackTransaction()
    {
        self::$connection->rollBack();
    }
}
