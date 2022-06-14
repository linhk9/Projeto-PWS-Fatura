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
        public function update($id){
 
            if((isset($_POST)))
            {
                $user = User::find([$id]);
                $_POST['password'] = md5($_POST['password']);
                $user->update_attributes($_POST);
                if($user->is_valid()){
                    $user->save();
                }
            }
            $this->redirectToRoute('user', 'index');
        }
    }