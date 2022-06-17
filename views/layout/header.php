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
        .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
                border-collapse: collapse;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
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