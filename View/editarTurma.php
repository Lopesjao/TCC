<?php
session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
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
                            <?php
                           // $alunoController = new AlunoController();
                            $alunos = $alunoController->getAlunosPorTurma22($turma['idTurma']);
                            if (empty($alunos)) {
                                echo "Nenhum aluno encontrado";  // Mensagem de depuração
                            } else {
                                foreach ($alunos as $aluno):
                                    ?>
                                    <div>
                                        <?php echo htmlspecialchars($aluno['nome']); ?>
                                        <form method="POST" class="d-inline">
                                         
                                            <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                        </form>
                                    </div>
                                <?php endforeach;
                            }
                            ?>
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
        <div class="container mt-5">
        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            <a class="btn btn-primary" href="verTurma.php" role="button">Visualizar Turmas</a>
            <a class="btn btn-primary" href="editarTurma.php" role="button">Gerenciar Turmas</a>
        </div>
     
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
</body>

</html>