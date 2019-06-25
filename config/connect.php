<?php

    class Database {
        private $host = 'localhost';
        private $user = 'root';
        private $password = 'demilade';
        private $dbname = 'assessment';
        private $conn;

        public function connect(){
            $this->conn = null;
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
            try {
                $this->conn = new PDO($dsn,$this->user,$this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Database error: '. $e->getMessage();
            }
            return $this->conn;
        }
    }   