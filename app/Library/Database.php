<?php

namespace App\Library;

use \PDO;
use \PDOException;

class Database {
    private static $dataSource;
    private static $user;
    private static $password;
    private static $debug;
    private $connection;
    public $statement;

    public static function setup(array $settings): void
    {
        $dataSource =  $settings["engine"];
        $dataSource .= ':host='.$settings['host'];
        $dataSource .= ':'.$settings["port"];
        $dataSource .= ';dbname='.$settings['name'];
        $dataSource .= ';charset=utf8';

        self::$dataSource = $dataSource; 
        self::$user = $settings['user']; 
        self::$password = $settings['password'];
    }

    private function connect(array $options=null): void
    {
        try {
            $this->connection = new PDO(self::$dataSource, self::$user, self::$password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->setAttribute(PDO::ATTR_PERSISTENT, true);
        } catch (PDOException $error) {
            print "Error!: ". $error->getMessage()."<br/>";
        }
    }

    private function disconnect():void
    {
        $this->connection = null;
    }

    public function beginTransaction()
    {
        try {
            $this->connect();
            $this->connection-> beginTransaction();
        } catch (Exception $e) {
            $this->connection->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }

    public function prepare($query): void
    {
        $this->statements = $this->connection->prepare($query);
    }

    public function execute($data): void
    {
        $this->statements->execute($data);
    }

    public function bindParam($param, $var, $type, $maxLenght, $options): void
    {
        // Spread param
        $this->statements->bindParam($param);
    }

    public function commit()
    {
        $this->connection->commit();
        $this->disconnect();
    }

    public function query($sql)
    {
        try {
            $this->connect();
        } catch (Exception $e) {
            $this->connection->rollBack();
            echo "Failed: " . $e->getMessage();
            exit();
        }
        $result = $this->connection->query($sql);
        $this->disconnect();
        return $result;
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}