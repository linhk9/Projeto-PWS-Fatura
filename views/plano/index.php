<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Credito</title>
    <style>

        body {
            font-family: Verdana, serif;
        }

        .center{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="center"><b>Plano de Pagamentos</b></h1>
    <form action="./router.php?c=plano&a=calcular" method="post">
        <label for="valor">Valor a contrair</label>
        <input type="text" id="valor" name="valor">
        <br>
        <label for="numPrest">Prestações</label>
        <input type="text" id="numPrest" name="numPrest">
        <br>
        <input type="submit">
    </form>
<?php require_once './views/layout/footer.php'; ?>