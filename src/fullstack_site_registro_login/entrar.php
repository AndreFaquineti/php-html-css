<?php
    session_start();
    require 'sistema/conexao.php';
    require 'sistema/sis_entrar.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Entrar</title>
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
        <?php
        if (isset($_POST['post_email']) && isset($_POST['post_senha'])) {
            if ($usuario_existente == 'nao'){
                echo 'Email não encontrado. <h3><a href="registro.php">Registre-se.</a></h3><br>';
            }
            if ($senha_correta == 'nao' && $usuario_existente == 'sim'){
                echo 'Verifique sua senha.';
            }
        }
        ?>
    </body>
</html>