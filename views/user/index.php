<body>
    <div class="container-fluid">
        <div class="row">
            <h1 class="fw-bold text-center">Gestão de Utilizador</h1>
            <div class="col-md-5 mb-4">
                <div class="card">
                    <div class="card-header">
                        Atualizar Email/Password
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="userEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="userEmail" value="email@example.com">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="userPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="userPassword">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                        </div>
                    </div>
                    <table class="table" id="table1">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Palavra-Pass</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Apagar</th>
                          </tr>
                        </thead>
                        <tbody id = "table2">
                            <?php 
                            if (isset($users)){
                                var_dump($users);
                                foreach ($users as $user) {
                                    if ($user -> role == 'Cliente' ||  $user -> role == 'Funcionario'){?>
                                        <tr class = "tr">
                                            <th scope="row" class = "nmr"><?php echo $user -> id;?></th>
                                            <td class = "nome"><?php echo $user -> username;?></td>
                                            <td class = "Email"><?php echo $user -> email;?></td>
                                            <td class = "Pass" ><?php echo $user -> password;?></td>
                                            <td class = "Role" ><?php echo $user -> role;?></td>
                                            <td><a data-bs-toggle="modal" data-bs-target="#editar" class="btn btn-primary" role="button">Editar</a></td>
                                            <td><a href="./router.php?c=user&a=destroy&id=<?=$user -> id; ?>" class="btn btn-primary" role="button">Apagar</a></td>
                                        </tr>
                            <?php }}}?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="./router.php?c=user&a=update&id=<?=$user -> id;?>" method="post">
                                <table class="table" id="table1">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Palavra-Pass</th>
                                      </tr>
                                    </thead>
                                    <tbody id = "table2">
                                        <tr class = "tr">
                                            <th scope="row" class = "nmr"><?php echo $user -> id;?></th>
                                            <td class = "nome"><input type="text" name="username" id="username" value="<?php echo $user -> username;?>"></td>
                                            <td class = "Email"><input type="text" name="email" id="email" value="<?php echo $user -> email;?>"></td>
                                            <td class = "Pass" ><input type="password" name="password" id="password" value="<?php echo $user -> password;?>"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                &nbsp<input class="btn btn-info" role="button" type="submit">
                            </form>
                          </div>
                          <div class="modal-footer">
                            <a href="./router.php?c=user&a=index" class="btn btn-primary" role="button">Guardar</a>
                          </div>
                        </div>  
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
