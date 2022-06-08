<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faturas</title>
</head>
<body>
    <h1 class="center"><b>Faturas</b></h1>
        <table class="table" id="table1">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Palavra-Pass</th>
                <th scope="col">Edit</th>
                <th scope="col">Guardar</th>
                <th scope="col">Apagar</th>
              </tr>
            </thead>
            <tbody id = "table2">
                <tr class = "tr">
                    <?php foreach ($users as $user):?>
                            <th scope="row" class = "nmr"><?php echo ($user ->  );?></th>
                            <td class = "nome"><?php echo ($user=>);?></td>
                            <td class = "Email"><?php echo ($user=>);?></td>
                            <td class = "Pass"><?php echo ($user=>);?></td>
                            <td><img src="public/img/Edit.png" class="Edit"  href="./router.php?c=fatura&a=index"></td>
                            <td><img src="public/img/guardar.png" class="Guardar" href="./router.php?c=fatura&a=index"></td>
                            <td><img src="public/img/delete.png" class="Apagar" href="./router.php?c=fatura&a=index"></td>
                        }
                    <?php endforeach;?>
        </tr>
    </tbody>
</table>
