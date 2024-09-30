<?php
// Inclui as bibliotecas do Google API
require_once 'vendor/autoload.php';

// Inicializa o cliente do Google
$client = new Google_Client();
$client->setClientId('86253102357-79vcqcejk9ud6qp684lagut2917pcjbq.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/TCC/View/oauth2callback.php'); // O mesmo URI configurado no Google Console
$client->addScope("email");
$client->addScope("profile");

// Verifica se o código de autenticação foi enviado
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Obtém informações do perfil do usuário
    $oauth = new Google_Service_Oauth2($client);
    $perfil = $oauth->userinfo->get();

    // Exibe ou salva as informações do perfil do usuário
    echo "Nome: " . $perfil->name . "<br>";
    echo "Email: " . $perfil->email . "<br>";
    echo "Foto de Perfil: <img src='" . $perfil->picture . "'><br>";
    
    // Você pode redirecionar o usuário para outra página ou salvar as informações no banco de dados
} else {
    // Redireciona o usuário para o login do Google
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}
