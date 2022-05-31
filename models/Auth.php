<?php
    class Auth
    {
        public function __construct()
        {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
        }

        public function checkLogin($username, $password)
        {
            $user = User::find(array('username' => $username, 'password' => $password));

            if($user)
            {
                $_SESSION['nome'] = $user->username;
                $_SESSION['role'] = $user->role;
                $_SESSION['user_id'] = $user->id;
                return true;
            }

            return false;
        }

        public function isLoggedIn()
        {
            return isset($_SESSION['nome']);
        }

        public function logout()
        {
            session_destroy();
        }

        public function getUsername()
        {
            return $_SESSION['nome'] ?? null;
        }

        public function getRole()
        {
            return $_SESSION['role'] ?? null;
        }
    }