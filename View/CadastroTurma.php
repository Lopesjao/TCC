<?php

/*if (!isset($_SESSION)) {
  
    // var_dump($_SESSION);
    echo "entrou ";
   
}*/


if (!isset($_SESSION)) {
    session_start();
    // var_dump($_SESSION);
//    echo "entrou ";

}
$resultado = true;

include_once __DIR__ . '/../Model/Turma.php';
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';


if ($resultado) {
    session_regenerate_id();
    $prof = new Professor(unserialize($_SESSION["professor"]));
    //var_dump($aluno);
    $_SESSION['usuario_sessao'] = $prof->getidProfessor();
    $_SESSION['tipo'] = "prof";
    echo "prof entrou";
    echo $prof;
    echo $_SESSION['usuario_sessao'];
    // header('Location: Home.php');
    //  exit();
}

/*if (!isset($_SESSION['idProfessor'])) {
    session_regenerate_id();
    $prof = new Professor(unserialize($_SESSION["Professor"]));
   // var_dump($prof);
    $_SESSION['usuario_sesao'] = $prof->getidProfessor();
    $_SESSION['usuario_sesao'] = $prof->getNome();
    echo "nome: ", $prof->getNome();

   // var_dump($_SESSION);
 //   $prof = new Professor(unserialize($_SESSION["professor"]));
    //var_dump($aluno);
 ////   $_SESSION['usuario_sessao'] = $prof->getEmail();
   //var_dump($prof->getNome(),"nome prof");

    echo "entrou prof e";
    // $idProfessor = $_SESSION['idProfessor'];
} else {
    echo "erroooo";
}*/






//$idProfessorLogado = $_SESSION['idProfessor'];


$alunoController = new AlunoController();
$alunos = $alunoController->consultarTodos();


$turmaController = new TurmaController();
$turmas = $turmaController->getTurmas($prof);


if (isset($_POST['cadastrar'])) {
    try {

        $turma = new Turma($_POST);
        $turma->setIdProfessor($prof->getidProfessor());
        //  $turma->__toString();


        $idTurma = $turmaController->insertTurma($turma);
        //  var_dump($idTurma);

        if (isset($_POST['alunos'])) {
            $alunosSelecionados = $_POST['alunos'];
            $turmaController->adicionarAlunosNaTurma($idTurma, $alunosSelecionados);
            // $turmaController->insertTurma($aluno);
        }

        echo "<div class='alert alert-success'>Turma cadastrada e alunos adicionados com sucesso!</div>";
    } catch (Exception $e) {
        echo $e->getMessage();
        error_log("Erro ao cadastrar turma: " . $e->getMessage());
        echo "<div class='alert alert-danger'>Ocorreu um erro ao processar seu cadastro.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Turma</h1>
        <form action="CadastroTurma.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Turma:</label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>


            <div class="mb-3">
                <label for="turma_existente" class="form-label">Selecione uma Turma Existente:</label>
                <select id="turma_existente" name="turma_existente" class="form-select">
                    <option value="">Selecione uma turma (opcional)</option>
                    <?php
                    foreach ($turmas as $turma) {
                        echo "<option value='{$turma['idTurma']}'>{$turma['nome']}</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label for="alunos" class="form-label">Selecione os Alunos:</label>
                <select id="alunos" name="alunos[]" class="form-select" multiple required>
                    <option value="">Selecione os alunos</option>
                    <?php
                    foreach ($alunos as $aluno) {
                        echo "<option value='{$aluno['idAluno']}'>{$aluno['nome']}</option>";
                        echo "<option value='{$aluno['idAluno']}'>{$aluno['matricula']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <footer> <?php require_once "footer.php"; ?></footer>
</body>

</html>