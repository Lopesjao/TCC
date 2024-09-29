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
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="86253102357-79vcqcejk9ud6qp684lagut2917pcjbq.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
    <h1>Cadastro de Aluno</h1>
    <form action="CadastroAluno.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required><br><br>

        <label for="datanasc">Data de Nascimento:</label>
        <input type="date" id="datanasc" name="datanasc" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <div class="user">
        <h1>Olá, <span id="user-name">visitante</span>!</h1>
        <p id="user-email"></p>
        <img id="user-photo" src="" alt="Foto do perfil" style="display:none;">
    </div>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="370" data-height="50" data-longtitle="true" data-lang="pt-BR"></div>

    <script>
        function onSignIn(response) {
            var perfil = response.getBasicProfile();
            var userName = perfil.getName();
            var userEmail = perfil.getEmail();
            var userPicture = perfil.getImageUrl();

            document.getElementById('user-name').innerText = userName;
            document.getElementById('user-email').innerText = userEmail;
            var userPhoto = document.getElementById('user-photo');
            userPhoto.src = userPicture;
            userPhoto.style.display = 'block'; // Mostrar a imagem
        };
    </script>
</body>

</html>
