<?php
session_start();
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Control/TurmaControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';



// Instanciar controle de alunos e turmas
$alunoController = new AlunoController();
$turmaController = new TurmaController();

// Adicionar aluno à turma
if (isset($_POST['adicionar'])) {
    $alunoId = $_POST['aluno_id'];
    $turmaId = $_POST['turma_id'];
    $turmaController->insertTurma($alunoId);
}

// Remover aluno da turma
if (isset($_POST['remover'])) {
    $alunoId = $_POST['aluno_id'];
    $turmaId = $_POST['turma_id'];
    $turmaController->removerAlunoDaTurma($alunoId, $turmaId);
}


$alunos = $alunoController->consultarTodos();
$alunos = $alunoController->consultarPorNome();
//var_dump($alunos);
//var_dump($alunoController);
//var_dump($alunoController->consultarTodos());
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Alunos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Consulta de Alunos</h1>

        <!-- Formulário de Pesquisa -->
        <form method="GET" class="mt-4">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pesquisar por nome ou matrícula" name="search">
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
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_POST['search'])) {
                    $op = $_POST['search'];
                    if ($op != "0") {
                       
                     //   $aluno->;teste 
                    }
                }
                foreach ($alunos as $aluno) {
                    echo "<option value='{$aluno['idAluno']}'>{$aluno['nome']}</option>";


                ?>
                    <tr>
                        <td><?php echo $aluno['idAluno']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['matricula']; ?></td>
                        <td><?php echo $aluno['dataNasc']; ?></td>
                        <td><?php echo $turmasAssociadas; ?></td>
                        <td><?php echo $turmasAssociadas; ?></td>
                        
                        <td>
                            <!-- Adicionar ou Remover aluno da turma -->
                            <form method="POST" action="Alunos.php" class="d-inline">
                                <input type="hidden" name="aluno_id" value="<?php echo $aluno['idAluno']; ?>">
                                <select name="turma_id" class="form-select d-inline" required>
                                    <option value="">Selecione a turma</option>
                                    <?php
                                    // Listar todas as turmas
                                    $turmasDisponiveis = $turmaController->getAlunosDaTurma($turma);
                                    foreach ($turmasDisponiveis as $turma) {
                                        echo "<option value='{$turma['IDTurma']}'>{$turma['Nome']}</option>";
                                    }
                                    ?>
                                </select>
                                <button type="submit" name="adicionar" class="btn btn-success btn-sm">Adicionar</button>
                            </form>
                            <form method="POST" action="Alunos.php" class="d-inline">
                                <input type="hidden" name="aluno_id" value="<?php echo $aluno['idAluno']; ?>">
                                <select name="turma_id" class="form-select d-inline" required>
                                    <option value="">Selecione a turma</option>
                                    <?php
                                    foreach ($turmasDisponiveis as $turma) {
                                        echo "<option value='{$turma['IDTurma']}'>{$turma['Nome']}</option>";
                                    }
                                    ?>
                                </select>
                                <button type="submit" name="remover" class="btn btn-danger btn-sm">Remover</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>