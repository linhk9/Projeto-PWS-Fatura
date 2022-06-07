<?php
    class UserController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $users = User::all();
            $this->renderView('user/index', ['users' => $users]);
        }
    }