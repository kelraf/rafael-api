<?php 

    require_once("connection.php");

    class Tables extends Database {

        private $table_one = "users";
        private $table_two = "images";
        private $table_three = "posts"; 

        private $db;

        public function __construct() {
            parent::__construct();
            $this->db = $this->getConn();
        }

        public function __destruct() {
            $this->closeConn();
        }

        private function users() {

            try {

                $table = "
                    CREATE TABLE IF NOT EXISTS users(
                        user_id INT AUTO_INCREMENT PRIMARY KEY,
                        first_name VARCHAR(60),
                        middle_name VARCHAR(60),
                        last_name VARCHAR(60),
                        email_one VARCHAR(100),
                        email_two VARCHAR(100),
                        phone_one VARCHAR(20),
                        phone_two VARCHAR(20),
                        username VARCHAR(50) NOT NULL,
                        passw VARCHAR(100) NOT NULL,
                        conf_passw VARCHAR(100) NOT NULL
                    )
                ";

                $this->db->query($table);
                echo "Successfully Created The User Table <br>";
            } catch(PDOExeption $e) {
                echo "Error :".$e->getMessage();
            }
    }

    public function create_tables() {
        $this->users();
    }

}

    $tables = new Tables;
    $tables->getConn();
    $tables->create_tables();

?>