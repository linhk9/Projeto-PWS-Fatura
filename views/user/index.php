<body class="d-flex flex-column h-100">
    <div class="container justify-content-center">
        <h1 class="fw-bold text-center">Gestão de Utilizador</h1>
            <?php if($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Apagar</th>
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
                                <td><?php echo $user -> role;?></td>
                                <td><a data-bs-toggle="modal" data-bs-target="#editar<?php echo $user -> id?>" class="btn btn-primary" role="button">Editar</a></td>
                                <?php
                                    if ($userId !== $user -> id) {
                                        echo '<td><a href="./router.php?c=user&a=destroy&id='.$user -> id.'" class="btn btn-primary" role="button">Apagar</a></td>';
                                    } else {
                                        echo '<td><a class="btn btn-primary disabled" aria-disabled="true" role="button">Apagar</a></td>';
                                    }
                                ?>
                            </tr>
                        <?php }}?>
                    </tbody>
                </table>
            <?php }?>
        <?php
        if (isset($users)){
            foreach ($users as $user) {
                ?>
                <div class="modal fade" id="editar<?php echo $user -> id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-l">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body p-5 pt-0">
                                <form action="./router.php?c=user&a=update&id=<?php echo $user -> id?>" method="post">
                                    <h1 class="h3 mb-3 fw-normal text-center">User ID #<?php echo $user -> id?></h1>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" id="username" value="<?php echo $user -> username?>">
                                        <label for="username">Username</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control rounded-3" id="email" value="<?php echo $user -> email?>">
                                        <label for="email">Email</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control rounded-3" id="password" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" id="role" value="<?php echo $user -> role?>">
                                        <label for="role">Password</label>
                                    </div>

                                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }}?>
        </div>
    </div>
</body>
