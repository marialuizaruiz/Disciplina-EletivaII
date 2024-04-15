<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\TurmaDAO;
use Php\Primeiroprojeto\Models\Domain\Turma;

class TurmaController{

    public function inserir($params){
        require_once("../src/Views/turma/inserir_turma.html");
    }

    public function novo($params){
        $turma = new Turma(0, $_POST['numero_sala'], $_POST['nome_curso']);
        $turmaDAO = new TurmaDAO();
        if ($turmaDAO->inserir($turma)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
