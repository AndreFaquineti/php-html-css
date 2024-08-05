<?php
    session_start();
    require 'sistema/conexao.php';
    require 'sistema/sis_minha_pagina.php';
    if (!isset($_SESSION['global_usuario_Id'])) {
        header('location: entrar.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Minha Página</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="darkmode_sis_usuarios.css">
    </head>
    <body>
        <h2><a href="index.php">Voltar</a></h2>
        <form action="" method="post">
            Atualizar apelido: <br>
            <input type="text" name="post_apelido"> <br><br>
            Atualizar nome: <br>
            <input type="text" name="post_nome"> <br><br>
            Atualizar sobrenome: <br>
            <input type="text" name="post_sobrenome"> <br><br>
            Atualizar senha: <br>
            <input type="password" name="post_senha"> <br><br>
            Atualizar email: <br>
            <input type="text" name="post_email"> <br><br>
            Insira sua senha atual: <br>
            <input type="password" name="post_verificar" required> <br><br>
            <input type="submit">
        </form>
        <?php
            if ($senha_correta == 'nao') {
                echo 'verifique sua senha.';
            }
            if ($dados_atualizados == 'sim') {
                echo 'Dados atualizados com sucesso!';
            }
        ?>
    </body>
</html>