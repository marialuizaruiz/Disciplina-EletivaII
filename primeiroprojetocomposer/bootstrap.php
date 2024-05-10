<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

//Exercício 1
$r->get('/exercicio1/formulario', function() {
    include("exercicio1.html");
});

$r->post('/exercicio1/resposta', function(){
    $valor = $_POST['valor'];
    if ($valor < 0){
        echo "<br><h2>Valor Negativo</h2>";
    }
    elseif ($valor == 0){
        echo "<br><h2>Igual a Zero</h2>";
    }
    else{
        echo "<br><h2>Valor Positivo</h2>";
    }
});

//Exercício 2
$r->get('/exercicio2/formulario', function() {
    include("exercicio2.html");
});

$r->post('/exercicio2/resposta', function(){
    function encontrarMenor($numeros) {
        $menor = $numeros[0];
        $posicao = 0;
        foreach ($numeros as $key => $valor) {
            if ($valor < $menor) {
                $menor = $valor;
                $posicao = $key;
            }
        }
        return array('menor' => $menor, 'posicao' => $posicao);
    }
        $numeros = $_POST["numeros"];
        if (count($numeros) == 7 && count(array_unique($numeros)) == 7) {
            $resultado = encontrarMenor($numeros);
            echo "<h2>O menor valor é: " . $resultado['menor'] . ", na posição: " . $resultado['posicao'] . "</h2>";
        } else {
            echo "<h2>Inserir 7 números diferentes.</h2>";
        }
});

//Exercício 3
$r->get('/exercicio3/formulario', function() {
    include("exercicio3.html");
});

$r->post('/exercicio3/resposta', function(){
    function calcularSoma($valor1, $valor2) {
        $soma = $valor1 + $valor2;
    
        if ($valor1 == $valor2) {
            return 3 * $soma; 
        } else {
            return $soma; 
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valor"])) {
        if (count($_POST["valor"]) == 2) {
            $valores = $_POST["valor"];
            $valor1 = $valores[0];
            $valor2 = $valores[1];
            
            $resultado = calcularSoma($valor1, $valor2);
            
            echo "<h2>A soma dos valores é: " . $resultado . "</h2>";
        } 
    } 
});

//Exercício 4
$r->get('/exercicio4/formulario', function() {
    include("exercicio4.html");
});

$r->post('/exercicio4/resposta', function(){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valor"])) {
        $valor = $_POST["valor"];

        for ($i = 0; $i <= 10; $i++) {
            $resultado = $valor * $i;
            echo "$valor X $i = $resultado<br>";
        }
    }
});

//Exercício 5
$r->get('/exercicio5/formulario', function(){
    include("exercicio5.html");
});

$r->post('/exercicio5/resposta', function(){
    $number = $_POST['number'];
    $result = 1;
    for($i = $number; $i > 1; $i--) {
        if($i == $number){
            $result = $i * ($i - 1);
        } else{
            $result = $result * ($i - 1);
        }
    }
    echo "<h2>O fatorial de $number é $result" . "</h2>";
});

//Exercício 6
$r->get('/exercicio6/formulario', function(){
    include("exercicio6.html");
});

$r->post('/exercicio6/resposta', function(){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    if($number1 == $number2){
        echo "<h2>Números iguais: $number1" . "</h2";
    } else{
        if($number1 < $number2){
            echo "<h2>". "$number1 $number2" . "</h2";
        } else{
            echo "<h2>". "$number2 $number1" . "</h2";
        }
    }
});

//Exercício 7
$r->post('/exercicio7/resposta', function(){
    $number = $_POST['number'];
    $numberInCentimeters = $number * 100;
    return "<h2>$numberInCentimeters centímetros.</h2>";
});

$r->get('/exercicio7/formulario', function(){
    include("exercicio7.html");
});

//Exercício 8
$r->get('/exercicio8/formulario', function(){
    include("exercicio8.html");
});

