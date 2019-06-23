<?php 

    // require_once("../config/database/connection.php");
    require_once("user_db_validate.php");

    class UserDetails extends UserDbValidate {

        public function __construct() {
            parent::__construct();
        }

        public function register() {
            
            $username = $this->username();
            $passwords = $this->passwords();

            if(!$username["bool"]) {

                return ["bool" => false, "message" => $username["message"]];

            } elseif (!$passwords["bool"]) {

                return ["bool" => false, "message" => $passwords["message"]];

            } else {

                return ["bool" => true, "message" => "Successfully Validated Infor"];

            }
        }

        public function editNames() {

            $names = $this->names();

            if (!$names["bool"]) {

                return ["bool" => false, "message" => $names["message"]];

            } else {

                return ["bool" => false, "message" => "Successfully Validated The Names"];

            }
        }

        public function editUsername(){

            if (!$this->username()["bool"]) {

               return ["bool" => false, "message" => $this->username()["message"]];

            } else {

                return ["bool" => true, "message" => "Successfully Validated Username"];

            }
        }

        public function editPasswords() {

            if (!$this->passwords()["bool"]) {
                return ["bool" => false, "message" => $this->passwords()["message"]];
            } else {
                return ["bool" => true, "message" => "Successfully Validated Passwords"];
            }

        }
            
        public function editEmail() {

            if (!$this->email()["bool"]) {
                return ["bool" => false, "message" => $this->email()["message"]];
            } else {
                return ["bool" => true, "message" => "Successfully Validated Email"];
            }
        }
            
        public function editPhone() {}
                 
    }

    // $user = new UserDetails;
    // $user->username = "kelraf ";
    // $user->passw = "winraf";
    // $user->confPassw = "winrar";

    // $success = $user->register();

    // echo $success["message"];

    // $user->username = "<h1>kelr ";
    // $success = $user->editUsername();
    // echo $success["message"];

    // $user->email = "<h1>kelraf.kelraf@gmail.com ";
    // $success = $user->editEmail();
    // echo $success["message"];

?>