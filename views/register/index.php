<div class="container justify-content-center"><br>
    <h1 class="fw-bold text-center">Registar</h1>
    <main class="form-control w-100 m-auto mt-5 w">
        <form action="./router.php?c=register&a=register" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="username" id="username" placeholder="Username"
                       required>
                <label for="username">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" name="email" id="email"
                       placeholder="exemplo@gmail.com" required>
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" name="password" id="password"
                       placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="telefone" id="telefone" placeholder="913194123"
                       maxlength="9" required>
                <label for="telefone">Telefone</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="nif" id="nif" placeholder="123456789"
                       maxlength="9" required>
                <label for="nif">Nif</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="morada" id="morada" placeholder="Rua fixe"
                       required>
                <label for="morada">Morada</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="codigopostal" id="codigopostal"
                       placeholder="1234-123" required>
                <label for="codigopostal">Código-Postal</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="localidade" id="local" placeholder="Porto"
                       required>
                <label for="local">Localidade</label>
            </div>
            <div class="form-group mb-3">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role">
                    <?php
                    if ($userRole === 'Administrador') {
                        echo '                            
                                    <option value="Administrador">Administrador</option>
                                    <option value="Funcionario">Funcionario</option>
                                    <option value="Cliente" selected>Cliente</option>
                                ';
                    } elseif ($userRole === 'Funcionario') {
                        echo '                            
                                    <option value="Cliente">Cliente</option>
                                ';
                    }
                    ?>
                </select>
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Registar</button>
        </form>
    </main>
</div>
