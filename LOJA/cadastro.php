<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link href="MCSS/style.css" rel="stylesheet">
</head>

<body>
  <div class="content">
    <h1>Cadastro <img src="MCSS/imagens/logo.png" class="logo"></h1>
    <form id="form" method="POST">
    <div>
        <input type="text" placholder="Digite seu nome" name="nome" class="inputs required" oninput="nomeValidate()">
        <span class="span-required">Digite um nome válido</span>
    </div>  
    <div>
        <input type="text" placeholder="Digite seu e-mail" name="email" class="inputs required" oninput="emailValidate()">
        <span class="span-required">Digite um E-mail válido</span>
      </div>
      <div>
        <input type="password" placeholder="Digite uma senha" name="senha" class="inputs required" oninput="senhaValidate()">
        <span class="span-required">Digite uma senha com no minimo 6 caracteres</span>
      </div>
        <a class="botaolink" href="index.php" valeu="Cadastrar">Cadastrar</a>
    </form>
  </div>
</body>

<script>
  const form = document.getElementById('form');
  const campos = document.querySelectorAll('.required'); //o ponto no queryselector é pra endicar uma classe
  const spans = document.querySelectorAll('.span-required');
  const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; //Para validar o email 
  const nomeRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; //Para validar o nome 

  function setError(index) { //para deixar o campo vermelho quando na estiver validado
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
  }

  function RemoveError(index) { //para remover o erro quando validado
    campos[index].style.border = '';
    spans[index].style.display = 'none';
  }

  function nomeValidate() {
    if(nomeRegex.test(campos[0].value)){
        setError(0);
      console.log('N VALIDADO');
    }else{
      RemoveError(0);
      console.log('Validado');
    }
  }

  function emailValidate(){
    if(!emailRegex.test(campos[1].value)){
      setError(1);
      console.log(' N VALIDADO');
    }else{
      RemoveError(1);
      console.log('Validado');
    }
  }

  function senhaValidate(){
    if(campos[2].value.length < 6) {
      setError(2);
    }else{
      RemoveError(2);
    }
  }

</script>
</html>