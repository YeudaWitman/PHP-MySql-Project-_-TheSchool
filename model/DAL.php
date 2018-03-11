<?php
    class DAL {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "theschool";
        private $lastId;

        function fetch($sql) {
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $resultsArray = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                return $resultsArray;
            }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }
        }

        function fetchInsert($sql) {
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                 
                $resultsArray = $conn->query($sql);
                $this->lastId = $conn->lastInsertId();
                return $this->lastId;
            }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }
        }

        

    }

?>