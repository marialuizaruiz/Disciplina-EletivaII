<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Curso{

    private $id;
    private $nome;
    private $tempo_duracao;

    public function __construct($id, $nome, $tempo_duracao){
        $this->setId($id);
        $this->setNome($nome);
        $this->setTempo_duracao($tempo_duracao);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTempo_duracao(){
        return $this->tempo_duracao;
    }

    public function setTempo_duracao($tempo_duracao){
        $this->tempo_duracao = $tempo_duracao;
    }

}