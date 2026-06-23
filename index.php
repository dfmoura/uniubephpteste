<?php

session_start();

require_once 'controllers/AuthController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/TarefaController.php';

$pagina = $_GET['p'] ?? 'login';

switch($pagina){

    case 'login':
        $ctrl = new AuthController();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ctrl->login();
        } else {
            $ctrl->mostrarLogin();
        }
        break;

    case 'cadastro':
        $ctrl = new AuthController();
        $ctrl->mostrarCadastro();
        break;

    case 'cadastrar':
        $ctrl = new AuthController();
        $ctrl->cadastrar();
        break;

    case 'dashboard':
        require 'valida.php';
        $ctrl = new DashboardController();
        $ctrl->index();
        break;

    case 'nova_tarefa':
        require 'valida.php';
        $ctrl = new TarefaController();
        $ctrl->formulario();
        break;

    case 'editar_tarefa':
        require 'valida.php';
        $ctrl = new TarefaController();
        $ctrl->formulario();
        break;

    case 'salvar_tarefa':
        require 'valida.php';
        $ctrl = new TarefaController();
        $ctrl->salvar();
        break;

    case 'excluir_tarefa':
        require 'valida.php';
        $ctrl = new TarefaController();
        $ctrl->excluir();
        break;

    case 'sair':
        $ctrl = new AuthController();
        $ctrl->sair();
        break;

    default:
        header('Location: index.php?p=login');
        break;
}

?>
