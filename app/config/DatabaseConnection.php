<?php
namespace App\Config;

class DatabaseConnection implements DatabaseConnectionInterface
{
    private static $dbInstance = null;

    private function __clone()
    {

    }

    public static function getInstance(): ?\PDO
    {
        if (self::$dbInstance == null) {
            try {
                self::$dbInstance = new \PDO('mysql:host=localhost;dbname=task', 'mysql', 'mysql',
                    [
                        \PDO::ATTR_EMULATE_PREPARES => false,
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                    ]);
            } catch (\PDOException $e) {
                echo "Error connecting to mysql: " . $e->getMessage();
            }
        }
        return self::$dbInstance;
    }
}