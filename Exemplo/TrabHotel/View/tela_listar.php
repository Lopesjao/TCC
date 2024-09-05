<?php
    include_once "listar.php";
    include_once ("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <title>Consulta de Dados</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="menu.php">Sistema de Hotelaria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tela_listar.php">Consulta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alterar_h.php">Edição</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Voltar</a>
                </li>
              
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <div>
        <p><b>Pesquisar Hospede</b></p>
        <?php
            comboCpf();
            if(isset($_POST["comboH"])){
                $op = $_POST["comboH"];
                if($op != "0"){
                    consultarCPF($op);
                }
            }
            consulta();
            
        ?>
        
    </div>
</div>

</body>
</html>