<?php
    include('classes/DAO/UserDAO.php');
    class UserService{

        private UserDAO $userDAO;

        public function createUser(User $user): int
        {
            $userDAO = new UserDAO();
            return $userDAO->createUser($user);
        }

        public function verify_user($user_email,$password): bool{
            $result = false;
            $userDAO = new UserDAO();
            $user = $userDAO->getUserByEmail($user_email);
            if($user != null){
                $result = $user->getPassword() === md5($password);
            }
            return $result;
        }
    }
