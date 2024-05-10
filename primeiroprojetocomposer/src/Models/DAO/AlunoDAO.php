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

    public function alterar(Aluno $aluno){
        try{
            $sql = "UPDATE aluno SET nome = :nome, curso = :curso
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":curso", $aluno->getCurso());
            $p->bindValue(":id", $aluno->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM aluno WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM aluno";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM aluno WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}