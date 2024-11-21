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
    <link rel="stylesheet" href="styles.css">  <!-- Vincule o seu CSS aqui -->

</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="cabecalho">
      

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
