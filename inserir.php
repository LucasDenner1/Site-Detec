<?php
include_once 'conector.php';
//session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $confirma_senha = $_POST["confirmarsenha"];

  if ($senha == $confirma_senha) {
    // Insere os dados no banco de dados
    $senha = md5($senha);
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
      header("Location: cadastro.php?sucesso=1");
      exit();
    } else {
      echo "Erro ao cadastrar: " . $conn->error;
    }
  } else {
    echo "As senhas não correspondem. Por favor, tente novamente.";
    // Limpa os dados do formulário
    $_POST = array(); 
  }
}
?>