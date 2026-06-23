<?php

require_once __DIR__.'/../dao/TarefaDAO.php';

class TarefaController {

    public function formulario(){
        $tarefa = null;
        if(isset($_GET['id'])){
            $dao = new TarefaDAO();
            $tarefa = $dao->buscar($_GET['id'], $_SESSION['usuario_id']);
            if(!$tarefa){
                die('Tarefa nao encontrada');
            }
        }
        require __DIR__.'/../views/tarefa_form.php';
    }

    public function salvar(){
        $titulo = $_POST['titulo'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $status = $_POST['status'] ?? 'pendente';
        $id = $_POST['id'] ?? '';

        if($titulo == ''){
            die('Titulo e obrigatorio');
        }

        $dao = new TarefaDAO();
        $usuario_id = $_SESSION['usuario_id'];

        if($id != ''){
            $tarefa = new Tarefa($titulo, $descricao, $usuario_id, $status, $id);
            $dao->atualizar($tarefa);
        } else {
            $tarefa = new Tarefa($titulo, $descricao, $usuario_id, $status);
            $dao->inserir($tarefa);
        }

        header('Location: index.php?p=dashboard');
        exit;
    }

    public function excluir(){
        $id = $_GET['id'] ?? '';
        if($id == ''){
            die('Id invalido');
        }

        $dao = new TarefaDAO();
        $dao->excluir($id, $_SESSION['usuario_id']);

        header('Location: index.php?p=dashboard');
        exit;
    }
}

?>
