<?php
class Database
{
    public $conn;
    public function connectToDatabse()
    {
        require 'connectionCredentials.php';
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $username, $password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}