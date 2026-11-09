<?php
include_once '../Controller/UsuarioController.php';
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ADM - Listar Cadastrados</title>
</head>
<body class="bg-light">

    <div class="container my-5">
        <h2 class="text-info text-center mb-4">Usuários Cadastrados no Sistema</h2>
        
        <div class="card shadow-sm p-4 bg-white">
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="table-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $uCon = new UsuarioController();
                    $resultado = $uCon->gerarListaUsuarios();
                    if($resultado != null) {
                        while($row = $resultado->fetch_object()) {
                            echo '<tr>';
                            echo '<td>'.$row->idusuario.'</td>';
                            echo '<td>'.$row->nome.'</td>';
                            echo '<td>'.$row->cpf.'</td>';
                            echo '<td>'.$row->email.'</td>';
                            echo '<td>
                                    <form action="ADMVisualizarCadastro.php" method="post" style="margin:0;">
                                        <input type="hidden" name="idUsuario" value="'.$row->idusuario.'">
                                        <button type="submit" name="btnVisualizar" class="btn btn-info btn-sm text-white">
                                            <i class="fa fa-eye"></i> Visualizar
                                        </button>
                                    </form>
                                  </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>