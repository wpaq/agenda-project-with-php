<?php

session_start();

class DBConnection {
    private $host = 'localhost';
    private $dbname = 'mybd';
    private $username = 'root';
    private $password = '';

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function startConnection() {        
        return $this->pdo;
    }

    public function endConnection() {
        return $this->pdo = null;
    }
}

?>