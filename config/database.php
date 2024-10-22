<?php
class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=biblioteca2', 'thiago', 'Santi300++');
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}


