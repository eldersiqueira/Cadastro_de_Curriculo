<?php
if(!isset($_SESSION))
{
    session_start();
}

class UsuarioController {

    public function login($cpf, $senha) {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->carregarUsuario($cpf);
        $verSenha = $usuario->getSenha();
        
        if($senha == $verSenha) {
            $_SESSION['Usuario'] = serialize($usuario);
            return true;
        } else {
            return false;
        }
    }

    public function inserir($nome, $cpf, $email, $senha) {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        
        $r = $usuario->inserirBD();
        if($r) {
            $_SESSION['Usuario'] = serialize($usuario);
        }
        return $r;
    }

    public function gerarListaUsuarios() {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        return $usuario->listaUsuarios();
    }

    public function buscarUsuario($id) {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->carregarUsuarioPorID($id);
        return $usuario;
    }
}
?>