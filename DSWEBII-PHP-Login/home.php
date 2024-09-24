<?php
session_start();
if(!isset($_SESSION['sessaoID'])){
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sistema de Login Único</title>
<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="container">
    <h1>Sistema de Login Único</h1>           
    <h2>Bem-Vindo Usuário</h2>    
    <p><a href="Controller/LoginController.php?function=logout">Logout</a></p>
            <?php 
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
            ?>
        </div>
    </body>    	
	<script src="js/main.js"></script>     
</html>

