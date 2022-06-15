<body class="d-flex flex-column h-100">
    <div class="container justify-content-center"><br>
        <h1 class="fw-bold text-center">Gestão de Utilizador</h1>
        <?php if($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Percentagem</th>
                <th scope="col">Descrição</th>
                <th scope="col">Vigor</th>
            </tr>
            </thead>
            <tbody id = "table2">
            <?php
            if (isset($users)){
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $user -> id;?></th>
                        <td><?php echo $user -> username;?></td>
                        <td><?php echo $user -> email;?></td>
                        <td><a data-bs-toggle="modal" data-bs-target="#editar<?php echo $user -> id?>" class="btn btn-primary" role="button">Editar</a></td>
                    </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
</body>