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
            width: 70%;
            /* Diminui o tamanho do card */
            margin: 10px auto;
            /* Centraliza os cards na tela */
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-image img {
            max-width: 100%;
            height: 250px;
            /* Ajusta a altura da imagem */
            object-fit: cover;
            /* Garante que a imagem ocupe bem o espaço */
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
                        <img src="imagens/gabinete.png" alt="Gabinete" data-bs-toggle="modal"
                            data-bs-target="#modalGabinete">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Gabinete</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/placamae.png" alt="Placa-mãe" data-bs-toggle="modal"
                            data-bs-target="#modalPlacaMae">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Placa-mãe</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/processador.png" alt="Processador" data-bs-toggle="modal"
                            data-bs-target="#modalProcessador">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Processador</h5>
                    </div>
                </div>
            </div>
            <!-- HD -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/hd.jpg" alt="HD" data-bs-toggle="modal" data-bs-target="#modalHD">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">HD</h5>
                    </div>
                </div>
            </div>
            <!-- Memória RAM -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/memoria.jpg" alt="Memória RAM" data-bs-toggle="modal"
                            data-bs-target="#modalMemoria">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Memória RAM</h5>
                    </div>
                </div>
            </div>
            <!-- Fonte -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/fonte.jpg" alt="Fonte de Alimentação" data-bs-toggle="modal"
                            data-bs-target="#modalFonte">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Fonte de Alimentação</h5>
                    </div>
                </div>
            </div>
            <!-- Periféricos -->

            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/monitor.jpeg" alt="Monitor" data-bs-toggle="modal"
                            data-bs-target="#modalMonitor">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Monitor</h5>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/teclado.jpg" alt="Teclado" data-bs-toggle="modal"
                            data-bs-target="#modalTeclado">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Teclado</h5>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="imagens/mouse.jpg" alt="Mouse" data-bs-toggle="modal" data-bs-target="#modalMouse">
                    </div>
                    <div class="card-content">
                        <h5 class="center-align">Mouse</h5>
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
    <!-- Modal Processador -->
    <div class="modal fade" id="modalProcessador" tabindex="-1" aria-labelledby="modalProcessadorLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProcessadorLabel">Processador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O processador, também chamado de CPU, é o cérebro do computador. Ele executa as instruções e
                    processa os dados necessários para o funcionamento dos programas.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HD -->
    <div class="modal fade" id="modalHD" tabindex="-1" aria-labelledby="modalHDLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHDLabel">HD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O HD (Disco Rígido) é o dispositivo de armazenamento onde os dados, sistemas operacionais e arquivos
                    pessoais são mantidos de forma permanente no computador.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Memória RAM -->
    <div class="modal fade" id="modalMemoria" tabindex="-1" aria-labelledby="modalMemoriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMemoriaLabel">Memória RAM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A memória RAM é a memória volátil do computador, usada para armazenar dados temporários enquanto os
                    programas estão em execução, proporcionando rapidez e eficiência.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Fonte -->
    <div class="modal fade" id="modalFonte" tabindex="-1" aria-labelledby="modalFonteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFonteLabel">Fonte de Alimentação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    A fonte de alimentação converte a energia da tomada para os níveis adequados exigidos pelos
                    componentes do computador, garantindo seu funcionamento seguro.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalMonitor" tabindex="-1" aria-labelledby="modalMonitorLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMonitorLabel">Monitor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O monitor é a tela onde são exibidas as informações processadas pelo computador. Ele é essencial
                    para visualizar gráficos, textos e vídeos em alta qualidade.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTeclado" tabindex="-1" aria-labelledby="modalTecladoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTecladoLabel">Teclado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O teclado é o periférico usado para digitar textos, comandos e interagir diretamente com o
                    computador. Existem vários modelos, desde mecânicos até ergonômicos.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalMouse" tabindex="-1" aria-labelledby="modalMouseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMouseLabel">Mouse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O mouse é um periférico de entrada que permite mover o cursor e interagir com os elementos visuais
                    exibidos na tela do monitor. Pode ser óptico, sem fio ou com fio.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>  <?php require_once "footer.php"; ?></footer>

</html>