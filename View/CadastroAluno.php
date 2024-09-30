<?php
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';
require_once('Config.php');

if (isset($_POST['cadastrar'])) {
    $aluno = new Aluno($_POST);
    $aluno->setDataNasc(date("Y-m-d H:i:s", strtotime($_POST['datanasc'])));
    var_dump($_POST);
    $alunoController = new AlunoController();
    $resultado = $alunoController->insertAluno($aluno);

    if ($resultado) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar aluno!";
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
    
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="86253102357-79vcqcejk9ud6qp684lagut2917pcjbq.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var idToken = googleUser.getAuthResponse().id_token;

            // Exibe as informações do usuário na página
            document.getElementById('user-name').innerText = profile.getName();
            document.getElementById('user-email').innerText = profile.getEmail();
            var userPhoto = document.getElementById('user-photo');
            userPhoto.src = profile.getImageUrl();
            userPhoto.style.display = 'block'; // Mostra a imagem do perfil

            // Redireciona para o oauth2callback.php com o id_token do Google
            window.location.href = 'oauth2callback.php?id_token=' + idToken;
        }
    </script>
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
                <input type="text" id="matricula" name="Matricula" class="form-control" required>
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

        <div class="user mt-4">
            <h1>Olá, <span id="user-name">visitante</span>!</h1>
            <p id="user-email"></p>
            <img id="user-photo" src="" alt="Foto do perfil" style="display:none;">
        </div>

        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="370" data-height="50" data-longtitle="true" data-lang="pt-BR"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
