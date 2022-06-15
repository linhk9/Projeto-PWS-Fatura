<html lang="pt">
<head>
    <title><?= APP_NAME ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/css/style.css" rel="stylesheet">

    <style>
        .form-control {
            max-width: 330px;
            padding: 15px;
        }

        .form-control .form-floating:focus-within {
            z-index: 2;
        }

        .form-control input[type="name"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-control input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./router.php"><?= APP_NAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./router.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php
                        if(isset($username))
                        {
                            ?>
                            <a class="nav-link" href="./router.php?c=login&a=logout">Logout (<?= $username ?>)</a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a class="nav-link" href="./router.php?c=login&a=index">Login</a>
                            <?php
                        }
                    ?>
                </li>
                <?php
                    if(isset($username) && ($userRole === 'Administrador' || $userRole === 'Funcionario')) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./router.php?c=user&a=index">Gestão de Utilizador</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Empresa
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Gestão de Produtos e Stocks</a></li>
                            <li><a class="dropdown-item" href="#">Gestão do Iva</a></li>
                            <li><a class="dropdown-item" href="#">Gestão Dados Empresa</a></li>
                            <li><a class="dropdown-item" href="./router.php?c=fatura&a=index">Faturas</a></li>
                            <li><a class="dropdown-item" href="./router.php?c=fatura&a=historico">Histórico Faturas</a></li>
                          </ul>
                        </li>
                    <?php }
                    if (isset($username) && ($userRole === 'Administrador')) {
                        ?>
                        <li>
                            <a class="nav-link" href="./router.php?c=register&a=index">Register Utilizadores</a>
                        </li>
                        <?php 
                } ?>
            </ul>
        </div>
    </div>
</nav>