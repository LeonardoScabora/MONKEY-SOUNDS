<?php
session_start();
include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
}

$logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monkey Sounds </title>
    <link href="MCSS/style-site.css" rel="stylesheet">
</head>

<body>

    <?php
    echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    <a class="botaolink" href="logout.php">Sair</a>
    <a class="botaolink" href="lista-usuario.php">lista de user</a>
    
</body>

</html>