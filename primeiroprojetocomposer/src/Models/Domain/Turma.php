<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Turma{

    private $id;
    private $numero_sala;
    private $nome_curso;

    public function __construct($id, $numero_sala, $nome_curso){
        $this->setId($id);
        $this->setNumero_sala($numero_sala);
        $this->SetNome_curso($nome_curso);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNumero_sala(){
        return $this->numero_sala;
    }

    public function setNumero_sala($numero_sala){
        $this->numero_sala = $numero_sala;
    }

    public function getNome_curso(){
        return $this->nome_curso;
    }

    public function setNome_curso($nome_curso){
        $this->nome_curso = $nome_curso;
    }

}