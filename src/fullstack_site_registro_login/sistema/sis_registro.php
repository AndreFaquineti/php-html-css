<?php
    if (isset($_POST['post_email']) & isset($_POST['post_senha'])){
        $formulario_email = '';
        $formulario_senha = '';
        $formulario_email = $_POST['post_email'];
        $formulario_senha = $_POST['post_senha'];
        $senha_hash = password_hash($formulario_senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT * FROM tabela_usuarios WHERE Email = :Email");
        $stmt->bindParam(':Email', $formulario_email);
        $stmt->execute();
        $Resultado = $stmt->fetch();
        $usuario_existente = 'nao';
        if (isset($Resultado['Email'])) {
            $usuario_existente = strval($Resultado['Email']);
        }
        echo '$Resultado: ';
        print_r($Resultado);
        echo '<br>';

        if ($usuario_existente != 'nao') {
            echo 'Esse email já está em uso!';
        }
        if ($usuario_existente == 'nao') {
            $stmt = $conn->prepare('INSERT INTO tabela_usuarios (Email, Senha) VALUES (:Email, :Senha)');
            $stmt->bindParam(':Email', $formulario_email);
            $stmt->bindParam(':Senha', $formulario_senha);
            $stmt->execute();
            echo 'Cadastro realizado com sucesso!';
        }
    }
    
    

/*
recebe email e senha do formulario
transforma email e senha em variaveis que podem ser usadas
busca no banco de dados email igual ao da varivael formulario_email
se a query retornar 0 então
insert into tabela_usuarios campos email, senha "´formulario_email´, formulario_senha"
*/
?>
