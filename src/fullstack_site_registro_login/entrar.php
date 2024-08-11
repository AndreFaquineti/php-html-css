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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        if (!isset($_SESSION['global_usuario_Tema'])) {
            $_SESSION['global_usuario_Tema'] = 2;
        }
        if ($_SESSION['global_usuario_Tema'] == 1) {
            echo '<link rel="stylesheet" href="tema-claro.css">';
        }
        if ($_SESSION['global_usuario_Tema'] == 2) {
            echo '<link rel="stylesheet" href="tema-escuro.css">';
        }
    ?>
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
            <h2>Entrar</h2>
            <form action="" method="post">
                Email:<br>
                <input type="email" name="post_email"><br><br>
                Senha:<br>
                <input type="password" name="post_senha"><br><br>
                <input class="input1" type="submit">
            </form>
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