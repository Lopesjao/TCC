<?php
include_once __DIR__ . '/../Model/Professor.php';
include_once __DIR__ . '/../Control/ProfessorControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
require_once('Config.php');

if (isset($_POST['cadastrar'])) {
    $professor = new Professor($_POST);
    $professor->setDataNasc(date("Y-m-d H:i:s", strtotime($_POST['datanasc'])));
    var_dump($_POST);
    $ProfessorController = new ProfessorController();
    $resultado = $ProfessorController->insertProf($professor);

    if ($resultado) {
        echo "Professor cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar professor!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="86253102357-79vcqcejk9ud6qp684lagut2917pcjbq.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>


</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
    <h1 class="text-center">Cadastro de Professor</h1>
    <form action="CadastroProfessor.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="datanasc" class="form-label">Data de Nascimento:</label>
            <input type="date" id="datanasc" name="datanasc" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>

        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
