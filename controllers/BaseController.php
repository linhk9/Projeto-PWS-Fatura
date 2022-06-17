<?php
    require_once './models/Auth.php';

    class BaseController
    {
        protected function renderView($view, array $params = [])
        {
            extract($params);

            $auth = new Auth();

            if($auth->isLoggedIn()){
                $username = $auth->getUsername();
                $userRole = $auth->getRole();
                $userId = $auth->getUserId();

            }

            require_once './views/layout/header.php';
            require_once './views/' . $view . '.php';
            require_once './views/layout/footer.php';
        }
        public function redirectToRoute($controllerPrefix, $action, $params = []){
            $url = 'Location: router.php?c='.$controllerPrefix.'&a='.$action;

            foreach ($params as $paramKey => $paramValue){
                $url.='&'.$paramKey.'='.$paramValue;
            }
            header($url);
        }
    }