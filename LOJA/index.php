<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="MCSS/style.css" rel="stylesheet">
</head>

<body>
  <div class="content">
  <div class="container">
    <h1>MONKEY SOUNDS</h1>
    <img src="MCSS/imagens/logo.png" alt="" class="logo">
    </div>
    <h1>Login</h1>
    <form id="form" method="POST">
      <div>
        <input type="text" placeholder="Digite seu e-mail" name="email" class="inputs required" oninput="emailValidate()">
        <span class="span-required">Digite um E-mail válido</span>
      </div>
      <div>
        <input type="password" placeholder="Digite uma senha" name="senha" maxlength="12" class="inputs required" oninput="senhaValidate()">
        <span class="span-required">Digite uma senha com no minimo 6 caracteres</span>
      </div>
      <button type="submit">Entrar</button>
        <a class="botaolink" href="cadastro.php" valeu="Cadastrar">Cadastrar</a>
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