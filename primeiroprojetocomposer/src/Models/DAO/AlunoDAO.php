<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Aluno;

class AlunoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Aluno $aluno){
        try{
            $sql = "INSERT INTO aluno (nome, curso) VALUES (:nome, :curso)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":curso", $aluno->getCurso());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}