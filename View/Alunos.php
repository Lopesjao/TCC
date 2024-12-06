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


//$alunos = $alunoController->consultarTodos();
//$alunos = $alunoController->consultarPorNome();
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Controle de turmas</h1>

        <!-- Formulário de Pesquisa -->
        <form method="GET" class="mt-4">
            <div class="input-group mb-3">
            <h2 class="text-center">Pesquisar alunos</h2>
                <input type="text" class="form-control" placeholder="Pesquisar por nome ou matrícula" name="search">
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
                <select id="alunos" name="alunos[]" class="form-control" multiple>
                    <?php

                    $alunos = $alunoController->getAlunos();
                    foreach ($alunos as $aluno) {
                        echo "<option value='{$aluno['idAluno']}'>{$aluno['nome']}</option>";


                        ?>

                    </select>
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

                    <tr>
                        <td><?php echo $aluno['idAluno']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['matricula']; ?></td>
                        <td><?php echo $aluno['dataNasc']; ?></td>
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
                                    $turmasDisponiveis = $turmaController->getAlunosDaTurma($turma);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>