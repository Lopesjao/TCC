<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
            </a>

            <!-- Botão que colapsa em telas menores -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Itens da Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Links de navegação -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manutenção</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Peças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quiz</a>
                    </li>
                    <!-- Botão de Login -->
                    <li class="nav-item">
                        <a class="btn btn-primary" href="#" role="button">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Link do Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
