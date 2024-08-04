<?php
$senha_encriptada = '';
$senha_correta = '';
$formulario_apelido = '';
$formulario_nome = '';
$formulario_sobrenome = '';
$formulario_senha = '';
$formulario_email = '';
$formulario_verificar = '';
$dados_atualizados = 'nao';


 if (isset($_POST['post_verificar'])) {
    $formulario_verificar = $_POST['post_verificar'];

    $stmt = $conn->prepare('SELECT Senha FROM tabela_usuarios WHERE Id = :global_usuario_Id');
    $stmt->bindParam(':global_usuario_Id', $_SESSION['global_usuario_Id']);
    $stmt->execute();
    $usuario_info = $stmt->fetch();
    if (isset($usuario_info)) {
        $senha_encriptada = strval($usuario_info['Senha']);
    }

    if (password_verify($formulario_verificar, $senha_encriptada)) {
        $senha_correta = 'sim';
    } else {
        $senha_correta = 'nao';
    }
 }

 if ($senha_correta == 'sim') {
    $formulario_apelido = $_POST['post_apelido'];
    $formulario_nome = $_POST['post_nome'];
    $formulario_sobrenome = $_POST['post_sobrenome'];
    $formulario_senha = $_POST['post_senha'];
    $formulario_email = $_POST['post_email'];
    $senha_hash = password_hash($formulario_senha, PASSWORD_DEFAULT);

    if ($formulario_apelido != '') {
        $stmt = $conn->prepare('UPDATE tabela_usuarios SET Apelido = :formulario_apelido WHERE Id = :global_usuario_Id');
        $stmt->bindParam(':formulario_apelido', $formulario_apelido);
        $stmt->bindParam(':global_usuario_Id', $_SESSION['global_usuario_Id']);
        $stmt->execute();
        $dados_atualizados = 'sim';
    }
    if ($formulario_nome != '') {
        $stmt = $conn->prepare('UPDATE tabela_usuarios SET Nome = :formulario_nome WHERE Id = :global_usuario_Id');
        $stmt->bindParam(':formulario_nome', $formulario_nome);
        $stmt->bindParam(':global_usuario_Id', $_SESSION['global_usuario_Id']);
        $stmt->execute();
        $dados_atualizados = 'sim';
    }
    if ($formulario_sobrenome != '') {
        $stmt = $conn->prepare('UPDATE tabela_usuarios SET Sobrenome = :formulario_sobrenome WHERE Id = :global_usuario_Id');
        $stmt->bindParam(':formulario_sobrenome', $formulario_sobrenome);
        $stmt->bindParam(':global_usuario_Id', $_SESSION['global_usuario_Id']);
        $stmt->execute();
        $dados_atualizados = 'sim';
    }
    if ($formulario_senha != '') {
        $stmt = $conn->prepare('UPDATE tabela_usuarios SET Senha = :senha_hash WHERE Id = :global_usuario_Id');
        $stmt->bindParam(':senha_hash', $senha_hash);
        $stmt->bindParam(':global_usuario_Id', $_SESSION['global_usuario_Id']);
        $stmt->execute();
        $dados_atualizados = 'sim';
    }
    if ($formulario_email != '') {
        $stmt = $conn->prepare('UPDATE tabela_usuarios SET Email = :formulario_email WHERE Id = :global_usuario_Id');
        $stmt->bindParam(':formulario_email', $formulario_email);
        $stmt->bindParam(':global_usuario_Id', $_SESSION['global_usuario_Id']);
        $stmt->execute();
        $dados_atualizados = 'sim';
    }
 }
?>