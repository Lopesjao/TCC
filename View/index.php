<?
// índice.php

require_once('Config.php');

$oauth2_server_url = 'https://accounts.google.com/o/oauth2/auth';

$query_params = matriz(
           'response_type' => 'código',
           'client_id' => $oauth2_client_id,
           'redirect_uri' => $oauth2_redirect,
           'escopo' => 'https://www.googleapis.com/auth/glass.timeline'
           );

$forward_url = $oauth2_server_url . '?' . http_build_query($query_params);

cabeçalho('Localização: ' . $forward_url);

?>