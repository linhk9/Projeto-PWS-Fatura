<?php
    require_once './startup/boot.php';
    require_once './controllers/BaseController.php';
    require_once './controllers/BaseAuthController.php';
    require_once './controllers/SiteController.php';
    require_once './controllers/LoginController.php';
    require_once './controllers/UserController.php';
    require_once './controllers/RegisterController.php';
    require_once './controllers/EmpresaController.php';
    require_once './controllers/IvaController.php';
    require_once './controllers/ProdutoController.php';
    require_once './controllers/FaturaController.php';

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
            case 'register':
                $controller = new RegisterController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case 'register':
                        $controller->register();
                        break;
                }
                break;

            case "user":
                $controller = new UserController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case "destroy":
                        $controller->delete($_GET['id']);
                        break;
                    case "update":
                        $controller->update($_GET['id']);
                        break;
                }
                break;

            case "empresa":
                $controller = new EmpresaController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case "destroy":
                        $controller->delete($_GET['id']);
                        break;
                    case "update":
                        $controller->update($_GET['id']);
                        break;
                    case "create":
                        $controller->create();
                        break;
                }
                break;

            case "iva":
                $controller = new IvaController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case "destroy":
                        $controller->delete($_GET['id']);
                        break;
                    case "update":
                        $controller->update($_GET['id']);
                        break;
                    case "create":
                        $controller->create();
                        break;
                }
                break;

            case "produto":
                $controller = new ProdutoController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case "destroy":
                        $controller->delete($_GET['id']);
                        break;
                    case "update":
                        $controller->update($_GET['id']);
                        break;
                    case "create":
                        $controller->create();
                        break;
                }
                break;

            case "fatura":
                $controller = new FaturaController();
                switch ($a)
                {
                    case "index":
                        $controller->index();
                        break;
                    case "historico":
                        $controller->historico();
                        break;
                    case "produtos":
                        $controller->produtos();
                        break;
                    case "addProduto":
                        $controller->linhaFatura($_GET['cId'], $_GET['fId'], $_GET['pId']);
                        break;
                    case "carrinho":
                        $controller->carrinho($_GET['cId'], $_GET['fId']);
                        break;
                    case "checkout":
                        $controller->checkout($_GET['fId']);
                        break;
                }
                break;

            case "site":
                $controller = new SiteController();
                $controller->index();
                break;

            default:
                $controller = new SiteController();
                $controller->index();
        }
    }