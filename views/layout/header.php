<html lang="pt">
<head>
    <title><?= APP_NAME ?></title>
    <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .ui-w-40 {
            width: 40px !important;
            height: auto;
        }

        .card{
            box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
        }

        .ui-product-color {
            display: inline-block;
            overflow: hidden;
            margin: .144em;
            width: .875rem;
            height: .875rem;
            border-radius: 10rem;
            -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
            box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
            vertical-align: middle;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./router.php"><?= APP_NAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./router.php">Home</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($username)) {
                        ?>
                        <a class="nav-link" href="./router.php?c=login&a=logout">Logout (<?= $username ?>)</a>
                        <?php
                    } else {
                        ?>
                        <a class="nav-link" href="./router.php?c=login&a=index">Login</a>
                        <?php
                    }
                    ?>
                </li>
                <?php
                if (isset($username) && ($userRole === 'Administrador' || $userRole === 'Funcionario')) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./router.php?c=user&a=index">Gestão de Utilizador</a>
                    </li>

                    <li>
                        <a class="nav-link" href="./router.php?c=register&a=index">Registar Utilizador</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Empresa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="./router.php?c=produto&a=index">Gestão de Produtos e
                                    Stocks</a></li>
                            <li><a class="dropdown-item" href="./router.php?c=iva&a=index">Gestão do Iva</a></li>
                            <li><a class="dropdown-item" href="./router.php?c=empresa&a=index">Gestão de Dados</a>
                            </li>
                            <li><a class="dropdown-item" href="./router.php?c=fatura&a=index">Faturas</a></li>
                        </ul>
                    </li>
                <?php }
                    if (isset($username)) {
                        echo '<li><a class="nav-link" href="./router.php?c=fatura&a=historico">Histórico Faturas</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>