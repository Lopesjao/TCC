<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>
<?php
    include_once ('conexao.php');
   
    function consulta(){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede h, controle c WHERE h.cpf = c.hospedeCpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();

        echo "<h2>Listagem completa:</h2>";
        echo '<table border="1"><tr><th>Cpf</th><th>Nome</th><th>Sobrenome</th><th>Sexo</th><th>Data de Nascimento</th>
                <th>PaisOrigem</th><th>previsaoEstadia</th><th>CiasAereas</th></tr>';
        while($linha = $pstmt->fetch()){
            echo "<tr>";
            echo "<td>" . $linha["cpf"] . "</td>";
            echo "<td>" . $linha["nome"] . "</td>";
            echo "<td>" . $linha["sobrenome"] . "</td>";
            echo "<td>" . $linha["sexo"] . "</td>";
            echo "<td>" . $linha["dataNascimento"] . "</td>";
            echo "<td>" . $linha["paisOrigem"] . "</td>";
            echo "<td>" . $linha["previsaoEstadia"] . "</td>";
            echo "<td>" . $linha["ciasAereas"] . "</td>";
              
              
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }

    function comboCpf(){
        echo '
        <form name="menu" method="post" action="tela_listar.php">
            <select name="comboH">
                <option value="0" selected>(selecione um cpf:)</option>';

        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT cpf FROM hospede ORDER BY cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["cpf"].'">'.$linha["cpf"].'</option>';
        }
        $conexao = encerrar();
        echo 
            '</select> 
            <input type="submit" value="consulta">
        </form>';
    }

    function consultarCPF($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede h, controle c WHERE h.cpf = c.hospedeCpf AND h.cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        echo "<h2>Registro encontrado com sucesso: </h2>";

        echo '<table border="1"><tr><th>Nome</th><th>Sobrenome</th><th>CPF</th><th>Sexo</th><th>Data de Nascimento</th></tr>';
        while($linha = $pstmt->fetch()){
            echo "<tr>";
            echo "<td>" . $linha["nome"] . "</td>";
            echo "<td>" . $linha["sobrenome"] . "</td>";
            echo "<td>" . $linha["cpf"] . "</td>";
            echo "<td>" . $linha["sexo"] . "</td>";
            echo "<td>" . $linha["dataNascimento"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }





?>