<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Primeiro Acesso - Sistema de Currículos</title>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <form action="/Agenda13-ds3/Controller/Navegacao.php" method="post" class="card p-4 shadow text-primary bg-white" style="width: 35%;">
        <h2 class="text-center text-info mb-4">Primeiro Acesso</h2>

        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="fa fa-user fa-lg"></i></span>
            <input class="form-control" name="txtNome" type="text" placeholder="Nome Completo" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="fa fa-id-card fa-lg"></i></span>
            <input class="form-control" name="txtCPF" type="text" placeholder="CPF: 33333333333" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text bg-white"><i class="fa fa-envelope fa-lg"></i></span>
            <input class="form-control" name="txtEmail" type="email" placeholder="Email" required>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text bg-white"><i class="fa fa-lock fa-lg"></i></span>
            <input class="form-control" name="txtSenha" type="password" placeholder="Senha" required>
        </div>

        <div class="text-center">
            <button name="btnCadastrar" class="btn btn-primary w-100 rounded-pill py-2">Cadastrar</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>