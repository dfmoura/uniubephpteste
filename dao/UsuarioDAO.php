<?php

require_once __DIR__.'/../config/Conexao.php';
require_once __DIR__.'/../models/Usuario.php';

class UsuarioDAO {

    private $conn;

    public function __construct(){
        $this->conn = Conexao::getInstance()->getConn();
    }

    public function cadastrar(Usuario $usuario){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $usuario->nome, $usuario->email, $usuario->senha);
        return $stmt->execute();
    }

    public function buscarPorEmail($email){
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

?>
