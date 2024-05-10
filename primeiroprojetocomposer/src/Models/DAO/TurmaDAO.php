<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Turma;

class TurmaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Turma $turma){
        try{
            $sql = "INSERT INTO turma (numero_sala, nome_curso) VALUES (:numero_sala, :nome_curso)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":numero_sala", $turma->getNumero_sala());
            $p->bindValue(":nome_curso", $turma->getNome_curso());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Turma $turma){
        try{
            $sql = "UPDATE turma SET numero_sala = :numero_sala, nome_curso = :nome_curso
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":numero_sala", $turma->getNumero_sala());
            $p->bindValue(":nome_curso", $turma->getNome_curso());
            $p->bindValue(":id", $turma->getId());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM turma WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM turma";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM turma WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}

