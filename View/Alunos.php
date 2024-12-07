<?php
session_start();
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';
$resultado = true;
if ($resultado) {
    session_regenerate_id();
    $prof = new Professor(unserialize($_SESSION["professor"]));
    //var_dump($aluno);
    $_SESSION['usuario_sessao'] = $prof->getidProfessor();
    $_SESSION['tipo'] = "prof";
    //  echo "prof entrou";
    //   echo $prof;
    //   echo $_SESSION['usuario_sessao'];
    // header('Location: Home.php');
    //  exit();
}

// Instanciar controle de alunos e turmas
$alunoController = new AlunoController();
$turmaController = new TurmaController();
$professorId = $prof->getidProfessor();//$_SESSION['idProfessor'];
$turmas = $turmaController->getTurmasDoProfessor($professorId);
$turmaSelecionada = isset($_GET['turma']) ? $_GET['turma'] : null;
$pesquisa = isset($_GET['search']) ? $_GET['search'] : '';


// Paginação
$limite = 5; // Número de alunos por página
$paginaAtual = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($paginaAtual - 1) * $limite;


// Buscar alunos da turma (se houver filtro de turma)
//$alunos = $alunoController->pesquisarAlunospg($pesquisa, $turmaSelecionada, $limite, $offset);

// Contar o número total de alunos (para a paginação)
$totalAlunos = $alunoController->contarAlunos($pesquisa, $turmaSelecionada);
$totalPaginas = ceil($totalAlunos / $limite);

// Adicionar aluno à turma
if (isset($_POST['adicionar'])) {
    $alunoId = $_POST['aluno_id'];
    $turmaId = $_POST['turma_id'];
    $turmaController->adicionarAlunoNaTurma($alunoId, $turmaId);
}

// Remover aluno da turma
if (isset($_POST['remover'])) {
    $alunoId = $_POST['aluno_id'];
    $turmaId = $_POST['turma_id'];
    $turmaController->removerAlunoDaTurma($alunoId, $turmaId);
}

// Pesquisa de alunos
$pesquisa = isset($_GET['search']) ? $_GET['search'] : '';
$alunos = $alunoController->pesquisarAlunos($pesquisa);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Turmas</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Controle de Turmas</h1>


        <!-- Formulário de Pesquisa -->
        <form method="GET" class="mt-4">
            <div class="input-group mb-3">
                <h2 class="text-center">Pesquisar alunos</h2>
                <input type="text" class="form-control" placeholder="Pesquisar por nome ou matrícula" name="search"
                    value="<?php echo htmlspecialchars($pesquisa); ?>">
                <select name="turma" class="form-select" required>
                    <option value="">Selecione uma turma</option>
                    <?php foreach ($turmas as $turma): ?>
                        <option value="<?php echo $turma['idTurma']; ?>" <?php echo $turma['idTurma'] == $turmaSelecionada ? 'selected' : ''; ?>>
                            <?php echo $turma['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </div>
        </form>

        <!-- Tabela de Alunos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Matricula</th>
                    <th>Data Nasc</th>
                    <th>Turmas</th>
               
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno['idAluno']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['matricula']; ?></td>
                        <td><?php echo $aluno['dataNasc']; ?></td>
                        <td>
                            <?php
                            // Exibir turmas associadas ao aluno
                            $turmasAssociadas = $turmaController->getAlunosDaTurma($aluno['idAluno']);
                            foreach ($turmasAssociadas as $turma) {
                                echo "<p>{$turma['nome']}</p>";
                            }
                            ?>
                        </td>
                     
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination justify-content-center">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?php echo $i == $paginaAtual ? 'active' : ''; ?>">
                        <a class="page-link"
                            href="?page=<?php echo $i; ?>&search=<?php echo $pesquisa; ?>&turma=<?php echo $turmaSelecionada; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
  

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#alunos').select2({
                placeholder: "Selecione os alunos",
                allowClear: true,
            });
        });
    </script>
</body>

</html>