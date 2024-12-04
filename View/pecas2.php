<?php
if (!isset($_SESSION)) {
    session_start();
}
//if (!isset($_SESSION['usuario_sessao'])) {
//  header('Location:login.php');
//exit();
//}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componentes Interativos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .image-container {
            position: relative;
            margin: 0 10px; /* Espaço entre as imagens */
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        .images-wrapper {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px; /* Espaçamento entre imagens */
        }

        .hotspot {
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: blue;
            border-radius: 50%;
            cursor: pointer;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <header>
        <?php include_once 'navbar.php'; ?>
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Componentes Interativos</h1>
        <div class="images-wrapper mt-4">
            <!-- Primeiro contêiner -->
            <div class="image-container">
                <img src="imagens/gabinete.png" alt="Gabinete">
                <!-- Ponto interativo -->
                <div class="hotspot" style="top: 70%; left: 50%;"  data-bs-placement="top"
                    title="Gabinete" data-bs-target="#modalGabinete" data-bs-toggle="tooltip"></div>
            </div>
            <!-- Segundo contêiner -->
            <div class="image-container">
                <img src="imagens/placamae.png" alt="Placa-mãe">
                <!-- Ponto interativo -->
                <div class="hotspot" style="top: 20%; left: 50%;" data-bs-placement="top"
                    title="Placa-mãe" data-bs-target="#modalPlacaMae" data-bs-toggle="modal"></div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Modal Gabinete -->
    <div class="modal fade" id="modalGabinete" tabindex="-1" aria-labelledby="modalGabineteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGabineteLabel">Gabinete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O gabinete é a estrutura que acomoda os componentes internos de um computador, como a placa-mãe,
                    processador, e outros.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Placa-mãe -->
    <div class="modal fade" id="modalPlacaMae" tabindex="-1" aria-labelledby="modalPlacaMaeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPlacaMaeLabel">Placa-mãe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A placa-mãe é o principal circuito de um computador e conecta todos os componentes para funcionarem
                    juntos.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltips.forEach(t => new bootstrap.Tooltip(t));
    </script>
</body>

</html>
