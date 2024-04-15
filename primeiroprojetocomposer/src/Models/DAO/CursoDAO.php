<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Curso;

class CursoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Curso $curso){
        try{
            $sql = "INSERT INTO curso (nome, tempo_duracao) VALUES (:nome, :tempo_duracao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $curso->getNome());
            $p->bindValue(":tempo_duracao", $curso->getTempo_duracao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}