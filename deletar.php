<?php
include_once 'conector.php';
session_start();

$id_usPubli = $_SESSION['id'];

$sql = "DELETE FROM publi WHERE id_usPubli = $id_usPubli ";


if (mysqli_query($conn, $sql)) {
    header("Location: Home.php");
} else {
    echo "Erro ao apagar o dado: " . mysqli_error($conn);
}

?>
