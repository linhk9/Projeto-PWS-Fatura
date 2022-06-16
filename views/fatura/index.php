<div class="container justify-content-center"><br>
    <?php if ($userRole === 'Administrador' || $userRole === 'Funcionario') { ?>
        <h1 class="fw-bold text-center">Faturas - Seleção de Cliente</h1>
        <main class="form-control w-100 m-auto mt-5 w">
            <form action="./router.php?c=fatura&a=produtos" method="post">
                <div class="form-group mb-3">
                    <label for="cliente_id">Cliente:</label>
                    <select class="form-control" id="cliente_id" name="cliente_id">
                        <?php
                            if (isset($clientes)){
                                foreach ($clientes as $cliente) {
                                    echo '<option value="'.$cliente->id.'">'.$cliente->username.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>

                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Continuar</button>
            </form>
        </main>
    <?php } ?>
</div>
