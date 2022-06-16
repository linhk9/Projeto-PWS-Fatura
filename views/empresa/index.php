<div class="container justify-content-center"><br>
    <h1 class="fw-bold text-center">Gestão de Dados da Empresa <a data-bs-toggle="modal" data-bs-target="#addEmpresa"
                                                                 class="btn btn-primary" role="button">Adicionar</a></h1>
    <?php if ($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Designação Social</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Nif</th>
                <th scope="col">Morada</th>
                <th scope="col">Código Postal</th>
                <th scope="col">Localidade</th>
                <th scope="col">Capital Social</th>
                <th scope="col">Editar</th>
                <th scope="col">Apagar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($empresas)) {
                foreach ($empresas as $empresa) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $empresa->id; ?></th>
                        <td><?php echo $empresa->designacaosocial; ?></td>
                        <td><?php echo $empresa->email; ?></td>
                        <td><?php echo $empresa->telefone; ?></td>
                        <td><?php echo $empresa->nif; ?></td>
                        <td><?php echo $empresa->morada; ?></td>
                        <td><?php echo $empresa->codigopostal; ?></td>
                        <td><?php echo $empresa->localidade; ?></td>
                        <td><?php echo $empresa->capitalsocial; ?></td>

                        <td><a data-bs-toggle="modal" data-bs-target="#editar<?php echo $empresa->id ?>"
                               class="btn btn-primary" role="button">Editar</a></td>
                        <td><a href="./router.php?c=empresa&a=destroy&id=<?php echo $empresa->id ?>"
                               class="btn btn-primary" role="button">Apagar</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>

    <?php }
    if (isset($empresas)) {
        foreach ($empresas as $empresa) {
            ?>
            <div class="modal fade" id="editar<?php echo $empresa->id ?>" tabindex="-1" aria-labelledby="modalLabelEmpresa"
                 aria-hidden="true">
                <div class="modal-dialog modal-l">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelEmpresa">Editar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form action="./router.php?c=empresa&a=update&id=<?php echo $empresa->id ?>" method="post">
                                <h1 class="h3 mb-3 fw-normal text-center">Empresa ID #<?php echo $empresa->id ?></h1>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="designacaosocial" id="designacaosocial"
                                           value="<?php echo $empresa->designacaosocial ?>" placeholder="designacaosocial">
                                    <label for="designacaosocial">Designacao Social</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-3" name="email" id="email"
                                           value="<?php echo $empresa->email ?>" placeholder="email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="telefone" id="telefone"
                                           value="<?php echo $empresa->telefone ?>" placeholder="telefone">
                                    <label for="telefone">Telefone</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="nif" id="nif"
                                           value="<?php echo $empresa->nif ?>" placeholder="nif">
                                    <label for="nif">Nif</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="morada" id="morada"
                                           value="<?php echo $empresa->morada ?>" placeholder="morada">
                                    <label for="morada">Morada</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="codigopostal" id="codigopostal"
                                           value="<?php echo $empresa->codigopostal ?>" placeholder="codigopostal">
                                    <label for="v">Código-Postal</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="localidade"
                                           id="localidade" value="<?php echo $empresa->localidade ?>"
                                           placeholder="localidade">
                                    <label for="localidade">Localidade</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="localidade" id="local"
                                           value="<?php echo $empresa->localidade ?>" placeholder="localidade">
                                    <label for="local">Localidade</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="capitalsocial" id="capitalsocial"
                                           value="<?php echo $empresa->capitalsocial ?>" placeholder="capitalsocial">
                                    <label for="capitalsocial">Capital Social</label>
                                </div>

                                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Guardar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } ?>

    <div class="modal fade" id="addEmpresa" tabindex="-1" aria-labelledby="modalLabelAddEmpresa"
         aria-hidden="true">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelAddEmpresa">Nova Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form action="./router.php?c=empresa&a=create" method="post">
                        <h1 class="h3 mb-3 fw-normal text-center">Adicionar Empresa</h1>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="designacaosocial"
                                   id="designacaosocial"
                                   placeholder="designacaosocial" required>
                            <label for="designacaosocial">Designacao Social</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" name="email" id="email"
                                   placeholder="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="telefone" id="telefone"
                                   placeholder="telefone" maxlength="9" required>
                            <label for="telefone">Telefone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="nif" id="nif"
                                   placeholder="nif" maxlength="9" required>
                            <label for="nif">Nif</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="morada" id="morada"
                                   placeholder="morada" required>
                            <label for="morada">Morada</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="codigopostal" id=codigopostal"
                                   placeholder="codigopostal" required>
                            <label for="codigopostal">Código Postal</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="localidade" id=localidade"
                                   placeholder="localidade" required>
                            <label for="localidade">Localidade</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="capitalsocial" id=capitalsocial"
                                   placeholder="capitalsocial" required>
                            <label for="capitalsocial">Capital Social</label>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Adicionar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
