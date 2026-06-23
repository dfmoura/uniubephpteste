<?php

class Tarefa {
    public $id;
    public $usuario_id;
    public $titulo;
    public $descricao;
    public $status;

    public function __construct($titulo, $descricao, $usuario_id, $status = 'pendente', $id = null){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->usuario_id = $usuario_id;
        $this->status = $status;
    }
}

?>
