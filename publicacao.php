<?php
include_once 'conector.php'; 
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $texto = $_POST["texto"];
    $dataHora = $_POST['data_hora'];
    $id_usPubli = $_SESSION['id']; 
    
    $titulo = $_SESSION["titulo"];
    $texto = $_SESSION["texto"];
    $dataHora = $_SESIION['data_hora'];

    // Sanitização dos campos (exemplo: uso de prepared statements é altamente recomendado)
    $titulo = mysqli_real_escape_string($conn, $titulo);
    $texto = mysqli_real_escape_string($conn, $texto);
    $dataHora = mysqli_real_escape_string($conn, $dataHora);

    $sql = "INSERT INTO publi (titulo, texto, hora, id_usPubli) VALUES ('$titulo','$texto','$dataHora','$id_usPubli')";

    if ($conn->query($sql) === TRUE) {    
        header("Location: Home.php");
    } else {
        // Se a query não foi executada com sucesso, exibe uma mensagem de erro.
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>