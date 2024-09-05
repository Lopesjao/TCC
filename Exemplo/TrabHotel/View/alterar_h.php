<?php 
include_once "conexao.php";
echo '<h2>Escolha um hóspede: <h2>';
//if(isset($_POST['listar']) && $_POS['listar'] == "true"){
    listarHospedesNoCombo();
    echo '<br><form name="voltar" method="post" action="index.php">
    <input type="submit" name="botao" value="Voltar"></form>';
//}


if(isset($_POST['combo'])){
    $op = $_POST['combo'];
    if($op != "0"){
        alterarCpf($op);
    }
    echo '<br><form name="voltar" method="post" action="index.php">
    <input type="submit" name="botao" value="Voltar"></form>';

}else{
    if (isset($_POST['alterar'])) {
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
        $sexo = $_POST['sexo'];
        $datanasc = $_POST['datanasc'];

        alterar($cpf, $nome, $sobrenome, $sexo, $datanasc);

        echo '<br><form name="voltar" method="post" action="index.php">
        <input type="submit" name="botao" value="Voltar"></form>';

    }else{
        if (isset($_POST['excluir'])) {
            $cpf = $_POST['cpf'];
            excluir($cpf);
            echo '<br><form name="voltar" method="post" action="index.php">
            <input type="submit" name="botao" value="Voltar"></form>';
        }
    }
}

function listarHospedesNoCombo(){
    echo '<form name="menu" method="post" action="alterar_h.php">
    <select name="combo">
    <option value="0" selected>(selecione um cpf:)</option>';

    $conexao = conectar("bdhotel","root","");
    $sql = "SELECT cpf FROM hospede ORDER BY cpf";
    $pstmt = $conexao->prepare($sql);
    $pstmt->execute();
    while($linha=$pstmt->fetch()){
        echo '<option value="'.$linha["cpf"].'">'.$linha["cpf"].'</option>';
    }
    $conexao = encerrar();
    echo '</select> <input type="submit" value="Consultar"></form>';
    
}

function alterarCpf($cpf){
    $conexao = conectar("bdhotel","root","");
    $sql = "SELECT * FROM hospede WHERE cpf = :cpf";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->execute();

    echo "<h2>Registro encontrado com sucesso: </h2>";

    echo '<form name="altera" method="post" action="alterar_h.php">';
    while($linha = $pstmt->fetch()){
        echo 'Nome: <input type="text" name="nome" value="'.$linha["nome"].'"><br><br>';
        echo 'Sobrenome: <input type="text" name="sobrenome" value="'.$linha["sobrenome"].'"><br><br>';
		echo ' CPF: <input type="text" name="cpf" value="'.$linha["cpf"].'" readonly="readonly"><br><br>';
        echo 'Sexo: <input type="radio" name="sexo" value="M"'; 
		echo ($linha["sexo"] == "M") ? ' checked' : ''; 
		echo '>Masculino <br>';
		echo '<input type="radio" name="sexo" value="F"'; 
		echo ($linha["sexo"] == "F") ? ' checked' : ''; 
		echo '>Feminino <br><br>';
		echo 'Data de Nascimento: <input type="date" name="datanasc" value="'.$linha["dataNascimento"].'"><br><br>';
    }
    echo '<input type="submit" name="alterar" value="Alterar"> ';
    echo '<input type="submit" name="excluir" value="Excluir"></form>';
    $conexao = encerrar();
}

function alterar($cpf, $nome, $sobrenome, $sexo, $datanasc){
    $conexao = conectar("bdhotel","root","");
    $sql = "UPDATE hospede SET nome = :nome, sobrenome = :sobrenome, sexo = :sexo, dataNascimento = :dataNascimento WHERE cpf = :cpf";
    $pstmt = $conexao->prepare($sql);
   	 $pstmt->bindValue(":cpf", $cpf);
    $pstmt->bindValue(":nome", $nome);
    $pstmt->bindValue(":sobrenome", $sobrenome);
	$pstmt->bindValue(":sexo", $sexo);
    $pstmt->bindValue(":dataNascimento", $datanasc);
    $pstmt->execute();

    echo "<h2>Registro alterado com sucesso. </h2>";

    $conexao = encerrar();
}

function excluir($cpf){
    $conexao = conectar("bdhotel","root","");
    $sql = "DELETE FROM hospede WHERE cpf = :cpf";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->execute();
    echo "<h2>Registro excluido com sucesso. </h2>";
    $conexao = encerrar();
}


?>

