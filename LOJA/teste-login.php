<?php
    session_start();

    if(!empty($_POST['email']) && !empty($_POST['senha'])){
        //Acessa
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email= '$email' and senha= '$senha'"; //verificar se possiu no banco de dados
        
        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1){
            //deu errado
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        }else{
            //deu Certo
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    }else{
        //NÃO acessa
        header('Location: index.php'); //previne entrar no site sem login
    }
    
   
?>