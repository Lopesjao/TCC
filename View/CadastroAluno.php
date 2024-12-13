<?php



if (!isset($_SESSION)) {
    session_start();
    // var_dump($_SESSION);
//    echo "entrou ";
   
}
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
require_once('Config.php');

if (isset($_POST['cadastrar'])) {
    $aluno = new Aluno($_POST);
    $aluno->setDataNasc(date("Y-m-d H:i:s", strtotime($_POST['datanasc'])));
    // var_dump($_POST);
    $alunoController = new AlunoController();
    $resultado = $alunoController->insertAluno($aluno);

    try {
        $alunoController = new AlunoController();
        $resultado = $alunoController->insertAluno($aluno);

        if ($resultado) {
            echo "<div class='alert alert-success'>Aluno cadastrado com sucesso!</div>";
           // $alunoController->consultarPorNome($resultado);
           header("Location: login.php");
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar aluno!</div>";
        }
    } catch (Exception $e) {
        error_log("Erro ao cadastrar aluno: " . $e->getMessage());
        echo "<div class='alert alert-danger'>Ocorreu um erro ao processar seu cadastro.</div>";
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id"
        content="86253102357-79vcqcejk9ud6qp684lagut2917pcjbq.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>


</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center">Cadastro de Aluno</h1>
        <form action="CadastroAluno.php" method="POST" class="mt-4">
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
                <div class="input-group">
                    <input type="password" id="senha" name="senha" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" id="toggleSenha">
                        <i class="bi bi-eye"></i> <!-- Ícone do Bootstrap -->
                    </button>
                </div>
            </div>

            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script>
        document.getElementById('toggleSenha').addEventListener('click', function () {
            const senhaInput = document.getElementById('senha');
            const toggleButton = this;
            const icon = toggleButton.querySelector('i');

            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                senhaInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  
</body>

</html>