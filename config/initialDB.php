<?php

    require_once('config.php');
    class DB {
        private static $_instance = null;
        private $_pdo, $_query, $_error = false;

        private function __construct() {
            try {
                $this->_pdo = new PDO('mysql:host=' . DB_HOST, DB_USER, DB_PASS);
            } catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        public static function getInstance() {
            if (!isset(self::$_instance)) {
                self::$_instance = new DB();
                self::$_instance->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$_instance;
        }

        public function initDB($DB_name) {
            $sql = "CREATE DATABASE " . $DB_name;
            try {
                $this->_pdo->exec($sql);
                echo "Database created successfully\n";

                // Reconnect new database
                $this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage() . "\n";
            }
        }

        public function initUser() {
            $sql = "CREATE TABLE MyGuests (
                id INT(6) AUTO_INCREMENT UNIQUE PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50)
                )";
            echo $this->_pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
            die();
            try {
                $this->_pdo->exec($sql);
                echo "Table User created successfully\n";
            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage() . "\n";
            }
        }
    }

    $db = DB::getInstance();
    $db->initDB('newDB');
    $db->initUser();