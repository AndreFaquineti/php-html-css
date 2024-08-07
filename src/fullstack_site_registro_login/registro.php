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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="whitemode_sis_usuarios.css">
    </head>
    <style>
        div {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body {
            background-image: url(imagens/teste-entrar.svg);
            background-size: 100vw 100vh;
        }
    </style>
    <body>
        <h2><a href="index.php">Voltar</a></h2>
        <div class="card1">
            <img src="imagens/icone-login.svg" alt="Icone de dashboard" style="width: 50%; justify-self: center;">
            <h2>Registro</h2>
            <form action="" method="post">
            Email:<br>
            <input type="email" name="post_email" required><br><br>
            Senha:<br>
            <input type="password" name="post_senha" required><br><br>
            <input class="input1" type="submit">
        </form>
        </div>
        <?php
        if (isset($_POST['post_email']) && isset($_POST['post_senha'])) {
            if ($usuario_existente == 'sim') {
                echo 'Esse email já está em uso. <h3><a href="entrar.php">Entrar</a></h3>';
            }
        }
        ?>
    </body>
</html>