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
   // echo "prof entrou";
    //echo $prof;
  //  echo $_SESSION['usuario_sessao'];
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

$turmaController = new TurmaController();
$alunoController = new AlunoController();
$alunos = $alunoController->consultarTodos();



if (isset($_POST['cadastrar'])) {
    try {
        $turma = new Turma($_POST);
        $turma->setIdProfessor($prof->getidProfessor());

        // Insere a turma e obtém o ID
        $idTurma = $turmaController->insertTurma2($turma);
      //  $idTurma2 = $turmaController->getUltimaTurmaInserida();

        if (isset($_POST['alunos']) && is_array($_POST['alunos'])) {
            // Remove duplicatas da seleção do usuário
            $alunosSelecionados = array_unique($_POST['alunos']);
            // Adiciona os alunos à turma
            $turmaController->adicionarAlunosNaTurma3($idTurma, $alunosSelecionados);
        }

        echo "<div class='alert alert-success'>Turma cadastrada com sucesso!</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao cadastrar turma: {$e->getMessage()}</div>";
    }




    /* if (isset($_POST['alunosvet']) && !empty($_POST['alunosvet'])) {
         // $alu
         $alunosSelecionados = $_POST['alunosvet'];
         // $alunosSelecionados->getAlunos($idTurma);
         echo "<pre>";
         print_r($alunosSelecionados); // Mostre os dados enviados
         echo "</pre>";
         //  echo" alunos AQUI::::". var_dump($alunosSelecionados);  // Verifique o conteúdo de $alunosSelecionados
         //   var_dump($idTurma);
         // echo "alunos sleecionado AQUIIII" . var_dump($alunosSelecionados);
         $turmaController->adicionarAlunosNaTurma($idTurma, $alunosSelecionados);
         echo "ID da turma: $idTurma<br>";
         echo "Alunos selecionados:<br>";
         print_r($alunosSelecionados);

     } else {
         echo "nenhum aluno seleciona";
     }

     echo "<div class='alert alert-success'>Turma cadastrada e alunos adicionados com sucesso!</div>";
 } catch (Exception $e) {
     error_log("Erro ao cadastrar turma: " . $e->getMessage());
     echo "<div class='alert alert-danger'>Erro ao cadastrar turma: " . $e->getMessage() . "</div>";
 }*/
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turma</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>


    <div class="container mt-5 min-vh-80 ">
        <h1 class="text-center">Cadastro de Turma</h1>
        <form action="CadastroTurma.php" method="POST" class="mt-4">
            <!-- Nome da Turma -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Turma:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <!-- Campo de pesquisa e seleção de alunos -->
            <div class="mb-3">
                <label for="alunos" class="form-label">Selecione os Alunos:</label>
                <select id="alunos" name="alunos[]" class="form-select" multiple required>
                    <?php
                    // Obter alunos do banco de dados
                    $alunoController = new AlunoController();
                    $alunos = $alunoController->getAlunos2();

                    foreach ($alunos as $aluno) {
                        echo "<option value='{$aluno['idAluno']}'>{$aluno['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            <a class="btn btn-primary" href="verTurma.php" role="button">Visualizar Turmas</a>
            <a class="btn btn-primary" href="editarTurma.php" role="button">Gerenciar Turmas</a>
        </form>
    </div>
    </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#alunos').select2({
                placeholder: "Pesquise e selecione os alunos",
                allowClear: true
            });
        });
    </script>




</body>

</html>