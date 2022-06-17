<div class="container justify-content-center"><br>
        <h1 class="fw-bold text-center">Faturas - Histórico</h1>
        <table class="table table-hover" id="produtosTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Iva total</th>
                <th scope="col">Estado</th>
                <th scope="col">Cliente</th>
                <th scope="col">Funcionario</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($faturas)){
                foreach ($faturas as $fatura) { ?>
                     <?php if (($userRole == 'Cliente' && $fatura->cliente_id == $userId) || $userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
                        <tr>
                            <th scope="row"><?php echo $fatura -> id;?></th>
                            <td><?php echo $fatura -> data;?></td>
                            <td><?php echo $fatura -> valortotal;?></td>
                            <td><?php echo $fatura -> ivatotal;?> €</td>
                            <td><?php echo $fatura -> estado;?></td>
                            <?php
                            if (isset($clientes)){
                                foreach ($clientes as $cliente){
                                    if ($fatura -> cliente_id == $cliente -> id){?>
                                        <td><?php echo $cliente-> username; ?></td>
                            <?php }}
                            foreach ($clientes as $cliente){
                                if ($fatura -> funcionario_id  == $cliente -> id) {?>
                                    <td><?php echo $cliente-> username ;?></td>
                            <?php }}}
                            if ($userRole === 'Administrador' || $userRole === 'Funcionario') {
                                ?>
                                <td>
                                    <a href="./router.php?c=fatura&a=carrinho&cId=<?= $fatura -> cliente_id?>&fId=<?= $fatura -> id?>" class="btn btn-primary" role="button">Editar</a>
                                </td>
                                <td>
                                    <a href="./router.php?c=fatura&a=vista&cId=<?= $fatura -> cliente_id?>&fId=<?= $fatura -> id?>" class="btn btn-primary" role="button">Ver Fatura</a>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php }}} ?>
            </tbody>
        </table>
</div>