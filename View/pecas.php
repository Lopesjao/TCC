<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componentes Interativos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .card {
            transition: transform 0.3s ease-in-out;
            align-items: center;
            width: 70%; /* Diminui o tamanho do card */
            margin: 10px auto; /* Centraliza os cards na tela */
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-image img {
            max-width: 100%;
            height: 250px; /* Ajusta a altura da imagem */
            object-fit: cover; /* Garante que a imagem ocupe bem o espaço */
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <?php include_once 'navbar.php'; ?>
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Principais Componentes de um Computador</h1>
        <div class="row mt-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/gabinete.png" alt="Gabinete" data-bs-toggle="modal" data-bs-target="#modalGabinete">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Gabinete</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/placamae.png" alt="Placa-mãe" data-bs-toggle="modal" data-bs-target="#modalPlacaMae">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Placa-mãe</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>