$r->post('/exercicio8/resposta', function(){
    define("COBERTURA_TINTA", 3); 
    define("PRECO_LATA", 80.00); 

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valor"])) {
        $valor = $_POST["valor"];
        $litros_tinta = $valor / COBERTURA_TINTA;
        $latas_tinta = ceil($litros_tinta / 18); 
        $preco_total = $latas_tinta * PRECO_LATA;

        echo "<h2>Quantidade de latas de tinta necessárias: $latas_tinta</h2>";
        echo "<h2>Preço total: R$ " . number_format($preco_total, 2, ',', '.') . "</h2>";
    } 
});

//Exercício 9
$r->get('/exercicio9/formulario', function() {
    include("exercicio9.html");
});

$r->post('/exercicio9/resposta', function(){
    $ano_nascimento = $_POST['ano_nascimento'];
    $ano_atual = date('Y');
    $idade = $ano_atual - $ano_nascimento;
    $dias_vividos = $idade * 365; 
    $idade_em_2025 = 2025 - $ano_nascimento;

    echo "<h2>Idade: $idade anos</h2>";
    echo "<h2>Dias vividos: $dias_vividos dias</h2>";
    echo "<h2>Idade em 2025: $idade_em_2025 anos</h2>";
});


//Exercício 10
$r->get('/exercicio10/formulario', function() {
    include("exercicio10.html");
});

$r->post('/exercicio10/resposta', function(){
    $classificacao = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $imc = $peso / ($altura * $altura);
        echo "<br><br><h3>IMC: ". number_format($imc, 2)."</h3>";

        if ($imc < 18.5) {
            $classificacao = 'magreza';
        } elseif ($imc <= 24.9) {
            $classificacao = 'normal';
        } elseif ($imc <= 29.9) {
            $classificacao = 'sobrepeso';
        } elseif ($imc <= 39.9) {
            $classificacao = 'obesidade';
        } else {
            $classificacao = 'obesidadeGrave';
        }
    }
});

//Chamando o formulário ALUNOS
$r->get('/aluno/inserir',
'Php\Primeiroprojeto\Controllers\AlunoController@inserir');

$r->post('/aluno/novo',
'Php\Primeiroprojeto\Controllers\AlunoController@novo');

$r->get('/aluno', 
    'Php\Primeiroprojeto\Controllers\AlunoController@index');

$r->get('/aluno/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\AlunoController@index');

$r->get('/aluno/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunoController@alterar');

$r->get('/aluno/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunoController@excluir');

$r->post('/aluno/editar',
    'Php\Primeiroprojeto\Controllers\AlunoController@editar');

$r->post('/aluno/deletar',
    'Php\Primeiroprojeto\Controllers\AlunoController@deletar');

//Chamando o formulário CURSOS
$r->get('/curso/inserir',
'Php\Primeiroprojeto\Controllers\CursoController@inserir');

$r->post('/curso/novo',
'Php\Primeiroprojeto\Controllers\CursoController@novo');

$r->get('/curso', 
    'Php\Primeiroprojeto\Controllers\CursoController@index');

$r->get('/curso/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\CursoController@index');

$r->get('/curso/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\CursoController@alterar');

$r->get('/curso/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\CursoController@excluir');

$r->post('/curso/editar',
    'Php\Primeiroprojeto\Controllers\CursoController@editar');

$r->post('/curso/deletar',
    'Php\Primeiroprojeto\Controllers\CursoController@deletar');

//Chamando o formulário PROFESSOR
$r->get('/professor/inserir',
'Php\Primeiroprojeto\Controllers\ProfessorController@inserir');

$r->post('/professor/novo',
'Php\Primeiroprojeto\Controllers\ProfessorController@novo');

$r->get('/professor', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@index');

$r->get('/professor/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@index');

$r->get('/professor/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\ProfessorController@alterar');

$r->get('/professor/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\ProfessorController@excluir');

$r->post('/professor/editar',
    'Php\Primeiroprojeto\Controllers\ProfessorController@editar');

$r->post('/professor/deletar',
    'Php\Primeiroprojeto\Controllers\ProfessorController@deletar');

//Chamando o formulário para inserir turma
$r->get('/turma/inserir',
'Php\Primeiroprojeto\Controllers\TurmaController@inserir');

$r->post('/turma/novo',
'Php\Primeiroprojeto\Controllers\TurmaController@novo');

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}
