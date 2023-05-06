<?php
include_once 'conector.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $confirma_senha = $_POST["confirmarsenha"];

  $_SESSION["nomeclone"] = $_POST["nome"]; 
  $_SESSION["emailclone"] = $_POST["email"]; 

  if ($senha == $confirma_senha) {
    $senha = md5($senha);
    // Cria a query SQL para inserir os dados do usuário no banco de dados.
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    // Executa a query SQL e verifica se ela foi executada com sucesso.
    if ($conn->query($sql) === TRUE) {    
      // Se a query foi executada com sucesso, define a variável de sessão 'GDS' como TRUE.
      $_SESSION ["GDS"] = TRUE;  
      header("Location: index.php");
    } else {
      // Se a query não foi executada com sucesso, exibe uma mensagem de erro.
      echo "Erro ao cadastrar: " . $conn->error;
    }
  } else {
    // Se as senhas não conferem, armazena uma mensagem de erro na variável de sessão 'Conflito'.
    $_SESSION["Conflito"] = "As senhas não conferem.";
    header("Location: cadastro.php");
    $_POST = array(); 
  }
}
?>