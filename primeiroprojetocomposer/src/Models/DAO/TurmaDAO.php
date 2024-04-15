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

}