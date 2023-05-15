<?php
include_once 'conector.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_user = $_POST['idU'];

    $sql = "DELETE FROM usuarios WHERE id = '$id_user' ";

    if ($conn->query($sql) === TRUE) {           
        header("Location: dados.php");
    } else {
        echo "Erro ao apagar o dado: " . mysqli_error($conn);
    }
}
