<?php 

    class Database {
        private $dbname = "my-db";
        private $host = "localhost";
        private $password;
        private $username = "root";

        private $connection;

        public function __construct() {
            try {
                $this->connection = new PDO("mysql:host=$this->host; dbname=$this->dbname;", $this->username);

                echo "Connection To database Success <br>";
            } catch(PDOExeption $e) {
                echo "Error :".$e->getMessage(); 
            }
        }

        public function getConn() {
            if ($this->connection) {
                echo "Here Is The Connection <br>";
                return $this->connection;
            } else {
                return false;
            }
           
        }

        public function closeConn() {
            if($this->connection) {
                $this->connection = null;
                echo "Successfully Closed Connection";
            } else {
                echo "No Connections are available";
            }
        }
    }

    // $database = new Database();
    // $database->getConn();
    // $database->closeConn();

?>