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
    <link rel="stylesheet" href="whitemode_sis_usuarios.css">
    </head>
    <style>
        div {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 75vh;
        }
        body {
            background-image: url(imagens/glass-building.jpg);
            background-size: 100vw 100vh;
        }
    </style>
    <body>
        <h2><a href="index.php">Voltar</a></h2>
        <div>
        <card>
            <img src="imagens/login_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="Login Icon" style="width:50%;">
            <h3>Entrar</h3>
            <form action="" method="post">
                Email:<br>
                <input type="email" name="post_email"><br><br>
                Senha:<br>
                <input type="password" name="post_senha"><br><br>
                <input type="submit">
            </form>
        </card>
        </div>
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