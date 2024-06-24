<?php
include('config.php');

//verificação para ver se existe esses campos 
if (isset($_POST['email']) || isset($_POST['senha'])) {
  //Para verficar se foi preenchido vaziu
  if(strlen($_POST['email']) == 0 && strlen($_POST['senha']) == 0){ 
    print "<script>alert('Alguem esqueceu de colocar seus dados!')</script>";
  }else if (strlen($_POST['email']) == 0) { //verifica a quantidade de caracteres
    print "<script>alert('Ops.. faltou seu email!')</script>";
  } else if (strlen($_POST['senha']) == 0) {
    print "<script>alert('Ops.. faltou sua senha!')</script>";
  } else {
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email= '$email' AND senha = '$senha' ";
    $sql_query = $conn->query($sql_code) or die("Falha na execução do codigo SQL: " . $conn->error);

    $quantidade = $sql_query->num_rows;
    if ($quantidade == 1) {
      $USER = $sql_query->fetch_assoc();
      if (!isset($_SESSION)) {
        session_start(); //UMA variavel que mesmo trocando  de pagina continua valida até morrer.
      }

      $_SESSION['id'] = $USER['id'];
      $_SESSION['nome'] = $USER['nome'];

      header("location: equipamentos.php");
    } else {
      print "<script>alert('Falha ao logar! E-mail ou senha não cadastrados')</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="CSSP/style.css" rel="stylesheet">
</head>

<body>
  <div class="content">
    <h1>Login <img src="CSSP/imagens/logo.png" class="logo"></h1>
    <form id="form" method="POST">
      <div>
        <input type="text" placeholder="Digite seu email" name="email" class="inputs required" oninput="emailValidate()">
        <span class="span-required">Digite um E-mail válido</span>
      </div>
      <div>
        <input type="password" placeholder="Digite uma senha" name="senha" class="inputs required" oninput="senhaValidate()">
        <span class="span-required">Digite uma senha com no minimo 6 caracteres</span>
      </div>
      <button type="submit">Entrar</button>
        <a class="botaolink" href="novo-usuario.php" valeu="Cadastrar">Cadastrar</a>
      

    </form>
  </div>
</body>


<script>
  const form = document.getElementById('form');
  const campos = document.querySelectorAll('.required'); //o ponto no queryselector é pra endicar uma classe
  const spans = document.querySelectorAll('.span-required');
  const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; //Para validar o email 

  function setError(index) { //para deixar o campo vermelho quando na estiver validado
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
  }

  function RemoveError(index) { //para remover o erro quando validado
    campos[index].style.border = '';
    spans[index].style.display = 'none';
  }

  function emailValidate(){
    if(!emailRegex.test(campos[0].value)){
      setError(0);
      console.log(' N VALIDADO');
    }else{
      RemoveError(0);
      console.log('Validado');
    }
  }

  function senhaValidate(){
    if(campos[1].value.length < 6) {
      setError(1);
    }else{
      RemoveError(1);
    }
  }

</script>
</html>