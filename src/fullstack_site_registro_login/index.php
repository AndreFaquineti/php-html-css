<?php
    /*
    session_start();
    require("conexao.php");
    */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de registro e login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../darkmode_geral.css">
    </head>
    <style>
        html {
        font-family: sans-serif;
        max-height: 100vh;
        }
        body {
            margin: 0;
            background-color: rgb(0, 83, 160);
            background-image: url("windshield-5366584_1280.jpg");
            height: 100vh;
        }
        section {
            justify-content: center;
            display: flex;
        }
        article {
            background-color: rgba(25, 29, 32, 0.9);
            padding: 1vw;
            margin: 1vw;
            height: 95vh;
        }
        article h2 {
            text-align: center;
        }
        article p {
            text-align: center;
        }
        
    </style>
    <body>
        <section>
            <article style="width: 20vw;">
                <h2>Informações pessoais</h2>
                <p>Nome de usuario</p>
                <p>Id</p>
                <p>Email</p>
                <h2>Preferencias do usuario</h2>
                <P>Tema</P>
            </article>
            <article style="width: 60vw;">
                <h2>Sistema de cadastro e armazenamento de informações</h2>
                <p>Cadastre-se ou entre para desfrutar de todas as funcionalidades</p>
                <p><a href="registro.php">Cadastre-se</a></p>
                <p>Ou</p>
                <p><a href="login.php">Entre</a></p>
            </article>
            <article style="width: 20vw;">
                <p><h2><a href="../src">Pagina Inicial</a></h2></p>
                <h2>Sobre</h2>
                <p>Sistema capaz de receber, armazenar e utilizar informações. Esse projeto busca explorar as linguagens de frontend HTML, CSS e melhorar meu entendimento de lógica de programação e backend para sites usando PHP e MySQL.</p>
            </article>
        </section>
    </body>
</html>