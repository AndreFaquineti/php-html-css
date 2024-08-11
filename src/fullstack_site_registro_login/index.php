<?php
    session_start();
    require("sistema/conexao.php");

    # Definindo variaveis
    $usuario_id = '';
    $usuario_email = '';
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
        if (!isset($usuario_tema)) {
            $usuario_tema = $_SESSION['global_usuario_Tema'];
        }
        $usuario_nome = $_SESSION['global_usuario_Nome'];
        $usuario_sobrenome = $_SESSION['global_usuario_Sobrenome'];
        $usuario_apelido = $_SESSION['global_usuario_Apelido'];
    }

    if (!isset($_SESSION['global_usuario_Tema'])) {
        $_SESSION['global_usuario_Tema'] = 1;
    }
    function trocarTema() {

    if ($_SESSION['global_usuario_Tema'] == 1) {
        $_SESSION['global_usuario_Tema'] = 2;
    } else {
        $_SESSION['global_usuario_Tema'] = 1;
    }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['trocarTema'])) {
        trocarTema();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Sistema de registro e login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        if (!isset($_SESSION['global_usuario_Tema'])) {
            $_SESSION['global_usuario_Tema'] = 1;
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
        html {
        font-family: sans-serif;
        max-height: 100vh;
        }
        body {
            margin: 0;
            height: 100vh;
        }
    </style>
    <body>
        <div class="conteudo">
            <div class="coluna1">
                <p><h2><a href="../">Pagina Inicial</a></h2></p>
                <p><b>Sobre: </b>Sistema capaz de receber, armazenar e utilizar informações. Esse projeto busca explorar as linguagens de frontend HTML, CSS e melhorar meu entendimento de lógica de programação e backend para sites usando PHP e MySQL.</p>
            </div>
            <div class="coluna2">
                <div class="cima">
                    <h2>Sistema de cadastro e armazenamento de informações</h2>
                    <?php
                        if ($usuario_id == '') {
                            echo '<p><a href="registro.php"><h3 style="display: inline;">Cadastre-se</h3></a> ou <a href="entrar.php"><h3 style="display: inline;">Entre</h3></a> para desfrutar de todas as funcionalidades</p>';
                        }
                        if ($usuario_id != '') {
                            echo '<p><h2><a href="sair.php">Sair</a></h2></p>';
                        }
                    ?>
                </div>
                <div class="baixo">
                    <h2>Informações pessoais</h2>
                    <p>Usuario: <?php echo $usuario_apelido; ?> Id: <?php echo $usuario_id; ?></p>
                    <p>Email: <?php echo $usuario_email; ?></p>
                    <P>Nome: <?php echo $usuario_nome; ?></P>
                    <P>Sobrenome: <?php echo $usuario_sobrenome; ?></P>
                    <?php
                        if ($usuario_id != '') {
                            echo '<h2><a href="minha_pagina.php">Conte-me mais sobre você.</a></h2>';
                        }
                    ?>
                </div>
            </div>
            <div class="coluna3">
                
                <form method="post">
                    <input class="input-tema" type="submit" value="" name="trocarTema">
                </form>
                <h2>Preferencias do usuario</h2>
                <P>Tema</P>
            </div>
        </div>
    </body>
</html>