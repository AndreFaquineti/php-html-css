<?php
    session_start();
    require("sistema/conexao.php");

    # Definindo variaveis
    $usuario_id = '';
    $usuario_email = '';
    $usuario_tema = '';
    $usuario_nome = '';
    $usuario_sobrenome = '';
    $usuario_apelido = '';

    $stmt = $conn->prepare('SELECT * FROM tabela_usuarios WHERE Id = :global_usuario_Id');
    $stmt->bindParam(':global_usuario_Id', $_SESSION['global_usuario_Id']);
    $stmt->execute();
    $usuario_info = $stmt->fetch();
    if (isset($usuario_info['Email'])) {
        $_SESSION['global_usuario_Email'] = $usuario_info['Email'];
        $_SESSION['global_usuario_Tema'] = $usuario_info['Tema'];
        $_SESSION['global_usuario_Nome'] = $usuario_info['Nome'];
        $_SESSION['global_usuario_Sobrenome'] = $usuario_info['Sobrenome'];
        $_SESSION['global_usuario_Apelido'] = $usuario_info['Apelido'];

        # Mais variaveis pra parar de ter problema
        $usuario_id = $_SESSION['global_usuario_Id'];
        $usuario_email = $_SESSION['global_usuario_Email'];
        $usuario_tema = $_SESSION['global_usuario_Tema'];
        $usuario_nome = $_SESSION['global_usuario_Nome'];
        $usuario_sobrenome = $_SESSION['global_usuario_Sobrenome'];
        $usuario_apelido = $_SESSION['global_usuario_Apelido'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de registro e login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="darkmode_sis_usuarios.css">
    </head>
    <style>
        html {
        font-family: sans-serif;
        max-height: 100vh;
        }
        body {
            margin: 0;
            background-color: rgb(0, 83, 160);
            background-image: url("imagens/windshield.jpg");
            height: 100vh;
        }
    </style>
    <body>
        <section>
            <article style="width: 20vw;">
            <h2>Preferencias do usuario</h2>
            <P>Tema</P>
            <h2>Informações pessoais</h2>
            <p>
                Nome de usuario: <?php echo $usuario_apelido; ?>
            </p>
            <p>
                Id: <?php echo $usuario_id; ?>
            </p>
            <p>
                Email: <?php echo $usuario_email; ?>
            </p>
            <P>
                Nome: <?php echo $usuario_nome; ?>
            </P>
            <P>
                Sobrenome: <?php echo $usuario_sobrenome; ?>
            </P>
            <h2><a href="minha_pagina.php">Conte-me mais sobre você.</a></h2>
            </article>
            <article style="width: 60vw;">
                <h2>Sistema de cadastro e armazenamento de informações</h2>
                <p>Cadastre-se ou entre para desfrutar de todas as funcionalidades</p>
                <p><a href="registro.php">Cadastre-se</a></p>
                <p>Ou</p>
                <p><a href="entrar.php">Entre</a></p>
            </article>
            <article style="width: 20vw;">
                <p><h2><a href="../">Pagina Inicial</a></h2></p>
                <p><h2><a href="sair.php">Sair da sua conta.</a></h2></p>
                <h2>Sobre</h2>
                <p>Sistema capaz de receber, armazenar e utilizar informações. Esse projeto busca explorar as linguagens de frontend HTML, CSS e melhorar meu entendimento de lógica de programação e backend para sites usando PHP e MySQL.</p>
            </article>
        </section>
    </body>
</html>