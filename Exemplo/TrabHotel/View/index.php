<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="menu.php">Sistema de Hotelaria</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                </ul>
            </div>
        </div>
    </nav>
    <div id="containerform">
        <div class="container mt-5 container-form">

            <h1>Cadastro de Hóspedes</h1>
            <form action="inserir.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
                    </div>
                    <div class="col-md-6">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                </div>
                <div class="mb-3">
                    <label for="paisOrigem" class="form-label">País de Origem</label><br>
                    <input type="radio" id="brasil" name="paisOrigem" value="Brasil">
                    <label for="brasil">Brasil</label><br>
                    <input type="radio" id="argentina" name="paisOrigem" value="Argentina">
                    <label for="argentina">Argentina</label><br>
                    <input type="radio" id="paraguai" name="paisOrigem" value="Paraguai">
                    <label for="paraguai">Paraguai</label><br>
                    <input type="radio" id="uruguai" name="paisOrigem" value="Uruguai">
                    <label for="uruguai">Uruguai</label><br>
                    <input type="radio" id="chile" name="paisOrigem" value="Chile">
                    <label for="chile">Chile</label><br>
                    <input type="radio" id="peru" name="paisOrigem" value="Peru">
                    <label for="peru">Peru</label><br>
                </div>
                <div class="mb-3">
                    <label for="previsaoEstadia" class="form-label">Previsão de Estadia</label>
                    <select class="form-select" id="previsaoEstadia" name="previsaoEstadia">
                        <option value="3 dias">3 dias</option>
                        <option value="5 dias">5 dias</option>
                        <option value="1 semana">1 semana</option>
                        <option value="2 semanas">2 semanas</option>
                        <option value="3 semanas ou mais">3 semanas ou mais</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ciasAereas" class="form-label">Companhias Aéreas já Utilizadas</label><br>
                    <input type="checkbox" id="gol" name="ciasAereas[]" value="GOL">
                    <label for="gol">GOL</label><br>
                    <input type="checkbox" id="azul" name="ciasAereas[]" value="AZUL">
                    <label for="azul">AZUL</label><br>
                    <input type="checkbox" id="trip" name="ciasAereas[]" value="TRIP">
                    <label for="trip">TRIP</label><br>
                    <input type="checkbox" id="avianca" name="ciasAereas[]" value="AVIANCA">
                    <label for="avianca">AVIANCA</label><br>
                    <input type="checkbox" id="rissetti" name="ciasAereas[]" value="RISSETTI">
                    <label for="rissetti">RISSETTI</label><br>
                    <input type="checkbox" id="global" name="ciasAereas[]" value="GLOBAL">
                    <label for="global">GLOBAL</label><br>
                </div>
                <button type="submit" name="botaoEnviar" class="btn btn-primary">Enviar</button>
            </form>
        </div>

    </div>

</body>

</html>