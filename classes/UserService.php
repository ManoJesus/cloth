<?php
    include('UserDAO.php');
    class UserService{

        private UserDAO $userDAO;

        public function createUser(User $user): int
        {
            $userDAO = new UserDAO();
            return $userDAO->createUser($user);
        }

        public function verify_if_user_exists($user_email): bool{
            $userDAO = new UserDAO();
            $user = $userDAO->getUserByEmail($user_email);
            return !($user!==null);
        }
    }
