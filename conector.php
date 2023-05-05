<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "detec";

// criando conexão 

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
