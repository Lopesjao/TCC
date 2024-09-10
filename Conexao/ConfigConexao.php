<?php

include_once 'Conexao.php';

$db = "bdinfoquest";      
$usuario = "root";   
$senha = " ";       

$conexao = conectar($db, $usuario, $senha);

if ($conexao) {
    echo "Conexão bem-sucedida com o banco de dados!";
} else {
    echo "Falha na conexão com o banco de dados.";
}
?>
