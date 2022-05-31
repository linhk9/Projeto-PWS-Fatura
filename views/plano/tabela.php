<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Credito</title>
    <style>

        body {
            font-family: Verdana;
        }

        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        td {
            padding: 10px;
        }

        .center{
            text-align: center;
        }

        thead{
            font-weight: bold;
            background-color: darkgrey;
        }

        tr > td:first-child {
            font-weight: bold;
            background-color: grey;
        }

    </style>
</head>
<body>
<h1 class="center"><b>Plano de Pagamentos</b></h1>
Valor a contrair: <?= $_POST['valor'] ?>€<br>
Número de prestações: <?= $_POST['numPrest'] ?><br>
Data do empréstimo: <?= $hoje->isoFormat('D/MM/YYYY') ?><br><br>

<table>
    <thead>
    <td>Nº Prestação</td>
    <td>Data</td>
    <td>Valor Prest.</td>
    <td>Valor em Divida</td>
    </thead>
    <?php

    foreach ($matriz as $key => $prestacao)
    {

        ?>

        <tr>
            <td><?= $key ?></td>
            <td><?= $prestacao['data']->isoFormat('D/MM/YYYY') ?></td>
            <td><?= round($prestacao['valor']/100, 2) ?></td>
            <td><?= round($prestacao['divida']/100, 2) ?></td>
        </tr>

        <?php
    }
    ?>
</table>
<br><br>
<b>O valor da despesa do crédito é de <?= round($matriz[1]['valor']/100, 2) ?>€ e encontra-se incluída na primeira prestação <?= $matriz[1]['data']->isoFormat('D/MM/YYYY') ?>. </b>
<?php require_once './views/layout/footer.php'; ?>