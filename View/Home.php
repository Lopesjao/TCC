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
      font-size: large;
    }

    .carousel {
      position: relative;
      width: 80%;
      max-width: 500px;
      overflow: hidden;
      margin: 0 auto;
      margin-top: 5%;
      margin-bottom: 5%;
      border: 2px solid #ccc;
      border-radius: 10px;
    }

    .slides {
      opacity: 0.7;
      display: flex;
      width: 100%;
      height: auto;
      transition: transform 0.5s ease;

    }

    .slides a {
      flex-shrink: 0;
      width: 100%;
    }

    .slides img {
      width: 100%;
      height: 100%;
      border-radius: 10px;
    }

    .btn-prev,
    .btn-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      font-size: 24px;
      cursor: pointer;
      z-index: 10;
    }

    .btn-prev {
      left: 10px;
    }

    .btn-next {
      right: 10px;
    }

    .btn-prev:hover,
    .btn-next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    @keyframes slide {

      0%,
      20% {
        transform: translateX(0%);
      }

      25%,
      45% {
        transform: translateX(-100%);
      }

      50%,
      70% {
        transform: translateX(-200%);
      }

      75%,
      95% {
        transform: translateX(-300%);
      }

      100% {
        transform: translateX(0%);
      }


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



    body {


      background-size: cover;
      background-position: center;
      background-attachment: fixed;

      height: 100vh;
    }

    #botoes {
      display: flex;
      justify-content: space-around;
      gap: 10px;
      margin-top: 20px;
    }

    .png-image {
      opacity: 0.7;
      /* Torna as imagens PNG mais transparentes */
    }

    #containerbt {
      margin-top: 5%;
      
      background-color: #2D55AD;

      /* Cor de fundo do contêiner */
      border: 2px solid #2D55AD;
      /* Borda com uma cor mais clara */
      border-radius: 20px;
      /* Arredonda as bordas */
      padding: 20px;
      color: #fff;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      margin-top: 10px;
      max-width: auto;

      margin-left: 10px;


      text-align: center;

    }

    #bt2 {


      display: flex;

    }

    #containerprincipal {
      background-color: #2D55AD;
margin-top: 20%;
      /* Cor de fundo do contêiner */
      border: 2px solid #2D55AD;
      /* Borda com uma cor mais clara */
      border-radius: 10px;
      /* Arredonda as bordas */
      padding: 20px;
      color: #fff;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);



      margin: 20px auto;

      text-align: center;
    }

    .btn-container {
      display: flex;
      gap: 20px;

      justify-content: center;

      align-items: center;
    }

    .btn-container div {
      text-align: center;

    }
  </style>
</head>

<body>

  <header>
    <?php include_once 'navbar.php'; ?>
  </header>



  <div class="container-fluid center-content">
    <div id="containerprincipal">
      <h1>Bem vindo ao InfoQuest</h1>
      <p>Objeto de Aprendizagem para auxilio da Disciplina de Arquitetura de Organização de Computadores</p>
    </div>
    <div id="containerbt">
      <h5>Confira os principais Componentes do computador</h5>
    </div>
    <div >
      <div class="carousel">
        <div class="slides">
          <a href="pecas.php"><img src="imagens/memoria.jpg" alt="Memória RAM"></a>
          <a href="pecas.php"><img src="imagens/processador3.webp" alt="Processador"></a>
          <a href="pecas.php"><img src="imagens/placamae.png" alt="Placa Mãe"></a>
          <a href="pecas.php"><img src="imagens/HD2.png" alt="HD"></a>
        </div>
        <button class="btn-prev" onclick="prevSlide()">&#10094;</button>
        <button class="btn-next" onclick="nextSlide()">&#10095;</button>
      </div>
    </div>

    <div id="bt2">
      <div id="containerbt">
        <div id="botoes">
          <div class="btn-container">
            <div>
              <p>Sou Aluno e desejo me cadastrar:</p>
              <a class="btn btn-primary btn-lg btn-space" href="CadastroAluno.php" role="button">Cadastro</a>
            </div>

          </div>
        </div>
      </div>

      <div id="containerbt">
        <div id="botoes">
          <div class="btn-container">

            <div>
              <p>Sou Professor e desejo me cadastrar:</p>
              <a class="btn btn-primary btn-lg btn-space" href="CadastroProfessor.php" role="button">
                Cadastro</a>
            </div>
          </div>
        </div>
      </div>



      <div id="containerbt">
        <div id="botoes">
          <div class="btn-container">

            <div>
              <p>Acesse o fórum de discussão</p>
              <a class="btn btn-primary btn-lg btn-space" href="VerErro.php" role="button">Fórum</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    let currentIndex = 0;
    const slides = document.querySelector(".slides");
    const totalSlides = document.querySelectorAll(".slides a").length;

    function updateCarousel() {
      const offset = -currentIndex * 100;
      slides.style.transform = `translateX(${offset}%)`;
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % totalSlides;
      updateCarousel();
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
      updateCarousel();
    }
  </script>

</body>
<footer> <?php require_once "footer.php"; ?></footer>

</html>