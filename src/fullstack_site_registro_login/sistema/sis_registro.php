<?php
    if (isset($_POST['post_email']) & isset($_POST['post_senha'])){
        # Definindo o valor inicial das variaveis
        $formulario_email = '';
        $formulario_senha = '';
        $formulario_email = $_POST['post_email'];
        $formulario_senha = $_POST['post_senha'];
        $senha_hash = password_hash($formulario_senha, PASSWORD_DEFAULT);
        $usuario_existente = 'nao';

        # Buscar na db o usuario associado ao email
        $stmt = $conn->prepare("SELECT * FROM tabela_usuarios WHERE Email = :Email");
        $stmt->bindParam(':Email', $formulario_email);
        $stmt->execute();
        $Resultado = $stmt->fetch();
        
        if (isset($Resultado['Email'])) {
            $usuario_existente = 'sim';
        }

        if ($usuario_existente == 'nao') {
            $stmt = $conn->prepare('INSERT INTO tabela_usuarios (Email, Senha) VALUES (:Email, :Senha)');
            $stmt->bindParam(':Email', $formulario_email);
            $stmt->bindParam(':Senha', $senha_hash);
            $stmt->execute();

            $stmt = $conn->prepare("SELECT * FROM tabela_usuarios WHERE Email = :Email");
            $stmt->bindParam(':Email', $formulario_email);
            $stmt->execute();
            $Resultado = $stmt->fetch();

            $usuario_Id = strval($Resultado['Id']);

            $_SESSION['global_usuario_Id'] = $usuario_Id;
            header('location: index.php');
            exit;
        }
    }
?>
