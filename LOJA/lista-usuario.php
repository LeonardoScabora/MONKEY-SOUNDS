<?php
session_start();
include_once('config.php');

$logado = $_SESSION['email'];

$sql = "SELECT * FROM usuarios ORDER BY id DESC";

$result = $conexao->query($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="MCSS/style-site.css" rel="stylesheet">
</head>
<body>
<div>
<a class="botaolink" href="sistema.php">Voltar</a>
</div>
<div>
<table class="table">
  <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">email</th>
        <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
        <?php
            while($user_data = mysqli_fetch_assoc($result)){
               echo "<tr>";
               echo "<td>".$user_data['nome']."</td>";
               echo "<td>".$user_data['email']."</td>";
               echo "<td> 
                <a class='btn btn-primary' href='editar-usuario.php?id=$user_data[id]'>Editar</a>
                <a class='btn btn-danger' if()href='excluir-usuario.php?id=$user_data[id]'>Excluir</a>
               </td>";
               echo "<tr>";
            }
        ?>
  </tbody>
</table>
</div>
</body>
</html>