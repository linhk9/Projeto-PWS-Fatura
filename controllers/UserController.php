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
            $user = User::find([$id]);
            $user->delete();
            $this->redirectToRoute('user', 'index');
        }

        public function update($id){
 
            if(isset($_POST))
            {
                $user = User::find([$id]);

                if (isset($_POST['password']) && ($user->password !== $_POST['password'])) {
                    $_POST['password'] = md5($_POST['password']);
                } else {
                    $_POST['password'] = $user->password;
                }

                $user->update_attributes($_POST);
                if($user->is_valid()){
                    $user->save();
                }
            }
            $this->redirectToRoute('user', 'index');
        }
    }