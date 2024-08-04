<?php
    if (isset($_POST['post_email']) && isset($_POST['post_senha'])){
        # Definindo o valor inicial das variaveis
        $formulario_email = '';
        $formulario_senha = '';
        $formulario_email = $_POST['post_email'];
        $formulario_senha = $_POST['post_senha'];
        $senha_hash = password_hash($formulario_senha, PASSWORD_DEFAULT);
        $usuario_existente = 'nao';
        $senha_encriptada = '';
        $senha_correta = 'nao';

        # Buscar na db o usuario associado ao email
        $stmt = $conn->prepare("SELECT * FROM tabela_usuarios WHERE Email = :Email");
        $stmt->bindParam(':Email', $formulario_email);
        $stmt->execute();
        $Resultado = $stmt->fetch();

        if (isset($Resultado['Email'])) {
            $usuario_existente = 'sim';
        }

        $usuario_Id = strval($Resultado['Id']);

        if ($usuario_existente == 'sim'){
            $senha_encriptada = strval($Resultado['Senha']);
            if (password_verify($formulario_senha, $senha_encriptada)){
                $senha_correta = 'sim';
            }
        }

        if ($senha_correta == 'sim'){
            $_SESSION['global_usuario_Id'] = $usuario_Id;
            header('location: index.php');
            exit;
        }
    }
?>