<?php

if (!isset($_SESSION)){
session_start();
}
//if (!isset($_SESSION['usuario_sessao'])) {
//  header('Location:login.php');
//exit();
//}


if(isset($_SESSION['tipo']) && ($_SESSION['tipo'])=="prof"){
    echo "é professor";
    var_dump($_SESSION);

  }else{
    if(isset($_SESSION['tipo']) && ($_SESSION['tipo'])==""){
    echo "é aluno";
    }
  }

?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "navbar.php"; ?>
    <!--<h1>Bem-vindo, <?php //echo htmlspecialchars($_SESSION['usuario_sessao']); ?>!</h1>-->
   
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
 

        <!-- Botões de Login/Cadastro -->
        <p>Sou Aluno:</p>
        <a class="btn btn-primary btn-lg btn-space" href="CadastroAluno.php" role="button">Login / Cadastro</a>

        <p class="btn-space">Sou Professor:</p>
        <a class="btn btn-secondary btn-lg btn-space" href="CadastroProfessor.php" role="button">Login / Cadastro</a>
    </div>

    <!-- Link do Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <footer>  <?php require_once "footer.php"; ?></footer>
</body>

</html>
