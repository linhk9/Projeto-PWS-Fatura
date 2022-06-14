<body class="d-flex flex-column h-100">
    <div class="container justify-content-center"><br>
        <h1 class="fw-bold text-center">Register</h1>
        <main class="form-control w-100 m-auto mt-5 w">
                <form action="./router.php?c=register&a=register" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="username" id="username" >
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-3" name="email" id="email" >
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-3" name="password" id="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="telefone" id="telefone"  >
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="nif" id="nif"  >
                        <label for="nif">Nif</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="morada" id="morada"  >
                        <label for="morada">Morada</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="codigopostal" id="codigopostal"  >
                        <label for="codigopostal">Código-Postal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" name="localidade" id="local"  >
                        <label for="local">Localidade</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">Role:</label>
                        <select class="form-control" id="role">
                            <option>Admin</option>
                            <option>Funcionario</option>
                            <option>Cliente</option>
                        </select>
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Register</button>
                </form>
        </main>
    </div>
</body>