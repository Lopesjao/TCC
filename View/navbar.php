<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <a class="navbar-brand" href="Home.php" ; ">
                <img src="imagens/logo.png" alt=" Logo" width="80" height="80" class="d-inline-block align-text-top">
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="manutencao.php">Manutenção</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pecas.php">Peças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quiz.php">Quiz</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary" href="login.php" role="button">Login</a>
                    </li>
                    <li class="nav-item">
                    <h1>Bem-vindo, <?php //echo htmlspecialchars($_SESSION['usuario_sessao']); ?>!</h1> <!-- Exibe o usuário logado -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>