<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Professor{

    private $id;
    private $nome;
    private $graduacao;

    public function __construct($id, $nome, $graduacao){
        $this->setId($id);
        $this->setNome($nome);
        $this->setGraduacao($graduacao);
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

    public function getGraduacao(){
        return $this->graduacao;
    }

    public function setGraduacao($graduacao){
        $this->graduacao = $graduacao;
    }

}