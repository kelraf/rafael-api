<?php 

    class UserDbValidate {

        public $user_id; 

        public $firstName;
        public $middleName;
        public $lastName;

        public $email;
        public $phone;

        public $username;
        public $passw;
        public $confPassw;

        protected $db;

        public function __construct() {
            // parent:: __construct();

            // $this->db = $this->getConn();
        }

        public function __destruct() {
            // $this->closeConn();
        }

        protected function user_id() {
            
            // Sanitize The id
            $this->user_id = filter_var($this->user_id, FILTER_SANITIZE_STRING);
        }

        public function names() {

            if (empty($this->firstName)) {
                return ["bool" => false, "message" => "First Name Is Required"];
            } elseif (empty($this->middleName)) {
                return ["bool" => false, "message" => "Middle Name Is Required"];
            } elseif (empty($this->lastName)) {
                return ["bool" => false, "message" => "Last Name Is Required"];
            } else {

                // Sanitize The Names
                $this->firstName = filter_var($this->firstName, FILTER_SANITIZE_STRING);
                $this->middleName = filter_var($this->middleName, FILTER_SANITIZE_STRING);
                $this->lastName = filter_var($this->lastName, FILTER_SANITIZE_STRING);

                // Remove Any White  Spaces
                $this->firstName = trim($this->firstName);
                $this->middleName = trim($this->middleName);
                $this->lastName = trim($this->lastName);

                if (strLen($this->firstName) < 2 or strLen($this->middleName) < 2 or strLen($this->lastName) < 2 ) {
                    return ["bool" => false, "message" => "Name Should Not Be less Than Two Characters"];
                } else {
                    return ["bool" => true];
                }

            }
            
        }

        protected function username() {

            // Sanitize Data
            $this->username = filter_var($this->username, FILTER_SANITIZE_STRING);

            // Remove Any White Spaces
            $this->username = trim($this->username);

            // Validate
            if(empty($this->username)) {
                return ["bool" => false, "message" => "Username Required"];
            } elseif (strlen($this->username) < 6) {
                return ["bool" => false, "message" => "Username Can't be less than Six Characters"];
            } else {
                return ["bool" => true];
            }

        }

        protected function passwords() {

            // Sanitize Data
            $this->passw = filter_var($this->passw, FILTER_SANITIZE_STRING);
            $this->confPassw = filter_var($this->confPassw, FILTER_SANITIZE_STRING);

            // Remove Any White Spaces
            $this->passw = trim($this->passw);
            $this->confPassw = trim($this->confPassw);

            if (empty($this->passw)) {
                return ["bool" => false, "message" => "Password Is Required"];
            } elseif (strLen($this->passw) < 6) {
                return ["bool" => false, "message" => "Password Cannot Be Less Than Six Characters"];
            } elseif (empty($this->confPassw)) {
                return ["bool" => false, "message" => "Password Confirmation Is Required"];
            } elseif (strLen($this->confPassw) < 6) {
                return ["bool" => false, "message" => "Your Confirm Password Cannot Be Less Than Six Characters"];
            } elseif ($this->passw != $this->confPassw) {
                return ["bool" => false, "message" => "Your Passwords Should Match"];
            } else {
                return ["bool" => true];
            }

        }

        protected function email() {

            // Sanitize Email
            $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);

            // Validate Email
            if(empty($this->email)) {
                return ["bool" => false, "message" => "Email Required"];
            } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return ["bool" => false, "message" => "Invalid Email"];
            } else {
                return ["bool" => true];
            }
        }
    }

    $validator = new UserDbValidate;

    // $validator->username = "<h1>kelraf</h1>";
    // $done_one = $validator->username();
    // echo $done_one["bool"];

    // $validator->email = "<h1>kelraf.kelraf@connect.com</h1>";
    // $done_one = $validator->email();
    // echo $done_one["bool"], $done_one["message"];

    // $validator->passw = "<h1>kelraf</h1>";
    // $validator->confPassw = "<h1>kelrag</h1>";

    // $done_one = $validator->passwords();
    // echo $done_one["bool"], $done_one["message"];

    // $validator->firstName = "Kelvin";
    // $validator->middleName = "Rafael";
    // $validator->lastName = "Kingara";

    // $done = $validator->names();

    // echo $done["bool"], $done["message"];

?>