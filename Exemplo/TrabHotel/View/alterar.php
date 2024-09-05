<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="alterar_h.php" method="post">
        <h1>Alterar Hóspede</h1>
        Nome: <input type="text" name="nome" required>
        <br><br>
        Sobronome: <input type="text" name="sobrenome" required>
        <br><br>
        CPF: <input type="text" name="cpf" required>
        <br><br>
        Sexo:  
        <br>
       <input type="radio" name="sexo" value="M">Masculino
       <br>
       <input type="radio" name="sexo" value="F">Feminino
        <br><br>
       
        Data de nascimento: <input type="date" name="datanasc" required>
        <br><br>
        <input type="submit" name="botao" value="Modificar">
    </form>
	

    
</body>
</html>
<?php

?>