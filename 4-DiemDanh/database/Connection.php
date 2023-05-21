<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'tlu_attendance');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

class Connection
{
    private static $connection = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getConnection()
    {
        if (!self::$connection) {
            try {
                self::$connection = new PDO(
                    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
                    DB_USER,
                    DB_PASSWORD
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }

        return self::$connection;
    }

    public static function close()
    {
        self::$connection = null;
    }
}
