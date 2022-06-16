<div class="container justify-content-center"><br>
    <h1 class="fw-bold text-center">Gestão de Utilizador</h1>
        <?php if($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Apagar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($users)){
                    foreach ($users as $user) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $user -> id;?></th>
                            <td><?php echo $user -> username;?></td>
                            <td><?php echo $user -> email;?></td>
                            <td><?php echo $user -> role;?></td>
                            <?php
                                if ($userRole === 'Administrador') {
                            ?>
                                <td><a data-bs-toggle="modal" data-bs-target="#editar<?php echo $user -> id?>" class="btn btn-primary" role="button">Editar</a></td>
                                <?php
                                    if ($userId !== $user -> id) {
                                        echo '<td><a href="./router.php?c=user&a=destroy&id='.$user -> id.'" class="btn btn-primary" role="button">Apagar</a></td>';
                                    } else {
                                        echo '<td><a class="btn btn-primary disabled" aria-disabled="true" role="button">Apagar</a></td>';
                                    }
                                ?>
                            <?php } elseif ($userRole === 'Funcionario' && $user->role === 'Cliente') {?>
                                    <td><a data-bs-toggle="modal" data-bs-target="#editar<?php echo $user -> id?>" class="btn btn-primary" role="button">Editar</a></td>
                                    <?php
                                    if ($userId !== $user -> id) {
                                        echo '<td><a href="./router.php?c=user&a=destroy&id='.$user -> id.'" class="btn btn-primary" role="button">Apagar</a></td>';
                                    } else {
                                        echo '<td><a class="btn btn-primary disabled" aria-disabled="true" role="button">Apagar</a></td>';
                                    }
                                    ?>
                            <?php } else { ?>
                                    <td><a class="btn btn-primary disabled" aria-disabled="true" role="button">Editar</a></td>
                                    <td><a class="btn btn-primary disabled" aria-disabled="true" role="button">Apagar</a></td>
                            <?php } ?>
                        </tr>
                    <?php }}?>
                </tbody>
            </table>

        <?php  }?>
    <?php
    if (isset($users)){
        foreach ($users as $user) {
            ?>
            <div class="modal fade" id="editar<?php echo $user -> id?>" tabindex="-1" aria-labelledby="modalLabelUser" aria-hidden="true">
                <div class="modal-dialog modal-l">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelUser">Editar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form action="./router.php?c=user&a=update&id=<?php echo $user -> id?>" method="post">
                                <h1 class="h3 mb-3 fw-normal text-center">User ID #<?php echo $user -> id?></h1>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="username" id="username" value="<?php echo $user -> username?>" placeholder="username">
                                    <label for="username">Username</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-3" name="email" id="email" value="<?php echo $user -> email?>" placeholder="email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-3" name="password" id="password" value="<?php echo $user -> password?>" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="telefone" id="telefone" value="<?php echo $user -> telefone?>" placeholder="telefone">
                                    <label for="telefone">Telefone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="morada" id="morada" value="<?php echo $user -> morada?>" placeholder="morada">
                                    <label for="morada">Morada</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="codigopostal" id="codigopostal" value="<?php echo $user -> codigopostal?>" placeholder="codigo postal">
                                    <label for="codigopostal">Código-Postal</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="localidade" id="local" value="<?php echo $user -> localidade?>" placeholder="localidade">
                                    <label for="local">Localidade</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="role">Role:</label>
                                    <select class="form-control" id="role" name="role">
                                        <?php
                                            if ($userRole === 'Administrador') {
                                                ?>
                                                    <option value="Administrador" <?php if($user -> role === "Administrador") { echo 'selected'; } ?>>Administrador</option>
                                                    <option value="Funcionario" <?php if($user -> role === "Funcionario") { echo 'selected'; } ?>>Funcionario</option>
                                                    <option value="Cliente" <?php if($user -> role === "Cliente") { echo 'selected'; } ?>>Cliente</option>
                                                <?php
                                                    } elseif ($userRole === 'Funcionario') {
                                                ?>
                                                    <option value="Cliente" <?php if($user -> role === "Cliente") { echo 'selected'; } ?> disabled>Cliente</option>
                                                <?php
                                            }
                                        ?>
                                    </select>
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
