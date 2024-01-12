<?php

require_once 'config.php';
class Database
{
    private $username;
    private $password;
    private $host;
    private $database;
    private $port = PORT;
    private static Database $instance;

    public function __construct()
    {
        $this->database = DATABASE;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->username = USERNAME;
        $this->port = PORT;
    }

    public function connect()
    {
        if(!isset($instance)) {
            try {
                $connection = new PDO(
                    "pgsql:host=$this->host;port=$this->port;dbname=$this->database;",
                    $this->username,
                    $this->password,
                    ["sslmode => prefer"]
                );
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connection;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return $instance;
    }
}

// TODO singleton