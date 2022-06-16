<div class="container justify-content-center"><br>
    <h1 class="fw-bold text-center">Gestão de IVA <a data-bs-toggle="modal" data-bs-target="#addIva"
                                                     class="btn btn-primary" role="button">Adicionar</a></h1>
    <?php if ($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Percentagem</th>
                <th scope="col">Descrição</th>
                <th scope="col">Vigor</th>
                <th scope="col">Editar</th>
                <th scope="col">Apagar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($ivas)) {
                foreach ($ivas as $iva) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $iva->id; ?></th>
                        <td><?php echo $iva->percentagem; ?></td>
                        <td><?php echo $iva->descricao; ?></td>
                        <td><?php echo $iva->vigor; ?></td>

                        <td><a data-bs-toggle="modal" data-bs-target="#editar<?php echo $iva->id ?>"
                               class="btn btn-primary" role="button">Editar</a></td>
                        <td><a href="./router.php?c=iva&a=destroy&id=<?php echo $iva->id ?>"
                               class="btn btn-primary" role="button">Apagar</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>

    <?php }
    if (isset($ivas)) {
        foreach ($ivas as $iva) {
            ?>
            <div class="modal fade" id="editar<?php echo $iva->id ?>" tabindex="-1" aria-labelledby="modalLabelIva"
                 aria-hidden="true">
                <div class="modal-dialog modal-l">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelIva">Editar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form action="./router.php?c=iva&a=update&id=<?php echo $iva->id ?>" method="post">
                                <h1 class="h3 mb-3 fw-normal text-center">Iva ID #<?php echo $iva->id ?></h1>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="percentagem"
                                           id="percentagem"
                                           value="<?php echo $iva->percentagem ?>" placeholder="percentagem">
                                    <label for="percentagem">Percentagem</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="descricao" id="descricao"
                                           value="<?php echo $iva->descricao ?>" placeholder="descricao">
                                    <label for="descricao">Descrição</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="vigor" id="vigor"
                                           value="<?php echo $iva->vigor ?>" placeholder="vigor">
                                    <label for="vigor">Vigor</label>
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

    <div class="modal fade" id="addIva" tabindex="-1" aria-labelledby="modalLabelAddIva"
         aria-hidden="true">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelAddIva">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form action="./router.php?c=iva&a=create" method="post">
                        <h1 class="h3 mb-3 fw-normal text-center">Adicionar Iva</h1>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="percentagem"
                                   id="percentagem"
                                   placeholder="percentagem" required>
                            <label for="percentagem">Percentagem</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="descricao" id="descricao"
                                   placeholder="descricao" required>
                            <label for="descricao">Descrição</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="vigor" id="vigor"
                                   placeholder="vigor" required>
                            <label for="vigor">Vigor</label>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Adicionar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
