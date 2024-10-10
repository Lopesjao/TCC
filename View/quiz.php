<?php
if (!isset($_SESSION)){
session_start();
}
//if (!isset($_SESSION['usuario_sessao'])) {
//  header('Location:login.php');
//exit();
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php require_once "navbar.php"; ?>
    <h1> quiz </h1>
    <h1>questao 1</h1>
</body>
</html>