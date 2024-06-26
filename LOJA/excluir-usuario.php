<?php

include_once('config.php'); //Incluindo a conexão com o banco

$id = $_GET['id'];

$sqlSelect = "SELECT * FROM usuarios WHERE id='$id'";

$result = $conexao->query($sqlSelect);

if ($result->num_rows > 0) {
    $sqlDelete = "DELETE FROM usuarios WHERE id='$id'";
    $resultDelete = $conexao->query($sqlDelete);
}

header('Location: lista-usuario.php');