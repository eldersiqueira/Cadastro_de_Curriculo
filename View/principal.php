<?php
include_once '../Controller/FormacaoAcadController.php';
include_once '../Controller/OutrasFormacoesController.php';
include_once '../Model/Usuario.php';

if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Enlatados Juarez - Sistema de Currículos</title>
</head>
<body class="bg-light">

    <!-- Sidebar / Menu Lateral -->
    <nav class="sidebar bg-primary text-white text-center position-fixed h-100 p-3" style="width: 120px;">
        <a href="#home" class="nav-link text-white mb-4">
            <i class="fa fa-home fa-2x"></i>
            <p class="small m-0">HOME</p>
        </a>
        <a href="#dPessoais" class="nav-link text-white mb-4">
            <i class="fa fa-address-book-o fa-2x"></i>
            <p class="small m-0">Dados Pessoais</p>
        </a>
        <a href="#formacao" class="nav-link text-white mb-4">
            <i class="fa fa-mortar-board fa-2x"></i>
            <p class="small m-0">Formação</p>
        </a>
        <a href="#outrasFormacoes" class="nav-link text-white">
            <i class="fa fa-certificate fa-2x"></i>
            <p class="small m-0">Outras Formações</p>
        </a>
    </nav>

    <!-- Conteúdo Principal da Página -->
    <div class="main-content" style="margin-left: 140px; padding: 20px;">

        <!-- 1. HOME -->
        <header class="text-center py-5" id="home">
            <h1 class="text-info">SISTEMA DE CURRICULOS</h1>
            <p class="text-muted">Bem-vindo ao painel de gerenciamento de currículos</p>
        </header>

        <hr class="my-5">

        <!-- 2. DADOS PESSOAIS -->
        <div class="container my-5 text-secondary" id="dPessoais">
            <h2 class="text-info mb-4">Dados Pessoais</h2>
            <form action="/Agenda13-ds3/Controller/Navegacao.php" method="post" class="bg-white p-4 rounded shadow-sm w-75 mx-auto text-primary">
                <input type="hidden" name="txtID" value="<?php echo unserialize($_SESSION['Usuario'])->getID(); ?>">
                
                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-user"></i> Nome Completo</label>
                    <input class="form-control" name="txtNome" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getNome(); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-calendar"></i> Data de Nascimento</label>
                    <input class="form-control" name="txtData" type="date" value="<?php echo unserialize($_SESSION['Usuario'])->getDataNascimento(); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-id-card"></i> CPF</label>
                    <input class="form-control" name="txtCPF" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getCPF(); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-envelope"></i> E-mail</label>
                    <input class="form-control" name="txtEmail" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getEmail(); ?>">
                </div>

                <button name="btnAtualizar" class="btn btn-primary w-100 rounded-pill">Atualizar</button>
            </form>
        </div>

        <hr class="my-5">

        <!-- 3. FORMAÇÃO ACADÊMICA -->
        <div class="container my-5 text-secondary" id="formacao">
            <h2 class="text-info mb-4">Formação Acadêmica</h2>

            <form action="/Agenda13-ds3/Controller/Navegacao.php" method="post" class="row g-3 bg-white p-4 rounded shadow-sm w-75 mx-auto text-primary">
                <div class="col-md-6 text-center"><label class="form-label fw-bold">Data Inicial</label></div>
                <div class="col-md-6 text-center"><label class="form-label fw-bold">Data Final</label></div>

                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white text-primary"><i class="fa fa-calendar fa-lg"></i></span>
                        <input type="date" class="form-control" name="txtInicioFA" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white text-primary"><i class="fa fa-calendar fa-lg"></i></span>
                        <input type="date" class="form-control" name="txtFimFA">
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text bg-white text-primary"><i class="fa fa-align-justify fa-lg"></i></span>
                        <input type="text" class="form-control" name="txtDescFA" placeholder="Ex: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza" required>
                    </div>
                </div>

                <div class="col-12 text-center mt-3">
                    <button type="submit" name="btnAddFormacao" class="btn btn-primary px-5 rounded-pill">
                        <i class="fa fa-user-plus fa-lg"></i>
                    </button>
                </div>
            </form>

            <div class="container mt-5">
                <table class="table table-striped table-bordered text-center align-middle shadow-sm bg-white">
                    <thead class="table-primary text-white">
                        <tr>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fCon = new FormacaoAcadController();
                        $resultsFA = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                        if($resultsFA != null) {
                            while($rowFA = $resultsFA->fetch_object()) {
                                echo '<tr>';
                                echo '<td>'.$rowFA->inicio.'</td>';
                                echo '<td>'.$rowFA->fim.'</td>';
                                echo '<td>'.$rowFA->descricao.'</td>';
                                echo '<td>
                                        <form action="/Agenda13-ds3/Controller/Navegacao.php" method="post" style="margin:0;">
                                            <input type="hidden" name="id" value="'.$rowFA->idformacaoAcademica.'">
                                            <button name="btnExcluirFA" class="btn btn-danger btn-sm"><i class="fa fa-user-times"></i></button>
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

        <hr class="my-5">

        <!-- 4. OUTRAS FORMAÇÕES -->
        <div class="container my-5 text-secondary" id="outrasFormacoes">
            <h2 class="text-info mb-4">Outras Formações</h2>

            <form action="/Agenda13-ds3/Controller/Navegacao.php" method="post" class="row g-3 bg-white p-4 rounded shadow-sm w-75 mx-auto text-primary">
                <div class="col-md-6 text-center"><label class="form-label fw-bold">Data Inicial</label></div>
                <div class="col-md-6 text-center"><label class="form-label fw-bold">Data Final</label></div>

                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white text-primary"><i class="fa fa-calendar fa-lg"></i></span>
                        <input type="date" class="form-control" name="txtInicioOF" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white text-primary"><i class="fa fa-calendar fa-lg"></i></span>
                        <input type="date" class="form-control" name="txtFimOF">
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text bg-white text-primary"><i class="fa fa-align-justify fa-lg"></i></span>
                        <input type="text" class="form-control" name="txtDescOF" placeholder="Ex: Curso de Inglês - Inglês City" required>
                    </div>
                </div>

                <div class="col-12 text-center mt-3">
                    <button type="submit" name="btnAddOF" class="btn btn-primary px-5 rounded-pill">
                        <i class="fa fa-user-plus fa-lg"></i>
                    </button>
                </div>
            </form>

            <div class="container mt-5">
                <table class="table table-striped table-bordered text-center align-middle shadow-sm bg-white">
                    <thead class="table-primary text-white">
                        <tr>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ofCon = new OutrasFormacoesController();
                        $resultsOF = $ofCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                        if($resultsOF != null) {
                            while($rowOF = $resultsOF->fetch_object()) {
                                echo '<tr>';
                                echo '<td>'.$rowOF->inicio.'</td>';
                                echo '<td>'.$rowOF->fim.'</td>';
                                echo '<td>'.$rowOF->descricao.'</td>';
                                echo '<td>
                                        <form action="/Agenda13-ds3/Controller/Navegacao.php" method="post" style="margin:0;">
                                            <input type="hidden" name="idOF" value="'.$rowOF->idoutrasformacoes.'">
                                            <button name="btnExcluirOF" class="btn btn-danger btn-sm"><i class="fa fa-user-times"></i></button>
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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>