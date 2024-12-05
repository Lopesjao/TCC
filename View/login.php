<?php


if (!isset($_SESSION)) {
    session_start();
    // var_dump($_SESSION);
//    echo "entrou ";
   
}



include_once __DIR__ . '/../Model/Aluno.php';
include_once __DIR__ . '/../Model/Professor.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    include_once __DIR__ . '/../Control/AlunoControle.php';
    include_once __DIR__ . '/../Control/ProfessorControle.php';
    $alunoController = new AlunoController();
    $resultado = $alunoController->selectAlunoVerificaLogin($email, $senha);
    $profController = new ProfessorController();
    $resultado2 = $profController->selectProfessorVerificaLogin($email, $senha);

    //echo "<h1>RESULTADO: </h1>";
    //var_dump($resultado);

    if ($resultado) {
        session_regenerate_id();
        $aluno = new Aluno(unserialize($_SESSION["aluno"]));
        //var_dump($aluno);
        $_SESSION['usuario_sessao'] = $aluno->getEmail();
        $_SESSION['tipo'] = "aluno";

        header('Location: Home.php');
        exit();
    } elseif ($resultado2) {
        session_regenerate_id();
        $prof = new Professor(unserialize($_SESSION["professor"]));
        //var_dump($aluno);
      //  $_SESSION['prof'] = serialize($prof); //objeto prof
        $_SESSION['usuario_sessao'] = $prof->getEmail();
        $_SESSION['tipo'] = "prof";
       // echo $prof;

       header('Location: Home.php');
        exit();
    } else {
        echo "Erro ao realizar login!";
    }



}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <?php require_once "navbar.php"; ?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Login</h2>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-control" required>
                </div>

                <button type="submit" name="Logar" class="btn btn-primary w-100">Entrar</button>
            </form>

            <hr class="my-4">

            <div class="text-center">
                <h5 class="mb-3">Ou faça login com:</h5>
                <a href="oauth2callback.php" class="g-signin2" data-theme="dark" data-width="370" data-height="50">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                            <path
                                d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                        </svg>
                    </span>
                    Login com Google
                </a>
            </div>
           
                <!-- Logo no centro -->


                <!-- Botões de Login/Cadastro -->
                <p>Sou Aluno:</p>
                <a class="btn btn-primary btn-lg btn-space" href="CadastroAluno.php" role="button">Cadastro</a>

                <p class="btn-space">Sou Professor:</p>
                <a class="btn btn-secondary btn-lg btn-space" href="CadastroProfessor.php" role="button">Cadastro</a>
            </div>



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <footer> <?php require_once "footer.php"; ?></footer>
</body>

</html>

<?php

?>







<!--<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com Google</title>
    <meta name="google-signin-client_id" content="86253102357-79vcqcejk9ud6qp684lagut2917pcjbq.apps.googleusercontent.com">  Substitua pelo seu Client ID 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <style>
        body { font-family: Arial, sans-serif; }
        #user-info { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Login com Google</h1>
    <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline" data-text="sign_in_with" data-size="large" data-logo_alignment="left"></div>
    <div id="user-info"></div>

    <script>
        function onSignIn(googleUser) {
            const profile = googleUser.getBasicProfile();
            document.getElementById('user-info').innerHTML = `
                <p>Nome: ${profile.getName()}</p>
                <p>Email: ${profile.getEmail()}</p>
                <img src="${profile.getImageUrl()}" alt="Imagem de perfil">
            `;
        }

        function signOut() {
            const auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(() => {
                document.getElementById('user-info').innerHTML = '<p>Usuário desconectado.</p>';
            });
        }
    </script>
</body>
</html>
-->