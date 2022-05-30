<?php 
    class User{
        private string $first_name;
        private string $last_name;
        private string $email;
        private string $password;

        function __construct($first_name,$last_name,$email,$password){
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->password = md5($password);
        }


        public function getFirstname():string{
            return $this->first_name;
        }

        public function setFirstname(string $first_name):void{
            $this->first_name = $first_name;
        }

        public function getLastname():string{
            return $this->last_name;
        }

        public function setLastname(string $last_name):void{
            $this->last_name = $last_name;
        }

        public function getEmail():string{
            return $this->email;
        }

        public function setEmail(string $email):void{
            $this->$email = $email;
        }

        public function getPassword():string{
            return $this->password;
        }
        public function setPassword(string $password):void{
            $this->password = md5($password);
        }
    }
