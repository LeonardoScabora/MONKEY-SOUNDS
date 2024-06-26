<?php
if (!empty($_GET['id'])) {

    include_once('config.php'); //Incluindo a conexão com o banco

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id='$id'";
    
    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0){
        
        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
        }
    }else{
        header('Location: sistema.php');
    }
    
}else{
    header('Location: sistema.php');//Verificação para n entrar na apgina de editar sem clicar no botão
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="MCSS/style-login.css" rel="stylesheet">
</head>

<body>
    <div class="content">
        <h1>Editar Usuario</h1>
        <form action="salve-usuario.php" method="POST">
            <div>
                <input type="text" placeholder="Digite seu nome" name="nome" maxlength="55" class="inputs required" value="<?php echo $nome ?>">
                <span class="span-required">Digite um nome válido</span>
            </div>
            <div>
                <input type="text" placeholder="Digite seu e-mail" name="email" class="inputs required" value="<?php echo $email ?>" oninput="emailValidate()" >
                <span class="span-required">Digite um E-mail válido</span>
            </div>
            <div>
                <input type="text" placeholder="Digite uma senha" name="senha" maxlength="12" class="inputs required" value="<?php echo $senha ?>" oninput="senhaValidate()">
                <span class="span-required">Digite uma senha com no minimo 6 caracteres</span>
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="update" id="update">
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

    function emailValidate() {
        if (!emailRegex.test(campos[1].value)) {
            setError(1);
            console.log(' N VALIDADO');
        } else {
            RemoveError(1);
            console.log('Validado');
        }
    }

    function senhaValidate() {
        if (campos[2].value.length < 6) {
            setError(2);
        } else {
            RemoveError(2);
        }
    }
</script>

</html>