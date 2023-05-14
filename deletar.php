<?php
include_once 'conector.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $id_Publi = $_POST['idP'];

    $sql = "DELETE FROM publi WHERE id_Publi = '$id_Publi' ";
    
    if ($conn->query($sql) === TRUE){
        header("Location: perfil.php");
    } else {
        echo "Erro ao apagar o dado: " . mysqli_error($conn);
    }
}
?>
