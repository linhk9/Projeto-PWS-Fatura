<body>
    <div class="container-fluid">
        <div class="row">
            <h1 class="fw-bold text-center">Gestão de Utilizador</h1>
            <div class="col-md-5 mb-4">
                <div class="card">
                    <div class="card-header">
                        Atualizar Email/Password
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="userEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="userEmail" value="email@example.com">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="userPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="userPassword">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                        </div>
                    </div>
                        <table class="table" id="table1">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Palavra-Pass</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Guardar</th>
                        <th scope="col">Apagar</th>
                      </tr>
                    </thead>
                    <tbody id = "table2">
                        <tr class = "tr">
                        <?php 
                        if (isset($users)){
                            foreach ($users as $user) {
                                if ($user -> role == 'Cliente' ||  $user -> role == 'Funcionario'){?>
                                    <th scope="row" class = "nmr"><?php echo $user -> id;?></th>
                                    <td class = "nome"><?php echo $user -> username;?></td>
                                    <td class = "Email"><?php echo $user -> email;?></td>
                                    <td class = "Pass" ><?php echo $user -> password;?></td>
                                    <td class = "Role" ><?php echo $user -> role;?></td>
                                    <td><img src="public/img/Edit.png" class="Edit"  href="./router.php?c=fatura&a=index"></td>
                                    <td><img src="public/img/delete.png" class="Apagar" href="./router.php?c=fatura&a=index"></td>
                                    <td><img src="public/img/guardar.png" class="Guardar" href="./router.php?c=fatura&a=index"></td>
                               <?php }}}?>
                </tr>
                </div>
            </div>
        </div>
    </div>
</body>
