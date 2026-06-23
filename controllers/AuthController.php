<?php

require_once __DIR__.'/../dao/UsuarioDAO.php';

class AuthController {

    public function mostrarLogin(){
        require __DIR__.'/../views/login.php';
    }

    public function mostrarCadastro(){
        require __DIR__.'/../views/cadastro.php';
    }

    public function login(){
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if($email == '' || $senha == ''){
            die('Email e senha sao obrigatorios');
        }

        $dao = new UsuarioDAO();
        $usuario = $dao->buscarPorEmail($email);

        if($usuario && password_verify($senha, $usuario['senha'])){
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header('Location: index.php?p=dashboard');
            exit;
        } else {
            die('Usuario ou senha incorretos');
        }
    }

    public function cadastrar(){
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if($nome == '' || $email == '' || $senha == ''){
            die('Preencha todos os campos');
        }

        $dao = new UsuarioDAO();

        if($dao->buscarPorEmail($email)){
            die('Este email ja esta cadastrado');
        }

        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        $usuario = new Usuario($nome, $email, $senhaHash);

        if($dao->cadastrar($usuario)){
            header('Location: index.php?p=login');
            exit;
        } else {
            die('Erro ao cadastrar');
        }
    }

    public function sair(){
        session_destroy();
        header('Location: index.php?p=login');
        exit;
    }
}

?>
