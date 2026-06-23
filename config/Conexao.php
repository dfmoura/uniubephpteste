<?php

class Conexao {
    private static $instancia = null;
    private $conn;

    private function __construct(){
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "sistema_tarefas";

        $this->conn = new mysqli($servidor, $usuario, $senha, $banco);

        if($this->conn->connect_error){
            die('Erro ao conectar: '.$this->conn->connect_error);
        }
    }

    public static function getInstance(){
        if(self::$instancia === null){
            self::$instancia = new Conexao();
        }
        return self::$instancia;
    }

    public function getConn(){
        return $this->conn;
    }
}

?>
