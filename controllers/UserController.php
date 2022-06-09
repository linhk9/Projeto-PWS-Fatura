<?php
    class UserController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $users = User::all();
            $this->renderView('user/index', ['users' => $users]);
        }

        public function delete($id)
        {
            $users = User::find([$id]);
            $users->delete();
            $this->redirectToRoute('user', 'index');
        }
        public function update($id)
        {
            $users = User::all();
            if(($_POST['username'] !== " " && $_POST['email'] !== " "&& $_POST['password'] !== " "))
            {
                $user = User::find([$id]);
                $user->update_attributes($_POST);
                if($user->is_valid()){
                    $user->save();
                    $this->redirectToRoute('user', 'index');
                }
            }
            else
            {
                $users = User::find([$id]);
                $this->redirectToRoute('user', 'index');
            }
        }
    }