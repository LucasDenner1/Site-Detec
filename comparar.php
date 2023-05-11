<?php
session_start(); // Inicia a sessão

include_once 'conector.php';

// Verifica se o e-mail e a senha foram enviados através do formulário de login
if ((isset($_POST['email'])) && (isset($_POST['senha']))) {

    // Limpa os dados recebidos para evitar injeção de SQL
    $usuario = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha = md5($senha);

    // Cria a query SQL para buscar o usuário com o e-mail e a senha informados
    $sql = "SELECT * FROM `usuarios` WHERE `email` = '$usuario' AND `senha` = '$senha' LIMIT 1";

    // Executa a query SQL
    $result = mysqli_query($conn, $sql);

    // Obtém o resultado da query SQL
    $resultado = mysqli_fetch_assoc($result);

    // Verifica se a query SQL retornou algum resultado
    if (empty($resultado)) {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos";
        header("Location: index.php");
    }
    // Se a query SQL retornou algum resultado, redireciona o usuário para a página de administrativo.php
    else if (!empty($resultado)) {
        header("Location: Home.php");
        $_SESSION['intruso'] = "tá liberado";
    }
}
// Se o e-mail e a senha não foram enviados através do formulário de login, redireciona o usuário para a página index.php
else {
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("Location: index.php");
}
