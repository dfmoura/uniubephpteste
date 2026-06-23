<?php

require_once __DIR__.'/../dao/TarefaDAO.php';

class DashboardController {

    public function index(){
        $dao = new TarefaDAO();
        $tarefas = $dao->listarPorUsuario($_SESSION['usuario_id']);
        require __DIR__.'/../views/dashboard.php';
    }
}

?>
