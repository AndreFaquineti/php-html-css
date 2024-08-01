<?php
    if (isset($_POST['post_email']) & isset($_POST['post_senha'])){
        $formulario_email = '';
        $formulario_senha = '';
        $formulario_email = $_POST['post_email'];
        $formulario_senha = $_POST['post_senha'];

        echo 'Email: ' . $formulario_email . '<br>Senha: ' . $formulario_senha;
    }






/*
recebe email e senha do formulario
transforma email e senha em variaveis que podem ser usadas
busca no banco de dados email igual ao da varivael formulario_email
se a query retornar 0 então
insert into tabela_usuarios campos email, senha "´formulario_email´, formulario_senha"
*/
?>
