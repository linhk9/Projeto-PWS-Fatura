<?php
    require_once './models/User.php';

    class BaseAuthController extends BaseController
    {
        public function __construct()
        {
            $auth = new Auth();

            if(!$auth->isLoggedIn())
            {
                header('Location: ./router.php?' . INVALID_ACCESS_ROUTE);
            }
        }

        public function loginFilterByRole($roles = []){
            $auth = new Auth();

            $role = $auth->getRole();

            if(!in_array($role,$roles)){
                header('Location: ./router.php?' . INVALID_ACCESS_ROUTE);
            }

        }
    }