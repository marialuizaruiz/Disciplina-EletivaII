<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CursoDAO;
use Php\Primeiroprojeto\Models\Domain\Curso;

class CursoController{

    public function index($params){
        $cursoDAO = new CursoDAO();
        $resultado = $cursoDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else 
            $mensagem = "";
        require_once("../src/Views/curso/curso.php");
    }

    public function inserir($params){
        require_once("../src/Views/curso/inserir_curso.html");
    }

    public function novo($params){
        $curso = new Curso(0, $_POST['nome'], $_POST['tempo_duracao']);
        $cursoDAO = new CursoDAO();
        if ($cursoDAO->inserir($curso)){
            header("location: /curso/inserir/true");
        } else {
            header("location: /curso/inserir/false");
        }
    }

    public function alterar($params){
        $cursoDAO = new CursoDAO();
        $resultado = $cursoDAO->consultar($params[1]);
        require_once("../src/Views/curso/alterar_curso.php");
    }

    public function excluir($params){
        $cursoDAO = new CursoDAO();
        $resultado = $cursoDAO->consultar($params[1]);
        require_once("../src/Views/curso/excluir_curso.php");
    }

    public function editar($params){
        $curso = new Curso($_POST['id'], $_POST['nome'], $_POST['tempo_duracao']);
        $cursoDAO = new CursoDAO();
        if ($cursoDAO->alterar($curso)) {
            header("location: /curso/alterar/true");
        } else {
            header("location: /curso/alterar/false");
        }
    }

    public function deletar($params){
        $cursoDAO = new CursoDAO();
        if ($cursoDAO->excluir($_POST['id'])){
            header("location: /curso/excluir/true");
        } else {
            header("location: /curso/excluir/false");
        }
    }

}
