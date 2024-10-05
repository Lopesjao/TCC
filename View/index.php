<?php
session_start();
//if (!isset($_SESSION['usuario_sessao'])) {
  //  header('Location:login.php');
  //exit();
//}
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "navbar.php"; ?>
    <h1>Bem-vindo, <?php //echo htmlspecialchars($_SESSION['usuario_sessao']); ?>!</h1>
    <a href="logout.php">Logout</a> <!-- Link para logout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Style.css"> 
    

    <style>
      
     
    </style>
</head>

<body>

    <div class="container-fluid center-content">
        <!-- Logo no centro -->
        <img src="imagens/tela.png" alt="Logo" width="100" height="100" class="d-inline-block align-text-top"  >

        <!-- Botões de Login/Cadastro -->
        <p>Sou Aluno:</p>
        <a class="btn btn-primary btn-lg btn-space" href="CadastroAluno.php" role="button">Login / Cadastro</a>

        <p class="btn-space">Sou Professor:</p>
        <a class="btn btn-secondary btn-lg btn-space" href="login_professor.php" role="button">Login / Cadastro</a>
    </div>

    <!-- Link do Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="controleQuestoes.js"></script>
</body>

</html>
