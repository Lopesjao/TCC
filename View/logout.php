<?php
session_start();
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destrói a sessão ativa
header('Location: login.php'); // Redireciona para a página de login
exit();
