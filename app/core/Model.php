<?php

declare(strict_types=1);

namespace Core;

use PDO;
use PDOException;

/**
 * Class Model
 * 
 * PHP version 8.2.1
 */
class Model
{
    /**
     * Get the PDO database connection
     * 
     * @return mixed
     */
    protected static function getDb(): mixed
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        static $db = null;
        if (is_null($db)) {
            $host = $_ENV['DB_HOST'];
            $dbName = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];
        }

        $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pass, $options);

        return $db;
    }
}