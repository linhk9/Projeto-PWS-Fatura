<?php

    require_once './models/User.php';

    class RegisterController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $users = User::all();
            $this->renderView('register/index');
        }
        public function register()
        {
            if((isset($_POST)))
            {
                $user = new User();
                $_POST['password'] = md5($_POST['password']);
                $user->update_attributes($_POST);
                if($user->is_valid()){
                    $user->save();
                }
            }
            $this->redirectToRoute('site', 'index');
        }
    }