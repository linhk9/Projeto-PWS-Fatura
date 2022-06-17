<div class="container justify-content-center"><br>
    <?php if ($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
        <h1 class="fw-bold text-center">Gestão de Produto <a data-bs-toggle="modal" data-bs-target="#addProduto" class="btn btn-primary" role="button">Adicionar</a></h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Referencia</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Stock</th>
                <th scope="col">Iva</th>
                <th scope="col">Editar</th>
                <th scope="col">Apagar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($produtos)) {
                foreach ($produtos as $produto) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $produto->id; ?></th>
                        <td><?php echo $produto->referencia; ?></td>
                        <td><?php echo $produto->descricao; ?></td>
                        <td><?php echo $produto->preco; ?> €</td>
                        <td><?php echo $produto->stock; ?></td>
                        <td><?php echo $produto->iva->percentagem; ?> %</td>
                        <td><a data-bs-toggle="modal" data-bs-target="#editar<?php echo $produto->id ?>"
                               class="btn btn-primary" role="button">Editar</a></td>
                        <td><a href="./router.php?c=produto&a=destroy&id=<?php echo $produto->id ?>"
                               class="btn btn-primary" role="button">Apagar</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>

        <?php
        if (isset($produtos)) {
            foreach ($produtos as $produto) {
                ?>
                <div class="modal fade" id="editar<?php echo $produto->id ?>" tabindex="-1"
                     aria-labelledby="modalLabelProduto"
                     aria-hidden="true">
                    <div class="modal-dialog modal-l">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabelProduto">Editar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>

                            <div class="modal-body p-5 pt-0">
                                <form action="./router.php?c=produto&a=update&id=<?php echo $produto->id ?>"
                                      method="post">
                                    <h1 class="h3 mb-3 fw-normal text-center">Produto Id
                                        #<?php echo $produto->id ?></h1>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" name="referencia"
                                               id="referencia"
                                               value="<?php echo $produto->referencia ?>" placeholder="referencia"
                                               maxlength="7">
                                        <label for="referencia">Referencia</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" name="descricao"
                                               id="descricao"
                                               value="<?php echo $produto->descricao ?>" placeholder="descricao">
                                        <label for="descricao">Descrição</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" name="preco" id="preco"
                                               value="<?php echo $produto->preco ?>" placeholder="preco">
                                        <label for="preco">Preco</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" name="stock" id="stock"
                                               value="<?php echo $produto->stock ?>" placeholder="stock">
                                        <label for="stock">Stock</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="iva_id">Iva</label>
                                        <select class="form-control" id="iva_id" name="iva_id">
                                            <?php
                                            if (isset($ivas)) {
                                                foreach ($ivas as $iva) {
                                                    if ($iva->vigor) {
                                                        echo '<option value="' . $iva->id . '">' . $iva->percentagem . '%</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                    foreach ($ivas as $iva) {
                                        if ($iva->vigor) {
                                            echo ' <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Guardar
                                            </button>';
                                            break;
                                        } else {
                                            echo ' <a class="w-100 mb-2 btn btn-lg rounded-3 btn-primary disabled" aria-disabled="true" role="button">Guardar</a>';
                                            break;
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>

        <div class="modal fade" id="addProduto" tabindex="-1" aria-labelledby="modalLabelAddProduto"
             aria-hidden="true">
            <div class="modal-dialog modal-l">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelAddProduto">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form action="./router.php?c=produto&a=create" method="post">
                            <h1 class="h3 mb-3 fw-normal text-center">Adicionar Produto</h1>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" name="referencia"
                                       id="referencia"
                                       placeholder="referencia" maxlength="7" required>
                                <label for="referencia">Referencia</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" name="descricao" id="descricao"
                                       placeholder="descricao" required>
                                <label for="descricao">Descrição</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" name="preco" id="preco"
                                       placeholder="preco" required>
                                <label for="preco">Preço</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" name="stock" id="stock"
                                       placeholder="vigor" required>
                                <label for="stock">Stock</label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="iva_id">Iva</label>
                                <select class="form-control" id="iva_id" name="iva_id">
                                    <?php
                                    if (isset($ivas)) {
                                        foreach ($ivas as $iva) {
                                            if ($iva->vigor) {
                                                echo '                            
                                                    <option value="' . $iva->id . '">' . $iva->percentagem . '%</option>
                                                ';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php
                            foreach ($ivas as $iva) {
                                if ($iva->vigor) {
                                    echo ' <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Adicionar
                                    </button>';
                                    break;
                                } else {
                                    echo ' <a class="w-100 mb-2 btn btn-lg rounded-3 btn-primary disabled" aria-disabled="true" role="button">Adicionar</a>';
                                    break;
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
