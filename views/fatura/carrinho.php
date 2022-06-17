<div class="container justify-content-center"><br>
    <?php if ($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
        <h1 class="fw-bold text-center">Faturas - Carrinho</h1>

        <div class="container px-3 my-5 clearfix">
            <div class="card">
                <div class="card-header">
                    <h2>Fatura ID #<?= $fatura_id ?></h2>
                </div>
                <form action="./router.php?c=fatura&a=checkout&fId=<?= $fatura_id ?>" method="post">
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered m-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center py-3 px-4" style="min-width: 400px;">Descrição</th>
                                        <th class="text-right py-3 px-4" style="width: 100px;">Preço</th>
                                        <th class="text-right py-3 px-4" style="width: 100px;">Iva</th>
                                        <th class="text-center py-3 px-4" style="width: 120px;">Quantidade</th>
                                        <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $valorTotal = 0;
                                        $valorIvaTotal = 0;
                                        foreach ($linhafaturas as $linhafatura) {
                                            $valorIvaTotal += $linhafatura->valoriva;
                                            $valorTotal += $linhafatura->valor;
                                    ?>
                                        <tr>
                                            <td class="p-4">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a href="#" class="d-block text-dark"><?= $linhafatura->produto->descricao ?> (#<?= $linhafatura->produto->id ?>)</a>
                                                        <small>
                                                            <span class="text-muted">Stock: </span> <?= $linhafatura->produto->stock ?>
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?= $linhafatura->valoriva ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?= $linhafatura->valor ?></td>
                                            <td class="text-right font-weight-semibold align-middle p-4"><?= $linhafatura->quantidade ?></td>
                                            <td class="text-center align-middle px-0">
                                                <a href="./router.php?c=fatura&a=delete&fId=<?= $linhafatura->id ?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">X</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    <input type="hidden" id="valorIvaTotal" name="valorIvaTotal" value="<?= $valorIvaTotal?>">
                                    <input type="hidden" id="valorTotal" name="valorTotal" value="<?= $valorTotal ?>">

                                    </tbody>
                                </table>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                                <div class="text-right mt-4">
                                    <label class="text-muted font-weight-normal m-0">Total Iva</label>
                                    <div class="text-large"><strong><?= $valorIvaTotal ?> €</strong></div>
                                </div>
                                <div class="text-right mt-4">
                                    <label class="text-muted font-weight-normal m-0">Preço Total</label>
                                    <div class="text-large"><strong><?= $valorTotal ?> €</strong></div>
                                </div>
                        </div>

                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
