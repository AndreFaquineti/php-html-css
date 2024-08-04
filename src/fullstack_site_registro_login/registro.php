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
            <input type="email" name="post_email" required><br><br>
            Senha:<br>
            <input type="password" name="post_senha" required><br><br>
            <input type="submit">
        </form>
        <?php
        if (isset($_POST['post_email']) && isset($_POST['post_senha'])) {
            if ($usuario_existente == 'sim') {
                echo 'Esse email já está em uso. <h3><a href="entrar.php">Entrar</a></h3>';
            }
        }
        ?>
    </body>
</html>