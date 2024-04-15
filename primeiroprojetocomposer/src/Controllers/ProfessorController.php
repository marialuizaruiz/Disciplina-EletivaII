<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ProfessorDAO;
use Php\Primeiroprojeto\Models\Domain\Professor;

class ProfessorController{

    public function inserir($params){
        require_once("../src/Views/professor/inserir_professor.html");
    }

    public function novo($params){
        $professor = new Professor(0, $_POST['nome'], $_POST['graduacao']);
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->inserir($professor)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
