<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Professor;

class ProfessorDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Professor $professor){
        try{
            $sql = "INSERT INTO professor (nome, graduacao) VALUES (:nome, :graduacao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $professor->getNome());
            $p->bindValue(":graduacao", $professor->getGraduacao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}