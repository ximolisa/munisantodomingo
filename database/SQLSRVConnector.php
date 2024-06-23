<?php

namespace database;
use PDO;
use PDOException;

class SQLSRVConnector {
    private static $instance;
    private $servername = "localhost";
    private $username = "sqladmin";
    private $password = "@administrator2024";
    private $dbname = "Northwind";
    private $connection;

    public function __construct() {
        try{
            $this->connection = new PDO("sqlsrv:Server={$this->servername};Database={$this->dbname}", "{$this->username}", "{$this->password}");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            throw new PDOException("Error de conexión, contáctese con soporte. Detalles -> ERR: " . $ex->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }

}