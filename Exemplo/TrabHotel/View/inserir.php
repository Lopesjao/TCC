<?php
include_once 'conexao.php';

if(isset($_POST["botaoEnviar"])){
    if(!empty($_POST["cpf"]) && !empty($_POST["nome"]) && !empty($_POST["sobrenome"]) && !empty($_POST["sexo"]) && !empty($_POST["dataNascimento"]) && !empty($_POST["paisOrigem"]) && !empty($_POST["previsaoEstadia"]) && !empty($_POST["ciasAereas"])){
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="./css/style.css" rel="stylesheet">
            <title>Sua Página</title>
        </head>
        <body>
            <!-- Conteúdo da sua página aqui -->
        </body>
        </html>';
    
        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $sexo = $_POST["sexo"];
        $dataNascimento = $_POST["dataNascimento"];
        $paisOrigem = $_POST["paisOrigem"];
        $previsaoEstadia = $_POST["previsaoEstadia"];
        $ciasAereas = implode(", ", $_POST["ciasAereas"]);
    
        inserirHospede($cpf, $nome, $sobrenome, $sexo, $dataNascimento);
        inserirControle($cpf, $paisOrigem, $previsaoEstadia, $ciasAereas);
    
        echo "<h2>Cadastro realizado com sucesso: </h2>";
        // Chama o método para consultar e verificar.
        consultarHospede($cpf);
    
        // Botão para voltar ao index.php
        echo '<br><form name="voltar" method="post" action="index.php">
              <input type="submit" name="botao" value="Voltar"></form>';
    }else{
        header('Location: index.php');
    }
}

function inserirHospede($cpf, $nome, $sobrenome, $sexo, $dataNascimento){
    $conexao = conectar("bdhotel", "root", "");
    $sql = "INSERT INTO hospede (cpf, nome, sobrenome, sexo, dataNascimento) VALUES (:cpf, :nome, :sobrenome, :sexo, :dataNascimento)";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->bindValue(":nome", $nome);
    $pstmt->bindValue(":sobrenome", $sobrenome);
    $pstmt->bindValue(":sexo", $sexo);
    $pstmt->bindValue(":dataNascimento", $dataNascimento);
    $pstmt->execute(); 
    $conexao = encerrar();
}

function inserirControle($cpf, $paisOrigem, $previsaoEstadia, $ciasAereas){
    $conexao = conectar("bdhotel", "root", "");
    $sql = "INSERT INTO controle (hospedeCpf, paisOrigem, previsaoEstadia, ciasAereas) VALUES (:cpf, :paisOrigem, :previsaoEstadia, :ciasAereas)";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->bindValue(":paisOrigem", $paisOrigem);
    $pstmt->bindValue(":previsaoEstadia", $previsaoEstadia);
    $pstmt->bindValue(":ciasAereas", $ciasAereas);
    $pstmt->execute(); 
    $conexao = encerrar();
}

function consultarHospede($cpf){
    $conexao = conectar("bdhotel", "root", "");
    $sql = "SELECT * FROM hospede WHERE cpf = :cpf";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->execute();
    
    echo "<center><table border=1><tr><th>CPF</th><th>Nome</th><th>Sobrenome</th><th>Sexo</th><th>Data de Nascimento</th></tr>";
    while($linha = $pstmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $linha["cpf"] . "</td>";
        echo "<td>" . $linha["nome"] . "</td>";
        echo "<td>" . $linha["sobrenome"] . "</td>";
        echo "<td>" . $linha["sexo"] . "</td>";
        echo "<td>" . $linha["dataNascimento"] . "</td>";
        echo "</tr>";
    }
    echo "</table></center><br>";
    
    $conexao = encerrar();
}

?>
