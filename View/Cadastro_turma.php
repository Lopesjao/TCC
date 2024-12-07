<?php
session_start();

include_once __DIR__ . '/../Model/Turma.php';
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';

$turmaController = new TurmaController();
$alunoController = new AlunoController();
$prof = new Professor(unserialize($_SESSION["professor"]));
$alunos = $alunoController->getAlunos();  // Obtém todos os alunos do banco

if (isset($_POST['cadastrar'])) {
    try {
        $turma = new Turma($_POST);
        $turma->setIdProfessor($prof->getIdProfessor());

        // Insere a turma e obtém o ID
        $idTurma = $turmaController->insertTurma2($turma);

        // Adiciona os alunos à turma
        if (isset($_POST['alunos']) && is_array($_POST['alunos'])) {
            $alunosSelecionados = array_unique($_POST['alunos']);
            $turmaController->adicionarAlunosNaTurma3($idTurma, $alunosSelecionados);
        }

        echo "<div class='alert alert-success'>Turma cadastrada com sucesso!</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao cadastrar turma: {$e->getMessage()}</div>";
    }
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
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Turma</h1>
        <form action="Cadastro_turma.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Turma:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <!-- Campo de pesquisa e seleção de alunos -->
            <div class="mb-3">
                <label for="alunos" class="form-label">Selecione os Alunos:</label>
                <select id="alunos" name="alunos[]" class="form-select" multiple required>
                    <?php
                    foreach ($alunos as $aluno) {
                        echo "<option value='{$aluno['idAluno']}'>{$aluno['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            <a class="btn btn-secondary" href="Alunos.php" role="button">Visualizar Turmas</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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