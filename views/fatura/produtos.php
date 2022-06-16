<div class="container justify-content-center"><br>
    <?php if ($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
        <h1 class="fw-bold text-center">Faturas - Lista de Produtos</h1>
        <div class="form-group col-md-3">
            <a class="btn btn-primary" href="./router.php?c=fatura&a=carrinho&cId=<?php echo $cliente_id;?>&fId=<?php echo $fatura_id;?>" role="button">Ver Carrinho</a>
        </div>

        <table class="table table-hover" id="produtosTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Referencia</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Stock</th>
                <th scope="col">Iva</th>
                <th scope="col">Quantidade</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($produtos)){
                foreach ($produtos as $produto) {
                    if ($produto->stock > 0) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $produto -> id;?></th>
                            <td><?php echo $produto -> referencia;?></td>
                            <td><?php echo $produto -> descricao;?></td>
                            <td><?php echo $produto -> preco;?> €</td>
                            <td><?php echo $produto -> stock;?></td>
                            <td><?php echo $produto -> iva -> percentagem;?> %</td>
                            <td><label for="quantidade_<?= $produto -> id ?>"></label><input type="text" id="quantidade_<?= $produto -> id ?>" name="quantidade_<?= $produto -> id ?>" value="1"></td>
                            <td><a class="btn btn-primary" href="./router.php?c=fatura&a=addProduto&cId=<?= $cliente_id?>&fId=<?= $fatura_id?>&pId=<?= $produto -> id?>" role="button">Ver Carrinho</a></td>
                        </tr>
                    <?php }}} ?>
            </tbody>
        </table>
    <?php } ?>
</div>