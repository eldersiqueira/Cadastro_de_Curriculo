<?php
if(!isset($_SESSION))
{
    session_start();
}

switch ($_POST) {

// --- Login do Usuário --- //
    case isset($_POST["btnLogin"]):
        require_once "UsuarioController.php";
        $uController = new UsuarioController();
        if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
            // Redireciona via navegador para a página principal correta
            header("Location: ../View/principal.php");
            exit;
        } else {
            include_once "../View/cadastroNaoRealizado.php";
        }
        break;

    // --- Formação Acadêmica: Inserir --- //
    case isset($_POST["btnAddFormacao"]):
        require_once "FormacaoAcadController.php";
        include_once "../Model/Usuario.php";
        $fController = new FormacaoAcadController();
        if ($fController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioFA"])),
            date("Y-m-d", strtotime($_POST["txtFimFA"])),
            $_POST["txtDescFA"],
            unserialize($_SESSION["Usuario"])->getID()
        ) != false) {
            include_once "../View/informacaoInserida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    // --- Formação Acadêmica: Excluir --- //
    case isset($_POST["btnExcluirFA"]):
        require_once "FormacaoAcadController.php";
        include_once "../Model/Usuario.php";
        $fController = new FormacaoAcadController();
        if ($fController->remover($_POST["id"]) == true) {
            include_once "../View/informacaoExcluida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    // --- Outras Formações: Inserir --- //
    case isset($_POST["btnAddOF"]):
        require_once "OutrasFormacoesController.php";
        include_once "../Model/Usuario.php";
        $ofController = new OutrasFormacoesController();
        if ($ofController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioOF"])),
            date("Y-m-d", strtotime($_POST["txtFimOF"])),
            $_POST["txtDescOF"],
            unserialize($_SESSION["Usuario"])->getID()
        ) != false) {
            include_once "../View/informacaoInserida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    // --- Outras Formações: Excluir --- //
    case isset($_POST["btnExcluirOF"]):
        require_once "OutrasFormacoesController.php";
        include_once "../Model/Usuario.php";
        $ofController = new OutrasFormacoesController();
        if ($ofController->remover($_POST["idOF"]) == true) {
            include_once "../View/informacaoExcluida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

        // --- Redirecionar para a tela de Primeiro Acesso --- //
    case isset($_POST["btnPrimeiroAcesso"]):
        header("Location: ../View/primeiroAcesso.php");
        exit;

        // --- Processar o cadastro do Primeiro Acesso --- //
    case isset($_POST["btnCadastrar"]):
        require_once "UsuarioController.php";
        $uController = new UsuarioController();
        if ($uController->inserir(
            $_POST["txtNome"],
            $_POST["txtCPF"],
            $_POST["txtEmail"],
            $_POST["txtSenha"]
        )) {
            // Redireciona para a página de sucesso do cadastro
            header("Location: ../View/cadastroRealizado.php");
            exit;
        } else {
            header("Location: ../View/cadastroNaoRealizado.php");
            exit;
        }
        break;

        // --- Experiência Profissional: Inserir --- //
    case isset($_POST["btnAddExp"]):
        require_once "ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";
        $expController = new ExperienciaProfissionalController();
        if ($expController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioExp"])),
            date("Y-m-d", strtotime($_POST["txtFimExp"])),
            $_POST["txtEmpresaExp"],
            $_POST["txtDescExp"],
            unserialize($_SESSION["Usuario"])->getID()
        ) != false) {
            include_once "../View/informacaoInserida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;

    // --- Experiência Profissional: Excluir --- //
    case isset($_POST["btnExcluirExp"]):
        require_once "ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";
        $expController = new ExperienciaProfissionalController();
        if ($expController->remover($_POST["idExp"]) == true) {
            include_once "../View/informacaoExcluida.php";
        } else {
            include_once "../View/operacaoNaoRealizada.php";
        }
        break;
}
?>