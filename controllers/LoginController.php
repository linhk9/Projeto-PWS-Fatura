<?php

    require_once './models/User.php';

    class LoginController extends BaseController
    {
        public function index()
        {
            $auth = new Auth();
            if(!$auth->isLoggedIn())
            {
                $this->renderView('login/index');
            }
            else
            {
                $this->redirectToRoute('fatura', 'index');
            }
        }

        public function login()
        {
            if(isset($_POST['name'], $_POST['password']))
            {
                $auth = new Auth();
                if($auth->checkLogin($_POST['name'], $_POST['password']))
                {
                    $this->redirectToRoute('index', 'index');
                }
                else
                {
                    $this->redirectToRoute('login', 'index');
                }
            }
            else
            {
                $this->redirectToRoute('login', 'index');
            }
        }

        public function logout()
        {
            $auth = new Auth();
            $auth->logout();
            $this->redirectToRoute('site', 'index');
        }
    }