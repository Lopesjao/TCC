<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Informática</title>
    <script defer src="controleQuestoes.js"></script>
    <style>
        /* CSS básico para ocultar o botão de reinício e organizar o layout */
        #reinicia {
            display: none;
        }
        .container {
            text-align: center;
        }
        .questao img {
            max-width: 75%;
            height: auto;
        }
        .questao button {
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="cabecalho">
        <h1>Quiz Informática</h1>

        <div class="container">
            <h2 id="texto">Bem-vindo ao quiz de informática!<br>Teste seus conhecimentos na área!</h2>
            
       
            <div class="questao"></div>
            
            <div>
            
                <button id="comeca">Começar</button>
           
                <button id="reinicia">Reiniciar</button>
            </div>
        </div>
    </div>
</body>

</html>
