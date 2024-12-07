<?php
session_start();
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';
$prof = new Professor(unserialize($_SESSION["professor"]));
//var_dump($aluno);
$_SESSION['usuario_sessao'] = $prof->getidProfessor();
$_SESSION['tipo'] = "prof";
echo "prof entrou";
echo $prof;
echo $_SESSION['usuario_sessao'];
// Instanciar controle de turmas
$turmaController = new TurmaController();

// Obter o ID do professor logado (a partir da sessão)
$professorId = $_SESSION['usuario_sessao']; // Supondo que o ID do professor está na sessão

// Obter o nome da turma pesquisado
$nomeTurma = isset($_GET['search']) ? $_GET['search'] : '';

// Buscar turmas do professor, com filtro de nome
$turmas = $turmaController->getTurmasDoProfessor2($professorId, $nomeTurma);

if (isset($_POST['novoNome']) && isset($_POST['idTurma'])) {
    $novoNome = $_POST['novoNome'];
    $turmaId = $_POST['idTurma'];

    // Chamar o controlador de turma
    $turmaController = new TurmaController();
    $turmaController->alterarNomeTurma($turmaId, $novoNome);

    // Redirecionar de volta para a tela principal
    header('Location: editarTurma.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmas do Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Turmas do Professor</h1>

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
                            <?php echo $turma['nome']; ?>
                            <!-- Formulário para editar o nome da turma -->
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editTurmaModal<?php echo $turma['idTurma']; ?>">Editar</button>

                            <!-- Modal para editar nome da turma -->
                            <div class="modal fade" id="editTurmaModal<?php echo $turma['idTurma']; ?>" tabindex="-1"
                                aria-labelledby="editTurmaLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editTurmaLabel">Editar Nome da Turma</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fechar"></button>
                                        </div>
                                        <form method="POST" action="editarTurma.php">
                                            <div class="modal-body">
                                                <input type="text" class="form-control" name="novoNome"
                                                    value="<?php echo $turma['nome']; ?>" required>
                                                <input type="hidden" name="turmaId"
                                                    value="<?php echo $turma['idTurma']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php
                            $alunoController = new AlunoController();
                            //  $turmaController->getAlunosDaTurma();
                            $alunos = $alunoController->getAlunosPorTurma2($turmaId); // Novo método
                            //  echo "idTurma".$turma;
                        
                            foreach ($alunos as $aluno): ?>
                                <div>
                                    <?php echo htmlspecialchars($aluno['nome']); ?>
                                    <form method="POST" action="editarTurma.php" class="d-inline">
                                        <input type="hidden" name="aluno_id" value="<?php echo $aluno['idAluno']; ?>">
                                        <input type="hidden" name="turma_id" value="<?php echo $turma['idTurma']; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        </td>
                        <td>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>