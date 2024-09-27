<?php
include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Control/AlunoControle.php';
include_once __DIR__ . '/../Conexao/ConexaoConfig.php';



if (isset($_POST['cadastrar'])) {
    /*  $nome = $_POST['nome'];
      $email = $_POST['email'];
      $matricula = $_POST['matricula'];
      $dataNasc = $_POST['datanasc'];
      $senha = $_POST['senha'];

      $aluno = new Aluno();
      $aluno->setNome($nome);
      $aluno->setEmail($email);
     
      $aluno->setDataNasc($dataNasc);
      $aluno->setSenha($senha);
  */

    $aluno = new Aluno($_POST);
//converter data para o mysql
    $aluno->setDataNasc(date("Y-m-d H:i:s",strtotime($_POST['datanasc'])));
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
    <meta name="google-signin-client_id" content="bdinfoquest-436819">
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
        <input type="text" id="matricula" name="Matricula" required><br><br>

        <label for="datanasc">Data de Nascimento:</label>
        <input type="date" id="datanasc" name="datanasc" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    <div class="user">
     
      <h1>Olá, <span id="user-name">visitante</span>!</h1>
      <p id="user-email"></p>
    </div>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="370" data-height="50" data-longtitle="true" data-lang="pt-BR"></div>
 
    <script>
      function onSignIn(response) {
            // Conseguindo as informações do seu usuário:
            var perfil = response.getBasicProfile();
 
            // Conseguindo o ID do Usuário
            var userID = perfil.getId();
 
            // Conseguindo o Nome do Usuário
            var userName = perfil.getName();
 
            // Conseguindo o E-mail do Usuário
            var userEmail = perfil.getEmail();
 
            // Conseguindo a URL da Foto do Perfil
            var userPicture = perfil.getImageUrl();
 
            document.getElementById('user-photo').src = userPicture;
            document.getElementById('user-name').innerText = userName;
            document.getElementById('user-email').innerText = userEmail;
 
            // Recebendo o TOKEN que você usará nas demais requisições à API:
            var LoR = response.getAuthResponse().id_token;
            console.log("~ le Tolkien: " + LoR);
        };
    </script>
</body>

</html>