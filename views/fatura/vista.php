<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            fatura+
                        </td>

                        <td>
                            #:<?= $fatura -> id?><br />
                            Data: <?= $fatura -> data?><br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <?= $cliente -> morada?><br />
                            <?= $cliente -> localidade?><br />
                            <?= $cliente -> codigopostal?>
                        </td>

                        <td>
                            <?= $cliente -> username?><br />
                            <?= $cliente -> email?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr class="heading">
            <td>Produto</td>

            <td>Preço</td>
        </tr>

        <?php
        if (isset($linhaFaturas)){
                foreach ($linhaFaturas as $linhafatura) {?>
                    <tr class="item">
                        <td><?php echo $linhafatura->produto->descricao?></td>
                        <td><?php echo $linhafatura->valor?>€</td>
                    </tr>
               <?php }} ?>
               <tr class="total">
                <td>Valor iva</td>
                <?php
                if (isset($fatura)){?>
                    <td><?= $fatura -> ivatotal ?>€</td>
                <?php }?>
                </tr>
               <tr class="total">
                <td>Valor Total sem Iva:</td>
                <?php
                if (isset($fatura)){?>  
                    <td><?= $fatura -> valortotal ?>€</td>
                <?php }?>
                </tr>
                <tr class="total">
                <td>Valor Total com Iva:</td>
                <?php
                if (isset($fatura)){?>  
                    <td><?= ($fatura -> valortotal)+($fatura -> ivatotal) ?>€</td>
                <?php }?>
                </tr>

    </table>
</div>