<?php

require_once __DIR__.'/../config/Conexao.php';
require_once __DIR__.'/../models/Tarefa.php';

class TarefaDAO {

    private $conn;

    public function __construct(){
        $this->conn = Conexao::getInstance()->getConn();
    }

    public function inserir(Tarefa $tarefa){
        $sql = "INSERT INTO tarefas (titulo, descricao, usuario_id, status) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssis", $tarefa->titulo, $tarefa->descricao, $tarefa->usuario_id, $tarefa->status);
        return $stmt->execute();
    }

    public function listarPorUsuario($usuario_id){
        $sql = "SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function buscar($id, $usuario_id){
        $sql = "SELECT * FROM tarefas WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $id, $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function atualizar(Tarefa $tarefa){
        $sql = "UPDATE tarefas SET titulo = ?, descricao = ?, status = ? WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssii", $tarefa->titulo, $tarefa->descricao, $tarefa->status, $tarefa->id, $tarefa->usuario_id);
        return $stmt->execute();
    }

    public function excluir($id, $usuario_id){
        $sql = "DELETE FROM tarefas WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $id, $usuario_id);
        return $stmt->execute();
    }
}

?>
