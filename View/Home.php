<?php

if (!isset($_SESSION)) {
  session_start();
}
//if (!isset($_SESSION['usuario_sessao'])) {
//  header('Location:login.php');
//exit();
//}


if (isset($_SESSION['tipo']) && ($_SESSION['tipo']) == "prof") {
 // echo "é professor";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css">
  <style>
    * {
      color: aliceblue;
    }

    body {
      background-image: url('imagens/body.png');
     
      background-size: cover;
      background-position: center;
      background-attachment: fixed;

      height: 100vh;
    }

    
    .center-content {
      text-align: center;
      padding-top: 20vh;

    }

    .carousel-item img {
      height: 400px;
      object-fit: cover;
      width: 100%;
    }

    .btn-space {
      margin: 10px;
    }

    h1 {
      font-weight: bold;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);

    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.8);
     
    }
    #botoes{
      display: flex;
      justify-content: space-around;
      gap: 10px;
    }
  </style>
</head>

<body>

  <header>
    <?php include_once 'navbar.php'; ?>
  </header>



  <div class="container-fluid center-content">


    <!-- Carrossel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicadores -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>

      <!-- Slides -->
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

      <!-- Controles -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

   
    <div id="botoes">
      <div class="mt-4">
        <p>Sou Aluno:</p>
        <a class="btn btn-primary btn-lg btn-space" href="CadastroAluno.php" role="button">Login / Cadastro</a>

        <p>Sou Professor:</p>
        <a class="btn btn-secondary btn-lg btn-space" href="CadastroProfessor.php" role="button">Login / Cadastro</a>
      </div>
    </div>
  </div>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>
<footer> <?php require_once "footer.php"; ?></footer>

</html>