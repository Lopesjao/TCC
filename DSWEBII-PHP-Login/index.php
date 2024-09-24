<?php
session_start();
if(isset($_SESSION['sessaoID'])){
	header('location:home.php');
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
    <form method="POST" action="Controller/LoginController.php?function=login"> 
    <div id="login">
   		<h1>Login</h1>
   		<div>  
        <input type="text" class="textbox" name="email" placeholder="Nome de Usuário" required/>
   		</div>
   		<div>
        <input type="password" class="textbox" name="senha" placeholder="Senha" required />
   		</div>
   		<div>
        <input type="submit" name="login_button" value="Entrar" />
   		</div>
   		<div id="erro">
        <?php 
        if(isset($_GET["erro"])){
        	echo "Usuário ou Senha Inválidos.";
        }
        ?>
   		</div>
    </div>
    </form>
	</div>
</body>
</html>


