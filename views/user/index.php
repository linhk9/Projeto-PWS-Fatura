<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de Utilizador</title>
</head>
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
            </div>
    </div>
</div>

<?php require_once './views/layout/footer.php'; ?>