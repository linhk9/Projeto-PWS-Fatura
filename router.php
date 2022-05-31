<?php
    require_once './startup/boot.php';
    require_once './controllers/SiteController.php';
    require_once './controllers/LoginController.php';
    require_once './controllers/PlanoController.php';
    require_once './controllers/BookController.php';

    if(!isset($_GET['c'], $_GET['a']))
    {
        // omissão, enviar para site
        $controller = new SiteController();
        $controller->index();
    }
    else
    {
        // existem parametros definidos
        $c = $_GET['c'];
        $a = $_GET['a'];

        switch ($c)
        {
            case "login":
                $controller = new LoginController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;

                    case "login":
                        $controller->login();
                        break;

                    case "logout":
                        $controller->logout();
                }
                break;

            case "plano":
                $controller = new PlanoController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;

                    case "calcular":
                        $controller->calcular();
                        break;
                }
                break;

            case "site":
                $controller = new SiteController();
                $controller->index();
                break;
            case "book":
                $controller = new BookController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case "show":
                        $controller->show($_GET['id']);
                        break;
                    case "create":
                        $controller->create();
                        break;
                    case "store":
                        $controller->store();
                        break;
                    case "edit":
                        $controller->edit($_GET['id']);
                        break;
                    case "update":
                        $controller->update($_GET['id']);
                        break;
                    case "destroy":
                        $controller->delete($_GET['id']);
                        break;
                }
                break;

            default:
                $controller = new SiteController();
                $controller->index();
        }
    }