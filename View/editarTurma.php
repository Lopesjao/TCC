<?php
session_start();
if (!isset($_SESSION["aluno"]) && !isset($_SESSION["professor"])) {
    header("Location: login.php");
    exit;
}
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';

$prof = new Professor(unserialize($_SESSION["professor"]));
$_SESSION['usuario_sessao'] = $prof->getidProfessor();
$_SESSION['tipo'] = "prof";

$turmaController = new TurmaController();
$alunoController = new AlunoController();

$professorId = $_SESSION['usuario_sessao'];
$nomeTurma = isset($_GET['search']) ? $_GET['search'] : '';

// Buscar turmas
$turmas = $turmaController->getTurmasDoProfessor2($professorId, $nomeTurma);

// Tratar remoção de alunos
if (isset($_POST['aluno_id']) && isset($_POST['turma_id'])) {
    $alunoId = $_POST['aluno_id'];
    $turmaId = $_POST['turma_id'];
    $turmaController->removerAlunoDaTurma($alunoId, $turmaId);

    header('Location: editarTurma.php');
    exit();
}

// Tratar exclusão de turma
if (isset($_POST['excluirTurma']) && isset($_POST['idTurma'])) {
    $idTurma = $_POST['idTurma'];
    $turmaController->excluirTurma($idTurma);
    header("Location: editarTurma.php"); // Redireciona para a página após exclusão
    exit();
}

// Alterar nome da turma
if (isset($_POST['novoNome']) && isset($_POST['idTurma'])) {
    $novoNome = $_POST['novoNome'];
    $turmaId = $_POST['idTurma'];
    $turmaController->alterarNomeTurma($turmaId, $novoNome);

    header('Location: editarTurma.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Turmas</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<style>
    .btn {
        align-items: center;
        margin: auto 0;
    }
</style>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5 min-vh-80">
        <h1 class="text-center">Editar Turmas</h1>

        <!-- Formulário de Pesquisa -->
        <form method="GET" class="mt-4">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pesquisar por nome da turma" name="search"
                    value="<?php echo htmlspecialchars($nomeTurma); ?>">
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </div>
        </form>

        <!-- Tabela de Turmas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome da Turma</th>
                    <th>Alunos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turmas as $turma): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($turma['nome']); ?>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editTurmaModal<?php echo $turma['idTurma']; ?>">Editar Nome</button>

                            <!-- Modal para editar nome -->
                            <div class="modal fade" id="editTurmaModal<?php echo $turma['idTurma']; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Nome da Turma</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control" name="novoNome"
                                                    value="<?php echo htmlspecialchars($turma['nome']); ?>" required>
                                                <input type="hidden" name="idTurma"
                                                    value="<?php echo $turma['idTurma']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>


                        <td>
                            <!-- Botão para abrir o modal de alunos -->
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#verAlunosModal<?php echo $turma['idTurma']; ?>">
                                Ver Alunos
                            </button>

                            <!-- Modal para listar os alunos -->
                            <div class="modal fade" id="verAlunosModal<?php echo $turma['idTurma']; ?>" tabindex="-1"
                                aria-labelledby="verAlunosLabel<?php echo $turma['idTurma']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="verAlunosLabel<?php echo $turma['idTurma']; ?>">
                                                Alunos da Turma: <?php echo htmlspecialchars($turma['nome']); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $alunos = $alunoController->getAlunosPorTurma22($turma['idTurma']);
                                            if (empty($alunos)) {
                                                echo "<p>Nenhum aluno encontrado.</p>";
                                            } else {
                                                echo "<ul class='list-group'>";
                                                foreach ($alunos as $aluno) {
                                                    echo "<li class='list-group-item'>" . htmlspecialchars($aluno['nome']) . "</li>";
                                                }
                                                echo "</ul>";
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>



                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                onclick="setTurmaId(<?php echo $turma['idTurma']; ?>)">
                                Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <a class="btn btn-primary" href="CadastroTurma.php" role="button">Cadastro Turmas</a>
        <a class="btn btn-primary" href="verTurma.php" role="button">Visualizar Turmas</a>
        <a class="btn btn-primary" href="editarTurma.php" role="button">Gerenciar Turmas</a>


    </div>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir esta turma? Essa ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" action="editarTurma.php" class="d-inline">
                        <input type="hidden" name="idTurma" id="idTurma" value="">
                        <button type="submit" class="btn btn-danger" name="excluirTurma">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Função para definir o ID da turma no modal
        function setTurmaId(id) {
            document.getElementById('idTurma').value = id;
        }
    </script>
 

</html>