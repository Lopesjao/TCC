<?php

if (!isset($_SESSION)) {
  session_start();
}
//if (!isset($_SESSION['usuario_sessao'])) {
//  header('Location:login.php');
//exit();
//}


if (isset($_SESSION['tipo']) && ($_SESSION['tipo']) == "prof") {
  echo "é professor";
  //$aluno = new Aluno(unserialize($_SESSION["aluno"]));
  //$_SESSION['usuario_sessao'] = ; 
  // var_dump($_SESSION);

} else {
  if (isset($_SESSION['tipo']) && ($_SESSION['tipo']) == "") {
    echo "é aluno";
  }
}

?>





<!DOCTYPE html>
<html lang="pt-br">

<head>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Inicial</title>
  <!-- Link do Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Style.css">
  <style>
        /* Define uma altura máxima para as imagens no carrossel */
        .carousel-item img {
            height: 400px; /* Ajuste a altura conforme necessário */
            object-fit: cover; /* Garante que a imagem se ajuste sem distorcer */
        }
    </style>
</head>

<body>
  <?php require_once "navbar.php"; ?>
  <!--<h1>Bem-vindo, <?php //echo htmlspecialchars($_SESSION['tipo']); ?>!</h1>-->




  <div class="container-fluid center-content">
    <!-- Logo no centro -->

    <div <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="imagens/gabinete.png" class="d-block w-100" alt="Imagem 1">
        </div>
        <div class="carousel-item">
          <img src="imagens/placamae.png" class="d-block w-100" alt="Imagem 2">
        </div>
        <div class="carousel-item">
          <img src="imagens/memoria.jpg" class="d-block w-100" alt="Imagem 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Botões de Login/Cadastro -->
    <p>Sou Aluno:</p>
    <a class="btn btn-primary btn-lg btn-space" href="CadastroAluno.php" role="button">Login / Cadastro</a>

    <p class="btn-space">Sou Professor:</p>
    <a class="btn btn-secondary btn-lg btn-space" href="CadastroProfessor.php" role="button">Login / Cadastro</a>
  </div>

  <!-- Link do Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <footer> <?php require_once "footer.php"; ?></footer>
</body>

</html>