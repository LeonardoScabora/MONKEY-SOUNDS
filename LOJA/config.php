<?php
    $DbHost = 'Localhost';
    $DbUsername = 'root';
    $DbPassword = '';
    $DbName = 'monkey';
    
    $conexao = new mysqli($DbHost, $DbUsername, $DbPassword, $DbName);

    /*if($conexao->connect_errno){
        echo "Erro no Banco de dados";
    }else{
        echo "Conexão com sucesso";
    }*/
?>