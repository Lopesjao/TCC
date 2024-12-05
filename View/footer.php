<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-footer {
            width: 100%;
            color: white;
            background-color: #2D55AD;
            height: 80% !important;
            padding: 20px 0;
        }

        .custom-footer a {
            color: white;
            text-decoration: none;
        }

        .custom-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Footer -->
    <footer class="custom-footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>Sobre Nós</h5>
                    <p>Objeto de Aprendizagem para auxilio da Disciplina de Arquitetura de Organização de Computadores
                    </p>
                </div>
                <div class="col-md-4">
                    <h5>Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="Home.php">Home</a></li>
                        <li><a href="manutencao.php">Manutenção</a></li>
                        <li><a href="pecas.php">Peças</a></li>
                        <li><a href="quiz.php">Quiz</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contato</h5>
                    <p>Email: Lopesjao2503@gmail.com</p>

                </div>
            </div>
            <hr class="my-3" style="border-color: rgba(255, 255, 255, 0.3);">
            <p>&copy; <?php echo date("Y"); ?> João Manoel C. Lopes. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>