<?php
include_once 'conector.php';
// Ele starta as variáveis de sessão.
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $confirma_senha = $_POST["confirmarsenha"];

  $_SESSION["nomeclone"] = $_POST["nome"]; 
  $_SESSION["emailclone"] = $_POST["email"]; 

  if ($senha == $confirma_senha) {
    // Insere os dados no banco de dados
    $senha = md5($senha);
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {    
      $_SESSION ["GDS"] = TRUE;  
      header("Location: index.php");
    } else {
      echo "Erro ao cadastrar: " . $conn->error;
    }
  } else {
    $_SESSION["Conflito"] = "As senhas não conferem.";
    header("Location: cadastro.php");
    // Limpa os dados do formulário
    $_POST = array(); 
  }
}
?>