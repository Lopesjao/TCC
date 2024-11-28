<?php
include_once __DIR__ . '/../Model/Turma.php';
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
require_once('Config.php');

// Inicia a sessão para obter o professor logado
session_start();

// Verifica se o professor está logado
if (!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit();
}

// O ID do professor logado
$idProfessorLogado = $_SESSION['professor_id'];

if (isset($_POST['cadastrar'])) {
    try {
        // Cria a turma com os dados fornecidos
        $turma = new Turma($_POST);
        $turma->setIdProfessor($idProfessorLogado);  // Associa o professor logado
        
        $turmaController = new TurmaController();
        $resultado = $turmaController->insertTurma($turma);
        
        if ($resultado) {
            // Após cadastrar a turma, associa os alunos à turma
            $idTurma = $turmaController->getAlunos();
            if (isset($_POST['alunos'])) {
                $turmaController->adicionarAlunosNaTurma($idTurma, $_POST['alunos']);
            }
            echo "<div class='alert alert-success'>Turma cadastrada e alunos adicionados com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar turma!</div>";
        }
    } catch (Exception $e) {
        error_log("Erro ao cadastrar turma: " . $e->getMessage());
        echo "<div class='alert alert-danger'>Ocorreu um erro ao processar seu cadastro.</div>";
    }
}

// Carrega todos os alunos cadastrados
$alunoController = new AlunoController();
$alunos = $alunoController->getAlunos();
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
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="alunos" class="form-label">Selecione os Alunos:</label>
                <select id="alunos" name="alunos[]" class="form-select" multiple required>
                    <option value="">Selecione os alunos</option>
                    <?php
                    // Exibe todos os alunos cadastrados
                    foreach ($alunos as $aluno) {
                        echo "<option value='{$aluno['idAluno']}'>{$aluno['nome']}</option>";
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
