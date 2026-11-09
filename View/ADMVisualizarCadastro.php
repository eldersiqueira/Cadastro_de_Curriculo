<?php
include_once '../Controller/UsuarioController.php';
if(!isset($_SESSION))
{
    session_start();
}

// Verifica se recebeu o ID via POST do botão visualizar
$idUser = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;

if($idUser) {
    $uCon = new UsuarioController();
    $usuarioSelecionado = $uCon->buscarUsuario($idUser);
} else {
    // Se acessar direto sem ID, redireciona de volta para a listagem
    header("Location: ADMListarCadastrados.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ADM - Visualizar Cadastro</title>
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="card shadow-sm p-4 w-75 mx-auto bg-white text-primary">
            <h2 class="text-info text-center mb-4"><i class="fa fa-user-circle"></i> Detalhes do Usuário</h2>

            <div class="mb-3">
                <label class="form-label fw-bold">ID do Usuário:</label>
                <input type="text" class="form-control" value="<?php echo $usuarioSelecionado->getID(); ?>" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nome Completo:</label>
                <input type="text" class="form-control" value="<?php echo $usuarioSelecionado->getNome(); ?>" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">CPF:</label>
                <input type="text" class="form-control" value="<?php echo $usuarioSelecionado->getCPF(); ?>" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">E-mail:</label>
                <input type="text" class="form-control" value="<?php echo $usuarioSelecionado->getEmail(); ?>" disabled>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Data de Nascimento:</label>
                <input type="date" class="form-control" value="<?php echo $usuarioSelecionado->getDataNascimento(); ?>" disabled>
            </div>

            <!-- Botão para voltar à página ADMListarCadastrados -->
            <div class="text-center">
                <a href="ADMListarCadastrados.php" class="btn btn-secondary px-5 rounded-pill fw-bold">
                    <i class="fa fa-arrow-left"></i> Voltar à Listagem
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>