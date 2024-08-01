<?php
    session_start();
    require 'sistema/conexao.php';
    require 'sistema/sis_registro.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../darkmode_geral.css">
    </head>
    <body>
        <h2><a href="index.php">Voltar</a></h2>
        <form action="" method="post">
            Email:<br>
            <input type="email" name="post_email"><br><br>
            Senha:<br>
            <input type="password" name="post_senha"><br><br>
            <input type="submit">
        </form>
    </body>
</html>