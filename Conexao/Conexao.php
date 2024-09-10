<?php
    function conectar($db, $usuario, $senha){
        return new PDO("mysql:host=localhost; dbname=$db", $usuario, $senha);
    }

    function encerrar(){
        return null;
    }
?>